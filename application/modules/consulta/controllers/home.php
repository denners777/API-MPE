<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

use \PHPExcel;

class home extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->Model('model_perguntas');
  }

  public function index() {
    try {

      $this->data['qtdFornecedor'] = $this->model_perguntas->qtdFornecedor()[0]['QTD'];
      $this->data['qtdProduto'] = $this->model_perguntas->qtdProdutoServico()[0]['QTD'];
      $this->data['qtdServico'] = $this->model_perguntas->qtdProdutoServico('S')[0]['QTD'];

      $this->data['breadcrumb'] = $this->breadcrumb(array('consulta'), array('Consulta'));

      $this->MY_view('consulta/home', $this->data);
    } catch (Exception $ex) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
    }
  }

  public function fornecedores() {
    try {
      if (!empty($this->POST)) {

        $this->data['fornecedores'] = $this->model_perguntas->fornecedor($this->POST['fornecedor']);

        $this->data['breadcrumb'] = $this->breadcrumb(array('consulta', 'fornecedores'), array('Consulta', 'Fornecedores'));
        $this->data['resultado'] = empty($this->POST['fornecedor']) ? 'Tudo' : $this->POST['fornecedor'];
        $this->data['qtdFornecedor'] = $this->model_perguntas->qtdFornecedor()[0]['QTD'];
        $this->MY_view('consulta/fornecedores', $this->data);
      } else {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "Acesso negado a essa action")');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('consulta/home');
    }
  }

  public function produtos() {
    try {
      if (!empty($this->POST)) {

        $this->data['produtos'] = $this->model_perguntas->produto($this->POST['produto']);

        $this->data['breadcrumb'] = $this->breadcrumb(array('consulta', 'produtos'), array('Consulta', 'Produtos e Serviços'));
        $this->data['resultado'] = empty($this->POST['produto']) ? 'Tudo' : $this->POST['produto'];
        $this->data['qtdProduto'] = $this->model_perguntas->qtdProdutoServico()[0]['QTD'];
        $this->data['qtdServico'] = $this->model_perguntas->qtdProdutoServico('S')[0]['QTD'];
        $this->MY_view('consulta/produtos', $this->data);
      } else {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "Acesso negado a essa action")');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('consulta/home');
    }
  }

  public function writeXls() {
    try {
      if (isset($this->POST)) {

        $busca = $this->POST['busca'];
        $tipo = $this->POST['tipo'];

        if ($tipo == 'fornecedor') {
          $dados = $this->model_perguntas->fornecedor($busca);
        } else {
          $dados = $this->model_perguntas->produto($busca);
        }

        //$this->load->library('PHPExcel');
        $objPHPExcel = new \PHPExcel();
        //echo '<xmp>', print_r($this->data['funcionario'][model_funcionario::NOME]), exit;
        $objPHPExcel->getProperties()->setCreator($this->data['funcionario'][model_funcionario::NOME])
                ->setLastModifiedBy($this->data['funcionario'][model_funcionario::NOME])
                ->setTitle('Relatorio de Arquivos Gerados:')
                ->setSubject('Consulta')
                ->setDescription('Relatorio do APP-CADASTRO')
                ->setCategory('Relatorios');
        $objPHPExcel->getActiveSheet()->setTitle('Arquivos Gerados');

        $alpha = 'ABCDEFGHIJKLMNOPQRSTUVXZ';
        $i = 0;

        foreach ($dados as $key => $value) {
          $i++;
          $j = 0;
          foreach ($value as $key2 => $value2) {
            if (1 == $i) {
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue($alpha[$j] . $i, $key2);
              $k = $i + 1;
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue($alpha[$j] . $k, $value2);
            } else {
              $k = $i + 1;
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue($alpha[$j] . $k, $value2);
            }
            $j++;
          }
        }
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);

        header("HTTP/1.1 200 OK");
        header("Pragma: public");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Relatório de ' . $tipo .' - ' . date('Ymd-His') . '.xlsx"');
        header("Content-Transfer-Encoding: binary");
//header('Cache-Control: max-age=1');

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('php://output');
      } else {
        throw new Exception('show_stack_bar_top("error", "Erro", "Acesso ilegal.")');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
    }
  }

  public function __destruct() {
    
  }

}
