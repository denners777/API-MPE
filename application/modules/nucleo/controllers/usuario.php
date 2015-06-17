<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class usuario extends MY_Controller {

  public function __construct() {
    parent::__construct();

    $this->load->Model('model_empresa');
  }

  public function index() {

    if ($this->POST) {

      $this->data['usuario'] = $this->model_usuario->getByNome(strtoupper($this->POST['usuario']));
      $this->data['resultado'] = $this->POST['usuario'];
    }

    $this->data['breadcrumb'] = $this->breadcrumb(array('nucleo', 'usuario'), array('Núcleo', 'Usuário'));
    $this->MY_view('nucleo/usuario/listar', $this->data);
  }

  public function novo() {
    $this->data['empresa'] = $this->model_empresa->getAll();
    $this->data['breadcrumb'] = $this->breadcrumb(array('nucleo', 'usuario', 'novo'), array('Núcleo', 'Usuário', 'Novo'));
    $this->MY_view('nucleo/usuario/novo', $this->data);
  }

  public function cadastrar() {
    try {
      $this->validar();
      $this->load->Model('model_login');
      $this->load->helper('security');
      if ($this->POST[model_funcionario::EMPRESA] == 1) {
        $busca = $this->model_login->getUsuario($this->POST[model_funcionario::CHAPA])[0];
      } else {
        $this->load->Model('model_importacao_funcionarios');
        $busca = $this->model_importacao_funcionarios->getUsuario(str_pad($this->POST[model_funcionario::CHAPA], 6, "0", STR_PAD_LEFT), NULL, NULL, $this->POST[model_funcionario::EMPRESA])[0];
      }
      if (is_array($busca)) {

        $campos = array(
            model_funcionario::NOME,
            model_funcionario::CHAPA,
            model_funcionario::CPF,
            model_funcionario::ADMISSAO,
            model_funcionario::FUNCAO,
            model_funcionario::SECAO,
            model_funcionario::DESCSECAO,
            model_funcionario::SITUACAO,
            model_funcionario::TIPO
        );
        $dados = elements($campos, $busca);
        $dados[model_funcionario::ID] = $this->model_funcionario->autoincrement();
        $dados[model_funcionario::EMAIL] = $this->POST[model_funcionario::EMAIL];
        $dados[model_funcionario::EMPRESA] = $this->POST[model_funcionario::EMPRESA];

        $campos2 = array(model_usuario::SENHA);
        $dados2 = elements($campos2, $this->POST);
        $dados2[model_usuario::ID] = $this->model_usuario->autoincrement();
        $dados2[model_usuario::SENHA] = do_hash($dados2[model_usuario::SENHA]);
        $dados2[model_usuario::STATUS] = 'A';
        $dados2[model_usuario::FUNC] = $dados[model_funcionario::ID];

        $this->load->Model('model_acesso');

        $dados3 = array(
            model_acesso::ID => $this->model_acesso->autoincrement(),
            model_acesso::USUARIO => $dados[model_funcionario::ID],
            model_acesso::MODULO => 1,
            model_acesso::PRIVILEGIO => '01'
        );

        settype($dados3[model_acesso::ID], 'integer');
      } else {
        throw new Exception('Usuário não encontrado.');
      }
      //Inicio do transact
      $this->db->trans_start();
      $acao = $this->model_funcionario->save($dados);
      $acao2 = $this->model_usuario->save($dados2);
      $acao3 = $this->model_acesso->save($dados3);

      if ($acao && $acao2 && $acao3) {
        $this->session->set_flashdata('Usuário cadastrado com sucesso.');
      } else {
        throw new Exception('Usuário não cadastrado.');
      }
      //Final do transact
      $this->db->trans_complete();

      redirect('nucleo/usuario');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "' . $exc->getMessage() . '")');
      redirect('nucleo/usuario/novo');
    }
  }

  private function validar($pula_login = FALSE) {

    if (!$pula_login) {
      if (empty($this->POST[model_usuario::SENHA])) {
        throw new Exception('Campo <b>Senha</b> não pode ficar vazio.');
      }
      if (isset($this->model_funcionario->get(array(model_funcionario::CHAPA => $this->POST[model_funcionario::CHAPA], model_funcionario::EMPRESA => $this->POST[model_funcionario::EMPRESA]))[0])) {
        throw new Exception('A chapa digitada já está cadastrada nesta empresa. Digite outra chapa.');
      }
      if (empty($this->POST[model_funcionario::CHAPA])) {
        throw new Exception('Campo <b>Chapa</b> não pode ficar vazio.');
      }
    }
    if (empty($this->POST[model_funcionario::EMAIL])) {
      throw new Exception('Campo <b>E-mail</b> não pode ficar vazio.');
    }
    if (empty($this->POST[model_funcionario::EMPRESA])) {
      throw new Exception('Escolha uma <b>Empresa</b>.');
    }
  }

  public function editar($ID) {
    $this->data['empresa'] = $this->model_empresa->getAll();
    $this->data['breadcrumb'] = $this->breadcrumb(array('nucleo', 'usuario', 'editar'), array('Núcleo', 'Usuário', 'Editar'));
    $this->data['usuario'] = $this->model_usuario->getUsuario(array(model_usuario::ID => $ID))[0];
    $this->MY_view('nucleo/usuario/editar', $this->data);
  }

  public function atualizar() {
    try {
      $this->validar(TRUE);
      $this->load->Model('model_login');
      $this->load->helper('security');

      if ($this->POST[model_funcionario::EMPRESA] == 1) {
        $busca = $this->model_login->getUsuario($this->POST[model_funcionario::CHAPA])[0];
      } else {
        $this->load->Model('model_importacao_funcionarios');
        $busca = $this->model_importacao_funcionarios->getUsuario(str_pad($this->POST[model_funcionario::CHAPA], 6, "0", STR_PAD_LEFT), NULL, NULL, $this->POST[model_funcionario::EMPRESA])[0];
      }

      if (is_array($busca)) {

        $campos = array(
            model_funcionario::NOME,
            model_funcionario::CHAPA,
            model_funcionario::CPF,
            model_funcionario::ADMISSAO,
            model_funcionario::FUNCAO,
            model_funcionario::SECAO,
            model_funcionario::DESCSECAO,
            model_funcionario::SITUACAO,
            model_funcionario::TIPO
        );
        $dados = elements($campos, $busca);
        $dados[model_funcionario::EMAIL] = $this->POST[model_funcionario::EMAIL];
        $dados[model_funcionario::EMPRESA] = $this->POST[model_funcionario::EMPRESA];

        if (!empty($this->POST[model_usuario::SENHA])) {
          $campos2 = array(model_usuario::SENHA);
          $dados2 = elements($campos2, $this->POST);
          $dados2[model_usuario::SENHA] = do_hash($dados2[model_usuario::SENHA]);
        } else {
          $dados2 = array();
        }
        $dados2[model_usuario::STATUS] = 'A';
        $dados2[model_usuario::FUNC] = $this->POST[model_funcionario::ID];
      } else {
        throw new Exception('Usuário não encontrado.');
      }
      //Inicio do transact
      $this->db->trans_start();
      $acao = $this->model_funcionario->save($dados, $this->POST[model_funcionario::ID]);
      $acao2 = $this->model_usuario->save($dados2, $this->POST[model_usuario::ID]);


      if ($acao && $acao2) {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Usuário atualizado com sucesso.")');
      } else {
        throw new Exception('Usuário não atualizado.');
      }

      //Final do transact
      $this->db->trans_complete();

      redirect('nucleo/usuario');
    } catch (Exception $exc) {
      $this->session->set_flashdata('show_stack_bar_top("error", "Erro", "' . $exc->getMessage() . '")');
      redirect('nucleo/usuario/editar/' . $this->POST[model_usuario::ID]);
    }
  }

  public function desativar() {
    try {
      if (isset($this->POST['id'])) {

        $ID = $this->POST['id'];
        $acao = $this->model_usuario->desativar(array(model_usuario::STATUS => 'D'), $ID);

        if ($acao) {
          $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Usuário desativado com sucesso.")');
        } else {
          throw new Exception('Usuário não desativado.');
        }
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('show_stack_bar_top("error", "Erro", "' . $exc->getMessage() . '")');
    }
    redirect('nucleo/usuario');
  }

  public function ativar() {
    try {
      if (isset($this->POST['id'])) {

        $ID = $this->POST['id'];
        $acao = $this->model_usuario->desativar(array(model_usuario::STATUS => 'A'), $ID);

        if ($acao) {
          $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Usuário ativado com sucesso.")');
        } else {
          throw new Exception('Usuário não ativado.');
        }
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('show_stack_bar_top("error", "Erro", "' . $exc->getMessage() . '")');
    }
    redirect('nucleo/usuario');
  }

  public function deletar() {
    try {
      if (isset($this->POST['id'])) {

        $ID = $this->POST['id'];
        $this->load->Model('model_acesso');
        $idFunc = $this->model_usuario->get($ID)[0][model_usuario::FUNC];

        //Inicio do transact
        $this->db->trans_start();
        $acao = $this->model_acesso->deletar($this->model_acesso->get(array(model_acesso::USUARIOACESSO => $ID))[0][model_acesso::ID]);
        $acao2 = $this->model_usuario->deletar($ID);
        $acao3 = $this->model_funcionario->deletar($idFunc);

        if ($acao && $acao2 && $acao3) {
          $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Usuário deletado.")');
        } else {
          throw new Exception('Usuário não deletado.');
        }
      } else {
        throw new Exception('Acesso inválido.');
      }
      //Final do transact
      $this->db->trans_complete();
      echo 'ok';
    } catch (Exception $exc) {
      $this->session->set_flashdata('show_stack_bar_top("error", "Erro", "' . $exc->getMessage() . '")');
    }
  }

  public function ajaxChapa() {
    if ($this->is_ajax()) {
      if ($this->POST['empresa'] == 1) {
        $this->load->Model('model_login');
        $usuario = $this->model_login->getUsuario(str_pad((int) $this->POST['chapa'], 6, "0", STR_PAD_LEFT));
      } else {
        $this->load->Model('model_importacao_funcionarios');
        $usuario = $this->model_importacao_funcionarios->getUsuario(str_pad((int) $this->POST['chapa'], 6, "0", STR_PAD_LEFT), NULL, NULL, $this->POST['empresa']);
      }
      if (!is_null($usuario)) {
        header('Content-Type: application/json');
        echo json_encode($usuario);
      } else {
        echo $usuario;
      }
    }
  }

  public function __destruct() {
    
  }

}
