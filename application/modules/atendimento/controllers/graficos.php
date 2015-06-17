<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of graficos
 *
 * @author denner.fernandes
 */
class graficos extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->Model('model_graficos');
    $this->load->Model('model_listagem_geral');
  }

  public function index() {

    try {
      if ($this->POST) {

        $dest1 = $dest2 = $dest3 = $dest4 = $dest5 = '';
        if ($this->POST['fila'] != 'ALL') {
          $dest1 = 'danger';
        }
        if ($this->POST['responsavel'] != 'ALL') {
          $dest2 = 'danger';
        }
        if ($this->POST['datade'] != 'ALL') {
          $dest3 = 'danger';
        }
        if ($this->POST['dataate'] != 'ALL') {
          $dest4 = 'danger';
        }
        if (isset($this->POST['proprietario'])) {

          if ($this->POST['proprietario'] != '') {
            $dest5 = 'danger';
          }

          $proprietario = implode(' - ', $this->POST['proprietario']);
          $proprietarios = $this->POST['proprietario'];
        } else {
          $proprietario = $proprietarios = 'ALL';
        }

        $this->data['resultado'] = 'Fila: <span class="text-' . $dest1 . '">' . $this->POST['fila'] . '</span> 
                                  | Responsável: <span class="text-' . $dest2 . '">' . $this->POST['responsavel'] . '</span> 
                                  | Proprietário: <span class="text-' . $dest5 . '">' . $proprietario . '</span> ';

        if ($this->POST['grafico'] == 'abertoAtendente') {
          $this->data['abertoAtendente'] = $this->model_graficos->graficoAbertosPorAtendente($this->POST['fila'], $this->POST['responsavel'], $proprietarios);
        }

        if ($this->POST['grafico'] == 'abertoDepartamento') {
          $this->data['abertoDepartamento'] = $this->model_graficos->graficoAbertosPorDepartamento($this->POST['fila'], $this->POST['responsavel'], $proprietarios);
        }

        if ($this->POST['grafico'] == 'encerradoAtendente') {
          $this->valida();
          $this->data['resultado'] .= '| Período entre: <span class="text-' . $dest3 . '">' . $this->POST['datade'] . '</span> a <span class="text-' . $dest4 . '">' . $this->POST['dataate'] . '</span>';
          $this->data['encerradoAtendente'] = $this->model_graficos->graficoEncerradosPorAtendente($this->POST['fila'], $this->POST['responsavel'], $this->POST['datade'], $this->POST['dataate'], $proprietarios);
        }

        if ($this->POST['grafico'] == 'encerradoDepartamento') {
          $this->valida();
          $this->data['resultado'] .= ' | Período entre: ' . $this->POST['datade'] . ' a ' . $this->POST['dataate'];
          $this->data['encerradoDepartamento'] = $this->model_graficos->graficoEncerradosPorDepartamento($this->POST['fila'], $this->POST['responsavel'], $this->POST['datade'], $this->POST['dataate'], $proprietarios);
        }
      }
      $this->data['breadcrumb'] = $this->breadcrumb(array('atendimento', 'grafico'), array('Atendimento', 'Gráficos'));

      $this->data['fila'] = $this->model_listagem_geral->listFila();
      $this->data['responsavel'] = $this->model_listagem_geral->listResponsavel();
      $this->data['proprietario'] = $this->model_listagem_geral->listProprietario();

      $this->MY_view('atendimento/graficos', $this->data);
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "' . $exc->getMessage() . '")');
      redirect('atendimento/graficos');
    }
  }

  public function valida() {

    if (empty($this->POST['datade'])) {
      throw new Exception('Campo <b>Data de</b> não pode ficar vazio.');
    }

    if (empty($this->POST['dataate'])) {
      throw new Exception('Campo <b>Data até</b> não pode ficar vazio.');
    }

    if ($this->POST['datade'] > $this->POST['dataate']) {
      throw new Exception('Intervalo de data não válido.');
    }
  }

  public function getResponsavel() {
    if ($this->is_ajax()) {
      $responsavel = $this->model_listagem_geral->listResponsavel($this->POST['fila'], $this->POST['datade'], $this->POST['dataate'], $this->POST['grafico']);

      header('Content-Type: application/json');
      echo json_encode($responsavel, 3);
    }
  }

  public function getProprietario() {
    if ($this->is_ajax()) {
      $proprietario = $this->model_listagem_geral->listProprietario($this->POST['fila'], $this->POST['responsavel'], $this->POST['datade'], $this->POST['dataate'], $this->POST['grafico']);

      header('Content-Type: application/json');
      echo json_encode($proprietario, 3);
    }
  }

}
