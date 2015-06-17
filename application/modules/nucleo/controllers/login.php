<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class login extends MY_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->load->Model('model_empresa');
    $this->data['empresa'] = array(0 => 'Empresa');
    foreach ($this->model_empresa->getAll() as $value) {
      $this->data['empresa'][$value[model_empresa::ID]] = $value[model_empresa::DESCRICAO];
    }
    $this->load->view('login/index', $this->data);
    $this->load->view('alerts', $this->data);
  }

  public function logar() {
    try {

      if (isset($this->POST)) {
        if (!empty($this->POST['chapa']) && !empty($this->POST['senha']) && !empty($this->POST['empresa'])) {

          $this->validar(TRUE);
          $this->load->helper('security');

          $criterio = array(
              model_funcionario::CHAPA => str_pad($this->POST['chapa'], 6, '0', STR_PAD_LEFT),
              model_usuario::SENHA => do_hash($this->POST['senha']),
              model_funcionario::EMPRESA => $this->POST['empresa'],
          );

          $usuario = $this->model_usuario->getUsuario($criterio);

          if (!$usuario) {
            log_message('error', 'Falha no Login! - Login e/ou Senha não encontradas!');
            throw new Exception('show_stack_bar_top("error", "Falha no Login!", "Login e/ou Senha não encontradas!");');
          } else {
            if ($usuario[0][model_funcionario::SITUACAO] == 'D') {
              log_message('error', 'Usuário Inativo! - Usuário sem acesso ao sistema.');
              throw new Exception('show_stack_bar_top("error", "Usuário Inativo!", "Usuário sem acesso ao sistema.");');
            }
            if ($usuario[0][model_usuario::STATUS] == 'N') {
              log_message('error', 'E-mail não confirmado! - Usuário ainda não confirmou seu e-mail. Verifique sua caixa de mensagens.');
              throw new Exception('show_stack_bar_top("error", "E-mail não confirmado!", "Usuário ainda não confirmou seu e-mail. Verifique sua caixa de mensagens.");');
            }
            $token = $this->model_usuario->setToken($usuario[0][model_usuario::ID]);
            $this->session->set_userdata(parent::session_usu, $token);
            redirect('profile/home');
          }
        } else {
          log_message('error', 'Escolha a Empresa e digite seu Login e Senha! - Falha no Login');
          throw new Exception('show_stack_bar_top("error", "Escolha a Empresa e digite seu Login e Senha!", "Falha no Login");');
        }
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      log_message('error', $exc->getMessage());
      redirect('nucleo/login');
    }
  }

  public function logoff() {
    $this->session->sess_destroy();
    redirect('nucleo/login');
  }

  public function registrar() {

    $this->load->Model('model_empresa');
    $this->data['empresa'] = array(0 => 'Empresa');
    foreach ($this->model_empresa->getAll() as $value) {
      $this->data['empresa'][$value[model_empresa::ID]] = $value[model_empresa::DESCRICAO];
    }
    $this->load->view('login/registro', $this->data);
    $this->load->view('alerts', $this->data);
  }

  public function realizaRegistro() {

    try {

      $this->validar();

      $this->load->Model('model_login');
      $this->load->helper('security');

      $chapa = str_pad(trim($this->POST['chapa']), 6, '0', STR_PAD_LEFT);
      $email = strtolower(strip_quotes(trim($this->POST['email']))) . '@grupompe.com.br';
      $senha = do_hash($this->POST['senha']);
      $cpf = str_replace('.', '', str_replace('-', '', trim($this->POST['cpf'])));

      $dataadm = $this->POST['dataadm'];
      $empresa = $this->POST['empresa'];

      if ($empresa <= 2) {
        $dados = $this->model_login->getUsuario($chapa, $cpf, $dataadm, $empresa)[0];
      } else {
        $this->load->Model('model_importacao_funcionarios');
        $dados = $this->model_importacao_funcionarios->getUsuario($chapa, $cpf, $dataadm, $empresa)[0];
      }

      if (!$dados) {
        throw new Exception('Chapa, CPF e Data de Admissão não são de um usuário válido.');
      } else {
        $idFunc = $this->model_funcionario->autoincrement();
        $dados[model_funcionario::ID] = $idFunc;
        $dados[model_funcionario::EMAIL] = $email;
        $dados[model_funcionario::EMPRESA] = $empresa;
        settype($dados[model_funcionario::ID], 'integer');
        settype($dados[model_funcionario::EMPRESA], 'integer');
        //Inicio do transact
        $this->db->trans_start();

        $resposta = $this->model_funcionario->save($dados);
        unset($dados);

        $dados = array(
            model_usuario::ID => $this->model_usuario->autoincrement(),
            model_usuario::SENHA => $senha,
            model_usuario::FUNC => $idFunc,
            model_usuario::STATUS => 'N'
        );

        $resposta2 = $this->model_usuario->save($dados);

        unset($dados);
        //Preparando consulta no módulo default

        $this->load->Model('model_acesso');
        $dados = array(
            model_acesso::ID => $this->model_acesso->autoincrement(),
            model_acesso::USUARIOACESSO => $idFunc,
            model_acesso::MODULO => 1,
            model_acesso::PRIVILEGIO => '01'
        );

        settype($dados[model_acesso::ID], 'integer');
        $resposta3 = $this->model_acesso->save($dados);

        unset($dados);

        $dados = array(
            model_acesso::ID => $this->model_acesso->autoincrement(),
            model_acesso::USUARIOACESSO => $idFunc,
            model_acesso::MODULO => 4,
            model_acesso::PRIVILEGIO => '01'
        );

        settype($dados[model_acesso::ID], 'integer');
        $resposta4 = $this->model_acesso->save($dados);

        unset($dados);

        if (!$resposta && !$resposta2 && !$resposta3 && !$resposta4) {
          throw new Exception('Houve algum erro no seu consulta.');
        }

        $funcionario = $this->model_funcionario->get(array(model_funcionario::EMAIL => $email))[0];

        $codEmail = base64_encode($funcionario[model_funcionario::EMAIL]);

        $mensagem = '<p class="text-center">Você solicitou o acesso a intranet do GRUPO MPE.<br />';
        $mensagem .= 'Clique no link a seguir para confirmar este e-mail.</p>';
        $mensagem .= '<p class="text-center"><a class="btn btn-primary btn-lg" href="' . site_url('nucleo/login/confirmarEmail/?email=' . $codEmail) . '">Confirmar E-mail</a></p>';
        $mensagem .= '<p class="text-center">Se você não solicitou o acesso a intranet do GRUPO MPE, por favor envie um e-mail a suporte@grupompe.com.br relatando o ocorrido.</p>';

        $dados = array(
            'nome' => $funcionario[model_funcionario::NOME],
            'email' => $funcionario[model_funcionario::EMAIL],
            'titulo' => 'Confirmar e-mail',
            'assunto' => 'Confirmar e-mail para acesso a Intranet do Grupo MPE',
            'mensagem' => $mensagem,
        );

        $this->load->helper('functions');

        if (!enviaEmail($dados)) {
          throw new Exception('Houve um erro ao enviar o e-mail.');
        }

        //Final do transact
        $this->db->trans_complete();

        redirect('nucleo/login/mensagemRegistro');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "' . $exc->getMessage() . '")');
      log_message('error', $exc->getMessage());
      redirect('nucleo/login');
    }
  }

  public function mensagemRegistro() {
    $this->load->view('login/mensagemRegistro', $this->data);
    $this->load->view('alerts', $this->data);
  }

  private function validar($logar = FALSE) {

    if (empty($this->POST['chapa'])) {
      throw new Exception('Campo <b>Chapa</b> não pode ficar vazio.');
    }
    if (!is_numeric($this->POST['chapa'])) {
      throw new Exception('Campo <b>Chapa</b> deve ser um valor numérico.');
    }
    if (empty($this->POST['senha'])) {
      throw new Exception('Campo <b>Senha</b> não pode ficar vazio.');
    }
    if (!$logar) {
      $chapa = str_pad($this->POST['chapa'], 6, '0', STR_PAD_LEFT);
      if (!empty($this->model_funcionario->get(array(model_funcionario::CHAPA => $chapa)))) {
        throw new Exception('Matrícula ' . $this->POST['chapa'] . ' já cadastrada no sistema. Por favor entre em contato com o suporte.');
      }
      if (empty($this->POST['senha_confirm'])) {
        throw new Exception('Campo de confirmação de <b>Senha</b> não pode ficar vazio.');
      }
      if ($this->POST['senha'] != $this->POST['senha_confirm']) {
        throw new Exception('As <b>Senhas</b> não são idênticas.');
      }
      if (empty($this->POST['cpf'])) {
        throw new Exception('Campo <b>CPF</b> não pode ficar vazio.');
      }
      if (!is_numeric($this->POST['cpf'])) {
        throw new Exception('Campo <b>CPF</b> deve ser um valor numérico.');
      }
      if (empty($this->POST['dataadm'])) {
        throw new Exception('Campo <b>Data de Admissão</b> não pode ficar vazio.');
      }
      $data = explode('/', $this->POST['dataadm']);
      if (!checkdate($data[1], $data[0], $data[2])) {
        throw new Exception('Data Inválida.');
      }
      if (empty($this->POST['email'])) {
        throw new Exception('Campo <b>E-mail</b> não pode ficar vazio.');
      }
      if (!filter_var($this->POST['email'] . '@grupompe.com.br', FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Campo <b>E-mail</b> não parece um e-mail valido. <br> 
                           Obs.: Não coloque o dominio do e-mail (@grupompe.com.br) <br>
                           Utilize seu login conforme no Zimbra.');
      }
      if (empty($this->POST['empresa'])) {
        throw new Exception('Escolha um opção do campo <b>Empresa</b>.');
      }
    }
  }

  public function esqueciMinhaSenha() {
    $this->load->view('login/esqueci', $this->data);
    $this->load->view('alerts', $this->data);
  }

  public function resetarSenha() {
    try {

      $email = base64_decode($_GET['email']);

      if (empty($email)) {
        throw new Exception('E-mail vazio.');
      }

      $funcionario = $this->model_funcionario->get(array(model_funcionario::EMAIL => $email))[0];
      if (!empty($funcionario)) {
        $this->data['funcionario'] = $funcionario[model_funcionario::ID];

        $this->load->view('login/trocaSenha', $this->data);
        $this->load->view('alerts', $this->data);
      } else {
        throw new Exception('E-mail não cadastrado.');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "' . $exc->getMessage() . '")');
      log_message('error', $exc->getMessage());
      redirect('nucleo/login/esqueciMinhaSenha');
    }
  }

  public function trocarSenha() {
    try {

      if (empty($this->POST['senha'])) {
        throw new Exception('Campo <b>Senha</b> não pode ficar vazio.');
      }
      if (empty($this->POST['senha_confirm'])) {
        throw new Exception('Campo de confirmação de <b>Senha</b> não pode ficar vazio.');
      }
      if ($this->POST['senha'] != $this->POST['senha_confirm']) {
        throw new Exception('As <b>Senhas</b> não são idênticas.');
      }
      $this->load->helper('security');

      $ID = $this->POST['id'];
      $senha = do_hash($this->POST['senha']);

      $dados = array(
          model_usuario::SENHA => $senha
      );

      $acao = $this->model_usuario->save($dados, $ID);

      if ($acao) {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Troca de Senha realizada com sucesso.")');
      } else {
        throw new Exception('Houve um erro ao trocar sua senha.');
      }

      redirect('nucleo/login');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "' . $exc->getMessage() . '")');
      log_message('error', $exc->getMessage());
      redirect('nucleo/login');
    }
  }

  public function enviarEmail() {
    try {
      $email = $this->POST['email'];
      $funcionario = $this->model_funcionario->get(array(model_funcionario::EMAIL => $email))[0];
      if (!empty($funcionario)) {
        $codEmail = base64_encode($funcionario[model_funcionario::EMAIL]);

        $mensagem = '<p class="text-center">Você solicitou a troca de sua senha de acesso a intranet do GRUPO MPE.<br />';
        $mensagem .= 'Clique no link a seguir para ser redirecionado a página de troca de senha.</p>';
        $mensagem .= '<p class="text-center"><a class="btn btn-primary btn-lg" href="' . site_url('nucleo/login/resetarSenha/?email=' . $codEmail) . '">Alterar Senha</a></p>';
        $mensagem .= '<p class="text-center">Se você não solicitou a troca de senha, envie um e-mail a suporte@grupompe.com.br relatando o ocorrido.</p>';

        $dados = array(
            'nome' => $funcionario[model_funcionario::NOME],
            'email' => $funcionario[model_funcionario::EMAIL],
            'titulo' => 'Alterar senha',
            'assunto' => 'Alterar senha da Intranet do Grupo MPE',
            'mensagem' => $mensagem,
        );
        $this->load->helper('functions');

        print_r($dados);
        if (enviaEmail($dados)) {
          $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Você recebeu um link para trocar sua senha em seu e-mail cadastrado. Por favor, verifique a caixa de entrada de seu e-mail.")');
        }
      } else {
        throw new Exception('E-mail não cadastrado.');
      }
      redirect('nucleo/login');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "' . $exc->getMessage() . '")');
      log_message('error', $exc->getMessage());
      redirect('nucleo/login/esqueciMinhaSenha');
    }
  }

  public function confirmarEmail() {
    try {
      $email = base64_decode($_GET['email']);
      $funcionario = $this->model_funcionario->get(array(model_funcionario::EMAIL => $email))[0];
      $usuario = $this->model_usuario->get(array(model_usuario::ID => $funcionario[model_funcionario::ID]))[0];

      $dados = array(
          model_usuario::STATUS => 'A'
      );

      $acao = $this->model_usuario->save($dados, $usuario[model_usuario::ID]);

      if ($acao) {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Usuário ativado com sucesso.")');
      } else {
        throw new Exception('Houve um erro ao ativar o usuário.');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "' . $exc->getMessage() . '")');
      log_message('error', $exc->getMessage());
    }
    redirect('nucleo/login');
  }

  public function __destruct() {
    
  }

}
