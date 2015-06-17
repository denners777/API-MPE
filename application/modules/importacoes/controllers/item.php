<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of item
 *
 * @author denner.fernandes
 */
class item extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->Model('model_item');
  }

  public function __destruct() {
    
  }

  public function index() {

    $this->data['item'] = $this->model_item->getAll();
    $this->data['breadcrumb'] = $this->breadcrumb(array('importacoes', 'item'), array('Importações', 'Item'));
    $this->MY_view('importacoes/item/listar', $this->data);
  }

  public function novo() {

    $this->data['breadcrumb'] = $this->breadcrumb(array('importacoes', 'item', 'novo'), array('Importações', 'Item', 'Novo'));
    $this->MY_view('importacoes/item/novo', $this->data);
  }

  public function cadastrar() {
    try {
      $this->validar();
      $campos = array(model_item::NOME, model_item::VERSAO, model_item::DELIMITADOR);
      $dados = elements($campos, $this->POST);
      $dados[model_item::ID] = $this->model_item->autoincrement();

      settype($dados[model_item::ID], 'integer');

      $acao = $this->model_item->save($dados);

      if ($acao) {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Item cadastrado com sucesso.")');
      } else {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "Item não cadastrado.")');
      }
      redirect('importacoes/item');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('importacoes/item/novo');
    }
  }

  private function validar() {
    if (empty($this->POST[model_item::NOME])) {
      throw new Exception('show_stack_bar_top("error", "Campo vazio", "Campo <b>Nome</b> não pode ficar vazio.");');
    }
  }

  public function editar($ID) {

    $this->data['item'] = $this->model_item->get(array(model_item::ID => $ID))[0];
    $this->data['breadcrumb'] = $this->breadcrumb(array('importacoes', 'item', 'editar'), array('Importações', 'Item', 'Editar'));

    $this->MY_view('importacoes/item/editar', $this->data);
  }

  public function atualizar() {
    try {
      $this->validar();

      $campos = array(model_item::NOME, model_item::VERSAO, model_item::DELIMITADOR);
      $dados = elements($campos, $this->POST);

      $acao = $this->model_item->save($dados, $this->POST[model_item::ID]);
      if ($acao) {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Item atualizado com sucesso.")');
      } else {
        throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Item não atualizado.")');
      }
      redirect('importacoes/item');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('importacoes/item/editar/' . $this->POST[model_item::ID]);
    }
  }

  public function deletar() {
    try {
      if (isset($this->POST['id'])) {

        $ID = $this->POST['id'];
        $acao = $this->model_item->deletar($ID);

        if ($acao) {
          $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Item deletado.")');
        } else {
          throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Item não deletado.")');
        }
      } else {
        throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "Item inválido.")');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
    }
    redirect('importacoes/item');
  }

  public function getItem() {
    if ($this->is_ajax()) {
      $item = $this->model_item->get($this->POST['id']);
      header('Content-Type: application/json');
      echo json_encode($item, 3);
    }
  }

}
