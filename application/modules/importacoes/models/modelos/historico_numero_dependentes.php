<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historico_numero_dependentes
 *
 * @author denner.fernandes
 */
class historico_numero_dependentes {

  public $chapa = '';                                 //String 16 1
  public $dataMudanca = '';                           //Data 08 2
  public $numeroDependentesIncidemIrrf = 0;           //Inteiro 02 3
  public $numeroDependentesIncidemSalarioFamilia = 0; //Inteiro 02 4

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->dataMudanca, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->numeroDependentesIncidemIrrf, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->numeroDependentesIncidemSalarioFamilia, 2, 0, STR_PAD_LEFT), 0, 2);

    return $linha;
  }

}
