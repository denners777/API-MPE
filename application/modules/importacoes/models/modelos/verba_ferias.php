<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of verba_ferias
 *
 * @author denner.fernandes
 */
class verba_ferias {

  public $CHAPA = '';             //string 16
  public $FIMPERAQUIS = '';       //Data 08
  public $DATAPAGTO = '';         //Data 08
  public $CODEVENTO = '';         //string 04
  public $HORA = 0;               //Inteiro 06
  public $REF = 0;                //Real 15
  public $VALOR = 0;              //Real 15
  public $ALTERADOMANUAL = 0;     //Inteiro 02

  public function montar() {

    $linha = substr(str_pad($this->CHAPA, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->FIMPERAQUIS, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->DATAPAGTO, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->CODEVENTO, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->HORA, 6, 0, STR_PAD_LEFT), 0, 6) . ';';
    $linha .= substr(str_pad($this->REF, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->VALOR, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->ALTERADOMANUAL, 2, 0, STR_PAD_LEFT), 0, 2);

    return $linha;
  }
}
