<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of importacao_funcionarios
 *
 * @author denner.fernandes
 */
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class importacao_funcionarios extends MY_Controller {

  private $empresa = '';

  public function __construct() {
    parent::__construct();

    $this->load->Model('model_importacao_funcionarios');
  }

  public function index() {
    try {

      if ($this->POST) {
        $this->load->Model('model_empresa');
        if ($this->POST['busca'] != '') {
          $this->data['funcionarios'] = $this->model_importacao_funcionarios->getLike($this->POST['busca']);
        } else {
          $this->data['funcionarios'] = $this->model_importacao_funcionarios->getAll();
        }
        $this->data['resultado'] = $this->POST['busca'];
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
    }

    $this->data['breadcrumb'] = $this->breadcrumb(array('nucleo', 'importacao_funcionarios'), array('Núcleo', 'Importar Funcionários'));

    $this->MY_view('nucleo/importar/listar', $this->data);
  }

  public function novo() {
    try {

      $this->load->Model('model_empresa');
      $this->data['empresa'] = $this->model_empresa->getAll();
      $this->data['breadcrumb'] = $this->breadcrumb(array('nucleo', 'importacao_funcionarios', 'novo'), array('Núcleo', 'Importar Funcionários', 'Importar'));
      $this->MY_view('nucleo/importar/novo', $this->data);
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "' . $exc->getMessage() . '")');
    }
  }

  public function importar() {

    try {

      $this->valida();
      $this->empresa = $this->POST['empresa'];
      $xls = pathinfo($_FILES['file']['name']);

      $this->load->helper('functions');
      $file = doUpload('file');
      $dados = readXLS($xls['extension'], $file);
      $this->validaFuncionario($dados);

      redirect('nucleo/importacao_funcionarios');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('nucleo/importacao_funcionarios/novo');
    }
  }

  public function valida() {
    if (empty($this->POST['empresa'])) {
      throw new Exception('Escolha uma Empresa.');
    }
    if (empty($_FILES['file'])) {
      throw new Exception('Não foi enviado nenhum arquivo.');
    }
  }

  private function validaFuncionario($dados) {

    //Inicio do transact
    $this->db->trans_start();
    foreach ($dados as $key => $value) {
      $campos = array();
      $dado = array();

      if ($value['A'] != 'CHAPA' && !is_null($value['A'])) {
        $campos['chapa'] = isset($value['A']) ? str_pad((int) $value['A'], 6, "0", STR_PAD_LEFT) : '';
        $campos['nome'] = trim(str_replace('\'', '', $value['B']));
        $campos['eo'] = str_pad((int) $value['C'], 6, "0", STR_PAD_LEFT);
        $campos['cpf'] = trim(str_replace('/', '', str_replace('-', '', str_replace('.', '', $value['D']))));
        $campos['situacao'] = trim($value['E']);
        $campos['periodo'] = trim($value['F']);
        $admissao = str_pad(trim($value['G']), 8, '0', STR_PAD_LEFT);
        $campos['admissao'] = substr($admissao, 0, 2) . '/' . substr($admissao, 2, 2) . '/' . substr($admissao, 4, 4);
        $campos['descricao'] = trim($value['H']);
        $campos['cargo'] = trim($value['I']);
        $campos['email'] = trim($value['J']);
        $campos['empresa'] = $this->empresa;

        $dado[model_importacao_funcionarios::CHAPA] = $campos['chapa'];
        $dado[model_importacao_funcionarios::NOME] = $campos['nome'];
        $dado[model_importacao_funcionarios::SECAO] = $campos['eo'];
        $dado[model_importacao_funcionarios::CPF] = $campos['cpf'];
        $dado[model_importacao_funcionarios::SITUACAO] = $campos['situacao'];
        $dado[model_importacao_funcionarios::TIPO] = $campos['periodo'];
        $dado[model_importacao_funcionarios::ADMISSAO] = $campos['admissao'];
        $dado[model_importacao_funcionarios::DESCRICAO] = $campos['descricao'];
        $dado[model_importacao_funcionarios::CARGO] = $campos['cargo'];
        $dado[model_importacao_funcionarios::EMAIL] = $campos['email'];
        $dado[model_importacao_funcionarios::EMPRESA] = $campos['empresa'];

        settype($dado[model_importacao_funcionarios::SECAO], 'string');

        $info = $this->model_importacao_funcionarios->get(
                array(
                    model_importacao_funcionarios::EMPRESA => $this->empresa,
                    model_importacao_funcionarios::CPF => $campos['cpf'],
                    model_importacao_funcionarios::CHAPA => $campos['chapa'],
                )
        );
        if (empty($info)) {
          $dado[model_importacao_funcionarios::ID] = $this->model_importacao_funcionarios->autoincrement();
          settype($dado[model_importacao_funcionarios::ID], 'int');
          $acao = $this->model_importacao_funcionarios->save($dado);
        } else {
          $acao = $this->model_importacao_funcionarios->save($dado, array(
              model_importacao_funcionarios::EMPRESA => $this->empresa,
              model_importacao_funcionarios::CPF => $campos['cpf'],
              model_importacao_funcionarios::CHAPA => $campos['chapa'],
                  )
          );
        }

        if (!$acao) {
          $this->msgError .= 'Ocorreu um erro ao importar o funcionário ' . $campos['nome'] . ' - ' . $campos['chapa'] . '<br>';
        }
      }
    }
    //Final do transact
    $this->db->trans_complete();
    if (!is_null($this->msgError)) {
      $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "' . $this->msgError . '")');
    } else {
      $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Funcionários importados com sucesso.")');
    }
  }

}
