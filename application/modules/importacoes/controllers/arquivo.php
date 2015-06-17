<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of arquivo
 *
 * @author denner.fernandes
 */
class arquivo extends MY_Controller {

  public function __construct() {
    parent::__construct();

    $this->load->Model('model_linha');
  }

  public function index() {
    $this->load->helper('functions');
    @$this->data['linha'] = $this->model_linha->getAll();
    $this->data['breadcrumb'] = $this->breadcrumb(array('importacoes', 'arquivo'), array('Importações', 'Arquivos'));
    $this->MY_view('importacoes/arquivo/listar', $this->data);
  }

  public function visualisar($ID) {

    $this->data['linha'] = $this->model_linha->get(array(model_linha::LAYOUT => $ID));
    $this->data['breadcrumb'] = $this->breadcrumb(array('importacoes', 'arquivo', 'visualisar'), array('Importações', 'Arquivos', 'Visualisar'));

    $this->MY_view('importacoes/arquivo/visualisar', $this->data);
  }

  public function geraArquivo($ID, $empresa, $nome) {
    $this->load->helper('functions');
    $dados = $this->model_linha->get(
            array(
                model_linha::LAYOUT => $ID,
                model_linha::EMPRESA => $empresa
            )
    );
    writeExportRM($dados, $nome);
  }

  public function deletar() {
    try {
      if (isset($this->POST['id'])) {

        $ID = $this->POST['id'];
        $acao = $this->model_linha->deletarByItem($ID);

        if ($acao) {
          $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Registros deletados.")');
        } else {
          throw new Exception('show_stack_bar_top("error", "Erro", "Registros não deletados.")');
        }
      } else {
        throw new Exception('show_stack_bar_top("error", "Erro", "Registro inválido.")');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
    }
    redirect('importacoes/arquivo');
  }

}