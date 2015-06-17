<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dados_bancarios
 *
 * @author rafael.reis
 */
class dados_bancarios {

  public $chapa = '';               // String 16 1
  public $bancoPagamento = '';      // String 3 2
  public $agenciaPagamento = '';    // String 6 3
  public $contaPagamento = '';      // String 15 4
  public $operacaoBancaria = '';    // String 5 5
  public $dataMudanca = '';         // Data 8 6

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->bancoPagamento, 3, ' ', STR_PAD_LEFT), 0, 3) . ';';
    $linha .= substr(str_pad($this->agenciaPagamento, 6, ' ', STR_PAD_LEFT), 0, 6) . ';';
    $linha .= substr(str_pad($this->contaPagamento, 15, ' ', STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->operacaoBancaria, 5, ' ', STR_PAD_LEFT), 0, 5) . ';';
    $linha .= substr(str_pad($this->dataMudanca, 8, ' ', STR_PAD_LEFT), 0, 8);

    return $linha;
  }

}
