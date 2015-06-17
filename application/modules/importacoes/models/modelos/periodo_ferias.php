<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of periodo_ferias
 *
 * @author rafael.reis e denner.fernandes
 */
class periodo_ferias {

  public $chapaFuncionario = '';      // String 16 1
  public $dataVencimento = '';        // Data 08 2
  public $numeroPeriodo = 0;          // Inteiro 02 3
  public $dataPagamento = '';         // Data 08 4
  public $dataAviso = '';             // Data 08 5
  public $observacao = '';            // String 80 6
  public $baseInssMes = 0;            // Real 9 7
  public $baseInssProximoMes = 0;     // Real 9 8

  public function montar() {

    $linha = substr(str_pad($this->chapaFuncionario, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha = substr(str_pad($this->dataVencimento, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->numeroPeriodo, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha = substr(str_pad($this->dataPagamento, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha = substr(str_pad($this->dataAviso, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha = substr(str_pad($this->observacao, 80, ' ', STR_PAD_RIGHT), 0, 80) . ';';
    $linha = substr(str_pad($this->baseInssMes, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha = substr(str_pad($this->baseInssProximoMes, 9, 0, STR_PAD_LEFT), 0, 9);

    return $linha;
  }

}
