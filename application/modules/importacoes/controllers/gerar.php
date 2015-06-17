<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of importar
 *
 * @author denner.fernandes
 */
class gerar extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->Model('model_item');
    $this->load->Model('model_layout');
  }

  public function __destruct() {
    
  }

  public function index() {

    $this->load->Model('nucleo/model_empresa');
    $this->data['item'] = $this->model_item->getAllUsed();
    $this->data['empresas'] = $this->model_empresa->getAll();
    $this->data['breadcrumb'] = $this->breadcrumb(array('importacoes', 'gerar'), array('Importações', 'Gerar'));
    $this->MY_view('importacoes/gerar/form', $this->data);
  }

  public function router() {
    try {

      $xls = pathinfo($_FILES['file']['name']);

      $this->load->helper('functions');
      $file = doUpload('file', 'importacoes');
      $dados = readXLS($xls['extension'], $file);

      $this->load->Model('model_de_para');
      $this->load->Model('model_importacoes');

      $item = $this->model_item->get($this->POST['item'])[0];
      $layout = $this->model_layout->get(array(model_layout::ITEM => $item[model_item::ID]));
      $delimitador = $item[model_item::DELIMITADOR];

      $this->model_importacoes->setEmpresa($this->POST['empresa']);
      $this->model_importacoes->setLayout($layout);
      $this->model_importacoes->setDelimitador($delimitador);
      $this->model_importacoes->setDados($dados);
      $this->model_importacoes->setItem($this->POST['item']);
      $this->db->trans_start();
      $this->model_importacoes->run();
      $this->db->trans_complete();

      redirect('importacoes/arquivo/');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "' . $exc->getMessage() . '")');
      redirect('importacoes/gerar/');
    }
  }

}
