<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historico_contribuicao_sindical
 *
 * @author denner.fernandes
 */
class historico_contribuicao_sindical {

  public $chapa = '';             //String 16 1
  public $dataContribuicao = '';  //Data 08 2
  public $codigoSindicato = '';   //String 10 3
  public $valor = 0;              //(Formato 999999999999,99) Real 15 4

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->dataContribuicao, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->codigoSindicato, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->valor, 15, 0, STR_PAD_LEFT), 0, 15);

    return $linha;
  }

}
