<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historico_secao
 *
 * @author denner.fernandes
 */
class historico_secao {

  public $chapa = '';                     //String 16 1
  public $dataMudanca = '';               //Data 08 2
  public $codigoMotivoMudancaSecao = '';   //String 02 3
  public $codigoSecao = '';               //String 35 4

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->dataMudanca, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->codigoMotivoMudancaSecao, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigoSecao, 35, ' ', STR_PAD_RIGHT), 0, 35);

    return $linha;
  }

}
