<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class acesso extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->Model('model_acesso');
    $this->load->Model('model_modulo');
    $this->load->Model('model_privilegio');
  }

  public function index() {
    if ($this->POST) {
      $this->data['acesso'] = $this->model_acesso->getByUsuario(strtoupper($this->POST[model_usuario::AD]));
      $this->data['resultado'] = $this->POST[model_usuario::AD];
    }

    $this->data['breadcrumb'] = $this->breadcrumb(array('nucleo', 'acesso'), array('Núcleo', 'Acesso'));
    $this->MY_view('nucleo/acesso/listar', $this->data);
  }

  public function novo() {
    $this->data['breadcrumb'] = $this->breadcrumb(array('nucleo', 'acesso', 'novo'), array('Núcleo', 'Acesso', 'Novo'));
    $this->data['modulos'] = $this->model_modulo->get(array(model_modulo::PAI => NULL));
    $this->data['privilegios'] = $this->model_privilegio->getAll();
    $this->MY_view('nucleo/acesso/novo', $this->data);
  }

  public function cadastrar() {
    try {
      $this->validar();
      $campos = array(model_acesso::MODULO, model_acesso::PRIVILEGIO);
      $dados = elements($campos, $this->POST);
      settype($dados[model_acesso::MODULO], 'integer');

      if ($this->POST[model_acesso::USUARIOACESSO] == 'ALL') {
        $usuarios = $this->model_usuario->getAll();
        foreach ($usuarios as $key => $value) {
          $acesso = $this->model_acesso->get(array(
              model_acesso::USUARIOACESSO => $value[model_usuario::ID],
              model_acesso::MODULO => $this->POST[model_acesso::MODULO],
              model_acesso::PRIVILEGIO => $this->POST[model_acesso::PRIVILEGIO]
          ));
          if (!$acesso) {
            $dados[model_acesso::ID] = $this->model_acesso->autoincrement();
            settype($dados[model_acesso::ID], 'integer');
            $dados[model_acesso::USUARIOACESSO] = $value[model_usuario::ID];
            $acao = $this->model_acesso->save($dados);
            if (!$acao) {
              throw new Exception('MSG', 'show_stack_bar_top("error", "Erro ao tentar cadastrar", "Usuário: ' . $value[model_usuario::ID] . '")');
            }
          }
        }
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Acessos cadastrados com sucesso.")');
      } else {
        $dados[model_acesso::USUARIOACESSO] = $this->POST[model_acesso::USUARIOACESSO];
        $dados[model_acesso::ID] = $this->model_acesso->autoincrement();
        settype($dados[model_acesso::ID], 'integer');
        $acao = $this->model_acesso->save($dados);

        if ($acao) {
          $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Acesso cadastrado com sucesso.")');
        } else {
          throw new Exception('MSG', 'show_stack_bar_top("error", "Erro ao tentar cadastrar", "Acesso não cadastrado.")');
        }
      }
      redirect('nucleo/acesso');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('nucleo/acesso/novo');
    }
  }

  private function validar() {
    if (empty($this->POST[model_acesso::USUARIOACESSO])) {
      throw new Exception('show_stack_bar_top("error", "Campo vazio", "Campo <b>Usuário</b> não pode ficar vazio.");');
    }
    if (empty($this->POST[model_acesso::MODULO])) {
      throw new Exception('show_stack_bar_top("error", "Campo vazio", "Campo <b>Módulo</b> não pode ficar vazio.");');
    }
    if (empty($this->POST[model_acesso::PRIVILEGIO])) {
      throw new Exception('show_stack_bar_top("error", "Campo vazio", "Campo <b>Privilégio</b> não pode ficar vazio.");');
    }
    if ($this->POST[model_acesso::USUARIOACESSO] != 'ALL') {
      $acesso = $this->model_acesso->get(array(
          model_acesso::USUARIOACESSO => $this->POST[model_acesso::USUARIOACESSO],
          model_acesso::MODULO => $this->POST[model_acesso::MODULO],
          model_acesso::PRIVILEGIO => $this->POST[model_acesso::PRIVILEGIO]
      ));
      if ($acesso) {
        throw new Exception('show_stack_bar_top("error", "Existe esse Acesso", "Esse Acesso já está cadastrado!");');
      }
    } else {
      $acesso = $this->model_acesso->get(array(
          model_acesso::MODULO => $this->POST[model_acesso::MODULO],
          model_acesso::PRIVILEGIO => $this->POST[model_acesso::PRIVILEGIO]
      ));
      if ($acesso) {
        throw new Exception('show_stack_bar_top("warning", "Existem Acessos", "Existem Acessos nessa configuração!");');
      }
    }
  }

  public function editar($ID) {
    $this->data['breadcrumb'] = $this->breadcrumb(array('nucleo', 'acesso', 'editar'), array('Núcleo', 'Acesso', 'Editar'));
    $this->data['acesso'] = $this->model_acesso->getAcessoFuncionario($ID)[0];
    $this->data['modulos'] = $this->model_modulo->get(array(model_modulo::PAI => NULL));
    $this->data['privilegios'] = $this->model_privilegio->getAll();

    $this->MY_view('nucleo/acesso/editar', $this->data);
  }

  public function atualizar() {
    try {
      $this->validar();
      $campos = array(model_acesso::USUARIOACESSO, model_acesso::MODULO, model_acesso::PRIVILEGIO);
      $dados = elements($campos, $this->POST);
      settype($dados[model_acesso::MODULO], 'integer');

      $acao = $this->model_acesso->save($dados, $this->POST[model_acesso::ID]);
      if ($acao) {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Acesso atualizado com sucesso.")');
      } else {
        throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Acesso não atualizado.")');
      }

      redirect('nucleo/acesso');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('nucleo/acesso/editar/' . $this->POST[model_acesso::ID]);
    }
  }

  public function deletar() {
    try {
      if (isset($this->POST['id'])) {

        $ID = $this->POST['id'];
        $acao = $this->model_acesso->deletar($ID);

        if ($acao) {
          $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Acesso deletado.")');
        } else {
          throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Acesso não deletado.")');
        }
      } else {
        throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Acesso inválido.")');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
    }
    redirect('nucleo/acesso');
  }

  public function ajaxUsuario() {
    if ($this->is_ajax()) {
      $this->load->Model('model_empresa');
      $usuario = $this->model_usuario->getByNome(strtoupper($this->POST['usuario']));
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
