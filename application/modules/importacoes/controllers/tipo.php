<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipo
 *
 * @author denner.fernandes
 */
class tipo extends MY_Controller {

  public function __construct() {
    parent::__construct();

    $this->load->Model('model_tipo_de_para');
  }

  public function __destruct() {
    
  }

  public function index() {
    $this->data['tipo'] = $this->model_tipo_de_para->getAll();
    $this->data['breadcrumb'] = $this->breadcrumb(array('importacoes', 'tipo'), array('Importações', 'Tipo'));
    $this->MY_view('importacoes/tipo/listar', $this->data);
  }

  public function novo() {
    $this->data['breadcrumb'] = $this->breadcrumb(array('importacoes', 'tipo', 'novo'), array('Importações', 'Tipo', 'Novo'));
    $this->MY_view('importacoes/tipo/novo', $this->data);
  }

  public function cadastrar() {
    try {
      $this->validar();
      $campos = array(model_tipo_de_para::DESCRICAO, model_tipo_de_para::TABELA_RM, model_tipo_de_para::CODIGO, model_tipo_de_para::NOME);
      $dados = elements($campos, $this->POST);
      $dados[model_tipo_de_para::ID] = $this->model_tipo_de_para->autoincrement();
      settype($dados[model_tipo_de_para::ID], 'integer');

      $acao = $this->model_tipo_de_para->save($dados);

      if ($acao) {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Tipo cadastrado com sucesso.")');
      } else {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "Tipo não cadastrado.")');
      }
      redirect('importacoes/tipo');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('importacoes/tipo/novo');
    }
  }

  private function validar() {
    if (empty($this->POST[model_tipo_de_para::DESCRICAO])) {
      throw new Exception('show_stack_bar_top("error", "Campo vazio", "Campo <b>descrição</b> não pode ficar vazio.");');
    }
    if (empty($this->POST[model_tipo_de_para::TABELA_RM])) {
      throw new Exception('show_stack_bar_top("error", "Campo vazio", "Campo <b>tabela do RM</b> não pode ficar vazio.");');
    }
  }

  public function editar($ID) {
    $this->data['breadcrumb'] = $this->breadcrumb(array('importacoes', 'tipo', 'editar'), array('Importações', 'Tipo', 'Editar'));
    $this->data['tipo'] = $this->model_tipo_de_para->get(array(model_tipo_de_para::ID => $ID))[0];

    $this->MY_view('importacoes/tipo/editar', $this->data);
  }

  public function atualizar() {
    try {
      $this->validar();
      $campos = array(model_tipo_de_para::DESCRICAO, model_tipo_de_para::TABELA_RM, model_tipo_de_para::CODIGO, model_tipo_de_para::NOME);
      $dados = elements($campos, $this->POST);
      $acao = $this->model_tipo_de_para->save($dados, $this->POST[model_tipo_de_para::ID]);
      if ($acao) {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Tipo atualizado com sucesso.")');
      } else {
        throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Tipo não atualizado.")');
      }
      redirect('importacoes/tipo');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('importacoes/tipo/editar/' . $this->POST[model_tipo_de_para::ID]);
    }
  }

  public function deletar() {
    try {
      if (isset($this->POST['id'])) {

        $ID = $this->POST['id'];
        $acao = $this->model_tipo_de_para->deletar($ID);

        if ($acao) {
          $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Tipo deletado.")');
        } else {
          throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Tipo não deletado.")');
        }
      } else {
        throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Tipo inválido.")');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
    }
    redirect('importacoes/tipo');
  }

  public function getTipo() {
    if ($this->is_ajax()) {
      $campos = $this->model_tipo_de_para->get(array(model_tipo_de_para::TABELA_RM => $this->POST['tabela']));
      $tipo = $this->model_tipo_de_para->getTipoImportacao($this->POST['tabela'], $campos[0][model_tipo_de_para::CODIGO], $campos[0][model_tipo_de_para::NOME]);
      header('Content-Type: application/json');
      echo json_encode($tipo, 3);
    }
  }

}
