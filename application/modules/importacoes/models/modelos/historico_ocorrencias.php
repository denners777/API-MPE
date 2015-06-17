<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historico_ocorrencias
 *
 * @author denner.fernandes
 */
class historico_ocorrencias {

  public $chapa = '';                 //String 16 1
  public $dataMudanca = '';           //Data 08 2
  public $codigoOcorrenciaSefip = 0;  //Valor 03 3

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->dataMudanca, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->codigoOcorrenciaSefip, 3, 0, STR_PAD_LEFT), 0, 3);

    return $linha;
  }

}
