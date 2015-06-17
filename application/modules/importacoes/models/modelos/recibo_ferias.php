<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of recibo_ferias
 *
 * @author denner.fernandes
 */
class recibo_ferias {

  public $CHAPA = '';           //string 16
  public $FIMPERAQUIS = '';     //Data 08
  public $DATAPAGTO = '';       //Data 08
  public $INSS1 = 0;            //Real 15
  public $INSS2 = 0;            //Real 15
  public $IRRF = 0;             //Real 15
  public $BASEINSS1 = 0;        //Real 15
  public $BASEINSS2 = 0;        //Real 15
  public $BASEIRRF = 0;         //Real 15
  public $LIQUIDO = 0;          //Real 15
  public $OBSERVACAO = '';      //string 80
  public $EXECID = '';          //string 80
  public $PENSAO = 0;           //Real 15
  public $BASEPENSAO = 0;       //Real 15
  public $VALORESFORCADOS = 0;  //Inteiro 01
  public $MEDIAPERAQATUAL = 0;  //Real 15
  public $MEDIAPROXPERAQ = 0;   //Real 15
  public $SALARIO = 0;          //Real 15

  public function montar() {

    $linha = substr(str_pad($this->CHAPA, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->FIMPERAQUIS, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->DATAPAGTO, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->INSS1, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->INSS2, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->IRRF, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->BASEINSS1, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->BASEINSS2, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->BASEIRRF, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->LIQUIDO, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->OBSERVACAO, 80, ' ', STR_PAD_RIGHT), 0, 80) . ';';
    $linha .= substr(str_pad($this->EXECID, 80, ' ', STR_PAD_RIGHT), 0, 80) . ';';
    $linha .= substr(str_pad($this->PENSAO, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->BASEPENSAO, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->VALORESFORCADOS, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->MEDIAPERAQATUAL, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->MEDIAPROXPERAQ, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->SALARIO, 15, 0, STR_PAD_LEFT), 0, 15);

    return $linha;
  }

}
