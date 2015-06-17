<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_importacoes
 *
 * @author denner.fernandes
 */
class model_importacoes extends MY_Model {

  private $aDados = array();
  private $layout = array();
  private $item = array();
  private $delimitador = '';
  private $empresa;

  public function __construct() {
    parent::__construct();
  }

  public function __destruct() {
    parent::__destruct();
  }

  public function run() {

    $this->validar();
    $this->prepareDados();
    $this->prepareLayout();
    $this->makeCol();
    $this->makeRow();
    $this->setBanco();
  }

  private function prepareDados() {

    $dados = $dados2 = array();

    foreach ($this->aDados as $key => $value) {

      if (1 == $key) {
        foreach ($value as $letras => $titulos) {
          if (!empty($titulos)) {
            $dados[$letras][] = $titulos;
          }
        }
      } else {
        foreach ($value as $letras => $titulos) {

          if (array_key_exists($letras, $dados)) {
            $dados[$letras][] = $titulos;
          }
        }
      }
    }
    $i = 0;
    foreach ($dados as $letra => $array) {
      foreach ($array as $key => $value) {
        if (0 != $key) {
          if ($array[0] == 'CHAPA') {
            $value = str_pad($value, 6, 0, STR_PAD_LEFT);
          }
          $dados2[$array[0]][] = $value;
        }
      }
    }

    $this->setDados($dados2);
  }

  private function prepareLayout() {

    $dados = array();

    foreach ($this->getLayout() as $key => $value) {

      $dados[$value[model_layout::POSICAO]] = array(
          model_layout::DESCRICAO => $value[model_layout::DESCRICAO],
          model_layout::TAMANHO => $value[model_layout::TAMANHO],
          model_layout::TIPO => $value[model_layout::TIPO],
          model_layout::DEPARA => $value[model_layout::DEPARA],
      );
    }
    $this->setLayout($dados);
  }

  private function makeCol() {

    $registro = array();
    foreach ($this->getLayout() as $key => $posicao) {

      if (isset($this->getDados()[$posicao[model_layout::DESCRICAO]])) {

        for ($i = 0; $i < count($this->getDados()[$posicao[model_layout::DESCRICAO]]); $i++) {

          $registro[$posicao[model_layout::DESCRICAO]][$i] = $this->formatar($this->getDados()[$posicao[model_layout::DESCRICAO]][$i], $posicao[model_layout::TAMANHO], $posicao[model_layout::TIPO], $posicao[model_layout::DEPARA]) . $this->getDelimitador();
        }
      } else {
        $registro[$posicao[model_layout::DESCRICAO]][] = $this->formatar('', $posicao[model_layout::TAMANHO], $posicao[model_layout::TIPO], $posicao[model_layout::DEPARA]) . $this->getDelimitador();
      }
    }

    $this->setDados($registro);
  }

  private function makeRow() {

    $totalDados = $this->getMaior($this->getDados());
    $totalLayout = count($this->getLayout());
    $linha = array();

    for ($i = 0; $i < $totalDados; $i++) {

      foreach ($this->getLayout() as $posicao => $label) {

        if (isset($this->getDados()[$label[model_layout::DESCRICAO]][$i])) {
          if (!isset($linha[$i])) {
            $linha[$i] = $this->getDados()[$label[model_layout::DESCRICAO]][$i];
          } else {
            $linha[$i] .= $this->getDados()[$label[model_layout::DESCRICAO]][$i];
          }
        } else {
          if (!isset($linha[$i])) {
            $linha[$i] = $this->getDados()[$label[model_layout::DESCRICAO]][0];
          } else {
            $linha[$i] .= $this->getDados()[$label[model_layout::DESCRICAO]][0];
          }
        }
      }
    }

    $this->setDados($linha);
  }

  private function getMaior($dados = array()) {

    $maior = 0;
    if (is_array($dados)) {
      foreach ($dados as $value) {
        if (count($value) > $maior) {
          $maior = count($value);
        }
      }
    }
    return $maior;
  }

