<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rateio_fixo
 *
 * @author denner.fernandes
 */
class rateio_fixo {

  public $chapa = ''; //String 16 1
  public $codigoCentroCusto = ''; //String 25 2
  public $percentualRateio = 0; //(Formato 999, 99) Real 06 3

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_LEFT), 0, 16) . ';';
    $linha .= substr(str_pad($this->codigoCentroCusto, 25, ' ', STR_PAD_RIGHT), 0, 25) . ';';
    $linha .= substr(str_pad($this->percentualRateio, 6, 0, STR_PAD_LEFT), 0, 2);

    return $linha;
  }

}
