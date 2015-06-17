<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of periodo_aquisitivo
 *
 * @author denner.fernandes
 */
class periodo_aquisitivo {

  public $CHAPA = '';           //string 16
  public $FIMPERAQUIS = '';     //Data 08
  public $INICIOPERAQUIS = '';  //Data 08
  public $SALDO = 0;            //Real 15
  public $PERIODOABERTO = 0;    //Inteiro 02
  public $PERIODOPERDIDO = 0;   //Inteiro 02
  public $MOTIVOPERDA = '';     //string 02
  public $FALTAS = 0;           //Real 15

  public function montar() {

    $linha = substr(str_pad($this->CHAPA, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->FIMPERAQUIS, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->INICIOPERAQUIS, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->SALDO, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->PERIODOABERTO, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->PERIODOPERDIDO, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->MOTIVOPERDA, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->FALTAS, 15, 0, STR_PAD_LEFT), 0, 15);

    return $linha;
  }

}
