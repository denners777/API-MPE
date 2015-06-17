<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class modulo extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->Model('model_modulo');
  }

  public function index() {
    $this->load->Model('model_privilegio');
    $this->data['modulo'] = $this->model_modulo->getAllMP();
    $this->data['breadcrumb'] = $this->breadcrumb(array('nucleo', 'modulo'), array('Núcleo', 'Módulo'));
    $this->MY_view('nucleo/modulo/listar', $this->data);
  }

  public function novo() {
    $this->load->Model('model_privilegio');
    $this->data['privilegius'] = $this->model_privilegio->getAll();
    $this->data['modulus'] = $this->model_modulo->get(array(model_modulo::PAI => NULL));
    $this->data['breadcrumb'] = $this->breadcrumb(array('nucleo', 'modulo', 'novo'), array('Núcleo', 'Módulo', 'Novo'));
    $this->MY_view('nucleo/modulo/novo', $this->data);
  }

  public function cadastrar() {
    try {
      $this->validar();
      $campos = array(model_modulo::NOME, model_modulo::ORDEM, model_modulo::PRIVILEGIO, model_modulo::ICON, model_modulo::URL);
      $dados = elements($campos, $this->POST);
      $dados[model_modulo::ID] = $this->model_modulo->autoincrement();
      if ($this->POST[model_modulo::PAI] != 'N') {
        $dados[model_modulo::PAI] = $this->POST[model_modulo::PAI];
        settype($dados[model_modulo::PAI], 'integer');
      }
      settype($dados[model_modulo::ID], 'integer');
      settype($dados[model_modulo::ORDEM], 'integer');

      $acao = $this->model_modulo->save($dados);

      if ($acao) {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Módulo cadastrado com sucesso.")');
      } else {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "Módulo não cadastrado.")');
      }
      redirect('nucleo/modulo');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('nucleo/modulo/novo');
    }
  }

  private function validar() {
    if (empty($this->POST[model_modulo::NOME])) {
      throw new Exception('show_stack_bar_top("error", "Campo vazio", "Campo <b>Nome</b> não pode ficar vazio.");');
    }
    if (empty($this->POST[model_modulo::URL])) {
      throw new Exception('show_stack_bar_top("error", "Campo vazio", "Campo <b>URL</b> não pode ficar vazio.");');
    }
    if (!empty($this->POST[model_modulo::ORDEM])) {
      if (!is_numeric($this->POST[model_modulo::ORDEM])) {
        throw new Exception('show_stack_bar_top("error", "Campo não numérico", "Campo <b>ORDEM</b> deve ser um número.");');
      }
    }
    $url = explode(' ', $this->POST[model_modulo::URL]);
    if (isset($url[1])) {
      throw new Exception('show_stack_bar_top("error", "Espaço em branco", "Campo <b>URL</b> não pode espaço em branco.");');
    }
  }

  public function editar($ID) {

    $this->load->Model('model_privilegio');
    $this->data['privilegios'] = $this->model_privilegio->getAll();
    $this->data['modulos'] = $this->model_modulo->get(array(model_modulo::PAI => NULL));
    $this->data['breadcrumb'] = $this->breadcrumb(array('nucleo', 'modulo', 'editar'), array('Núcleo', 'Módulo', 'Editar'));
    $this->data['modulo'] = $this->model_modulo->get(array(model_modulo::ID => $ID))[0];

    $this->MY_view('nucleo/modulo/editar', $this->data);
  }

  public function atualizar() {
    try {
      $this->validar();
      $campos = array(model_modulo::NOME, model_modulo::ORDEM, model_modulo::PRIVILEGIO, model_modulo::ICON, model_modulo::URL);
      $dados = elements($campos, $this->POST);
      if ($this->POST[model_modulo::PAI] != 'N') {
        $dados[model_modulo::PAI] = $this->POST[model_modulo::PAI];
        settype($dados[model_modulo::PAI], 'integer');
      }
      settype($dados[model_modulo::ORDEM], 'integer');

      $acao = $this->model_modulo->save($dados, $this->POST[model_modulo::ID]);
      if ($acao) {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Módulo atualizado com sucesso.")');
      } else {
        throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Módulo não atualizado.")');
      }
      redirect('nucleo/modulo');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('nucleo/modulo/editar/' . $this->POST[model_modulo::ID]);
    }
  }

  public function deletar() {
    try {
      if (isset($this->POST['id'])) {

        $ID = $this->POST['id'];
        $acao = $this->model_modulo->deletar($ID);

        if ($acao) {
          $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Módulo deletado.")');
        } else {
          throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Módulo não deletado.")');
        }
      } else {
        throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Módulo inválido.")');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
    }
    redirect('nucleo/modulo');
  }

  public function __destruct() {
    
  }

}