  private function validar() {
    if (empty($this->getLayout())) {
      throw new Exception('O layout não foi carregado no objeto.');
    }
    if (empty($this->getDelimitador())) {
      throw new Exception('O delimitador não foi carregado no objeto.');
    }
    if (empty($this->getEmpresa())) {
      throw new Exception('A empresa não foi carregada no objeto.');
    }
    if (empty($this->getDados())) {
      throw new Exception('Os dados não foram carregados no objeto.');
    }
  }

  private function formatar($registro, $tamanho, $tipo, $depara = NULL) {

    $memo1 = $memo2 = '';
    $preencher = ' ';
    $str_pad = STR_PAD_RIGHT;
    $restringe = FALSE;

    $registro = trim($registro);

    if ($depara !== NULL && !empty($registro)) {

      $splode = explode('||', $registro);
      $variante = '';

      if (isset($splode[1])) {
        $registro = $splode[0];
        $variante = $splode[1];

        $para = $this->model_de_para->get(
                array(
                    model_de_para::TIPO => $depara,
                    model_de_para::DE => (string) $registro,
                    model_de_para::VARIANTE => (string) $variante
                )
        );
      } else {
        $para = $this->model_de_para->get(
                array(
                    model_de_para::TIPO => $depara,
                    model_de_para::DE => (string) $registro
                )
        );
      }

      if (isset($para[0][model_de_para::PARA])) {
        $registro = '';
        if (count($para) > 1) {
          foreach ($para as $value) {
            $registro .= 'DUPLICADO: ' . $value[model_de_para::PARA] . ' | ';
            $tamanho = strlen($registro);
          }
        } else {
          $registro = $para[0][model_de_para::PARA];
        }
      } else {

        $registro = 'FALTA DEPARA | ' . $registro;
        $restringe = TRUE;
        $tamanho = strlen($registro);
      }
    }

    if (!$restringe) {
      if ($tipo == 'INTEGER' || $tipo == 'REAL' || $tipo == 'DATA') {

        if (!empty($registro)) {
          $preencher = 0;
        } else {
          $preencher = ' ';
        }
        $str_pad = STR_PAD_LEFT;
        $registro = str_replace('.', '', str_replace(',', '', $registro));

        if ($tipo == 'REAL') {

          if (is_null($registro) || empty($registro) || $registro == 0) {
            $registro = str_pad($registro, 3, 0);
          }

          $registro = substr($registro, 0, -2) . ',' . substr($registro, -2);
        }
      } else {
        if ($tipo == 'MEMO') {
          $memo1 = '/@';
          $memo2 = '@/';
        }
        $preencher = ' ';
      }
    }

    return $memo1 . substr(str_pad(retiraAcentos($registro), $tamanho, $preencher, $str_pad), 0, $tamanho) . $memo2;
  }

  private function setBanco() {

    $this->load->Model('model_linha');
    foreach ($this->getDados() as $key => $value) {

      $dados = array(
          model_linha::ID => $this->model_linha->autoincrement(),
          model_linha::LAYOUT => $this->getItem(),
          model_linha::EMPRESA => $this->getEmpresa(),
          model_linha::LINHA => $value
      );
      settype($dados[model_linha::ID], 'integer');
      $acao = $this->model_linha->save($dados);

      if (!$acao) {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Linha não cadastrada", "' . $value . '")');
      }
    }
  }

  public function getDados() {
    return $this->aDados;
  }

  public function setDados($dados) {
    $this->aDados = $dados;
  }

  public function getDelimitador() {
    return $this->delimitador;
  }

  public function setDelimitador($delimitador) {
    $this->delimitador = $delimitador;
  }

  public function getEmpresa() {
    return $this->empresa;
  }

  public function setEmpresa($empresa) {
    $this->empresa = $empresa;
  }

  public function getLayout() {
    return $this->layout;
  }

  public function setLayout($layout) {
    $this->layout = $layout;
  }

  public function getItem() {
    return $this->item;
  }

  public function setItem($item) {
    $this->item = $item;
  }

}
