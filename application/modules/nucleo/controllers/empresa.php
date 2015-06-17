<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class empresa extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->Model('model_empresa');
  }

  public function index() {
    $this->data['empresa'] = $this->model_empresa->getAll();
    $this->data['breadcrumb'] = $this->breadcrumb(array('nucleo', 'empresa'), array('Núcleo', 'Empresa'));
    $this->MY_view('nucleo/empresa/listar', $this->data);
  }

  public function novo() {
    $this->data['breadcrumb'] = $this->breadcrumb(array('nucleo', 'empresa', 'novo'), array('Núcleo', 'Empresa', 'Novo'));
    $this->MY_view('nucleo/empresa/novo', $this->data);
  }

  public function cadastrar() {
    try {
      $this->validar();
      $campos = array(model_empresa::CODEMPRESA, model_empresa::DESCRICAO);
      $dados = elements($campos, $this->POST);
      $dados[model_empresa::ID] = $this->model_empresa->autoincrement();
      settype($dados[model_empresa::ID], 'integer');
      settype($dados[model_empresa::CODEMPRESA], 'integer');

      $acao = $this->model_empresa->save($dados);

      if ($acao) {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Empresa cadastrado com sucesso.")');
      } else {
        throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Empresa não cadastrado.")');
      }
      redirect('nucleo/empresa');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('nucleo/empresa/novo');
    }
  }

  private function validar($pula = FALSE) {

    if (empty($this->POST[model_empresa::CODEMPRESA])) {
      throw new Exception('show_stack_bar_top("error", "Campo vazio", "Campo <b>Código da Empresa</b> não pode ficar vazio.");');
    }
    if (empty($this->POST[model_empresa::DESCRICAO])) {
      throw new Exception('show_stack_bar_top("error", "Campo vazio", "Campo <b>Nome</b> não pode ficar vazio.");');
    }
  }

  public function editar($ID) {
    $this->data['breadcrumb'] = $this->breadcrumb(array('nucleo', 'empresa', 'editar'), array('Núcleo', 'Empresa', 'Editar'));
    $this->data['empresa'] = $this->model_empresa->get(array(model_empresa::ID => $ID))[0];

    $this->MY_view('nucleo/empresa/editar', $this->data);
  }

  public function atualizar() {
    try {
      $this->validar();
      $campos = array(model_empresa::CODEMPRESA, model_empresa::DESCRICAO);
      $dados = elements($campos, $this->POST);
      $acao = $this->model_empresa->save($dados, $this->POST[model_empresa::ID]);
      if ($acao) {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Empresa atualizado com sucesso.")');
      } else {
        throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Empresa não atualizado.")');
      }

      redirect('nucleo/empresa');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('nucleo/empresa/editar/' . $this->POST[model_empresa::ID]);
    }
  }

  public function deletar() {
    try {
      if (isset($this->POST['id'])) {

        $ID = $this->POST['id'];
        $acao = $this->model_empresa->deletar($ID);

        if ($acao) {
          $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Empresa deletado.")');
        } else {
          throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Empresa não deletado.")');
        }
      } else {
        throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Empresa inválido.")');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
    }
    redirect('nucleo/empresa');
  }

  public function __destruct() {
    
  }

}
