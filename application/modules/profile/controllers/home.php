<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class home extends MY_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {

    $this->data['breadcrumb'] = $this->breadcrumb();
    $this->MY_view('home', $this->data);
  }

  public function atualizar() {
    try {

      if (!empty($this->POST[model_usuario::SENHA])) {
        $this->validar();
        $this->load->helper('security');
        $this->POST[model_usuario::SENHA] = do_hash($this->POST[model_usuario::SENHA]);
        $senha[model_usuario::SENHA] = $this->POST[model_usuario::SENHA];
        $acao = $this->model_usuario->save($senha, array(model_usuario::FUNC => $this->POST[model_funcionario::ID]));
        $msg = 'show_stack_bar_top("success", "Sucesso", "Senha atualizada com sucesso.");';
      }else{
        $msg = '';
        $acao = true;
      }

      $sobre[model_funcionario::SOBRE] = $this->POST[model_funcionario::SOBRE];
      $acao2 = $this->model_funcionario->save($sobre, $this->POST[model_funcionario::ID]);
      if ($acao && $acao2) {
        $this->session->set_flashdata('MSG', $msg . 'show_stack_bar_top("success", "Sucesso", "Mensagem atualizada com sucesso.");');
      } else {
        throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Erro ao atualizar a mensagem.")');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
    }
    redirect('profile');
  }

  private function validar() {
    if ($this->POST[model_usuario::SENHA] !== $this->POST['confirm']) {
      throw new Exception('show_stack_bar_top("error", "Não confere", "As senhas não conferem");');
    }
  }

}
