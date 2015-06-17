<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class privilegio extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->Model('model_privilegio');
  }

  public function index() {
    $this->data['privilegio'] = $this->model_privilegio->getAll();
    $this->data['breadcrumb'] = $this->breadcrumb(array('nucleo', 'privilegio'), array('Núcleo', 'Privilégio'));
    $this->MY_view('nucleo/privilegio/listar', $this->data);
  }

  public function novo() {
    $this->data['breadcrumb'] = $this->breadcrumb(array('nucleo', 'privilegio', 'novo'), array('Núcleo', 'Privilégio', 'Novo'));
    $this->MY_view('nucleo/privilegio/novo', $this->data);
  }

  public function cadastrar() {
    try {
      $this->validar();
      $campos = array(model_privilegio::ID, model_privilegio::DESCRICAO);
      $dados = elements($campos, $this->POST);
      $dados[model_privilegio::ID] = trim($dados[model_privilegio::ID]);

      $acao = $this->model_privilegio->save($dados);

      if ($acao) {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Privilégio cadastrado com sucesso.")');
      } else {
        throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Privilégio não cadastrado.")');
      }
      redirect('nucleo/privilegio');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('nucleo/privilegio/novo');
    }
  }

  private function validar($pula_login = FALSE) {
    if (!$pula_login) {
      if (empty($this->POST[model_privilegio::ID])) {
        throw new Exception('show_stack_bar_top("error", "Campo vazio", "Campo <b>Código</b> não pode ficar vazio.");');
      }
      if (isset($this->model_privilegio->get(array(model_privilegio::ID => $this->POST[model_privilegio::ID]))[0])) {
        throw new Exception('show_stack_bar_top("error", "Código já utilizado", "O código digitado já está cadastrado. Digite outro código.");');
      }
    }
    if (isset($this->POST[model_privilegio::ID][5])) {
      throw new Exception('show_stack_bar_top("error", "Campo muito grande", "Campo <b>Código</b> não pode ter mais de 5 caracteres.");');
    }
    if (empty($this->POST[model_privilegio::DESCRICAO])) {
      throw new Exception('show_stack_bar_top("error", "Campo vazio", "Campo <b>Nome</b> não pode ficar vazio.");');
    }
  }

  public function editar($ID) {
    $this->data['breadcrumb'] = $this->breadcrumb(array('nucleo', 'privilegio', 'editar'), array('Núcleo', 'Privilégio', 'Editar'));
    $this->data['privilegio'] = $this->model_privilegio->get(array(model_privilegio::ID => $ID))[0];

    $this->MY_view('nucleo/privilegio/editar', $this->data);
  }

  public function atualizar() {
    try {
      $this->validar(TRUE);
      $campos = array(model_privilegio::ID, model_privilegio::DESCRICAO);
      $dados = elements($campos, $this->POST);
      $dados[model_privilegio::ID] = trim($dados[model_privilegio::ID]);
      $acao = $this->model_privilegio->save($dados, $this->POST[model_privilegio::ID . 'OLD']);
      if ($acao) {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Privilégio atualizado com sucesso.")');
      } else {
        throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Privilégio não atualizado.")');
      }

      redirect('nucleo/privilegio');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('nucleo/privilegio/editar/' . $this->POST[model_privilegio::ID]);
    }
  }

  public function deletar() {
    try {
      if (isset($this->POST['id'])) {

        $ID = $this->POST['id'];
        $acao = $this->model_privilegio->deletar($ID);

        if ($acao) {
          $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Privilégio deletado.")');
        } else {
          throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Privilégio não deletado.")');
        }
      } else {
        throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Privilégio inválido.")');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
    }
    redirect('nucleo/privilegio');
  }

  public function __destruct() {
    
  }

}
