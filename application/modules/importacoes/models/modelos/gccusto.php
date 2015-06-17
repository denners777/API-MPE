<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gccusto
 *
 * @author denner.fernandes
 */
class gccusto {

  public $CODCOLIGADA = 0;        //Inteiro 3
  public $CODCCUSTO = '';         //String 25
  public $NOME = '';              //String 40
  public $CODCOLCONTAGER = 0;     //Inteiro 3
  public $CODCONTAGER = '';       //String 40
  public $CODCOLCONTA = 0;        //Inteiro 3
  public $CODCONTA = '';          //String 40
  public $CODREDUZIDO = '';       //String 25
  public $CAMPOLIVRE = '';        //String 100
  public $ATIVO = '';             //String 1
  public $PERMITELANC = '';       //String 1
  public $CODCLASSIFICA = '';     //String 10
  public $ENVIASPED = '';         //String 1 - fora do layout

  public function montar() {

    $linha = substr(str_pad($this->CODCOLIGADA, 3, ' ', STR_PAD_LEFT), 0, 3) . ';';
    $linha .= substr(str_pad($this->CODCCUSTO, 25, ' ', STR_PAD_RIGHT), 0, 25) . ';';
    $linha .= substr(str_pad($this->NOME, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->CODCOLCONTAGER, 3, ' ', STR_PAD_RIGHT), 0, 3) . ';';
    $linha .= substr(str_pad($this->CODCONTAGER, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->CODCOLCONTA, 3, ' ', STR_PAD_RIGHT), 0, 3) . ';';
    $linha .= substr(str_pad($this->CODCONTA, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->CODREDUZIDO, 25, ' ', STR_PAD_RIGHT), 0, 25) . ';';
    $linha .= substr(str_pad($this->CAMPOLIVRE, 100, ' ', STR_PAD_RIGHT), 0, 100) . ';';
    $linha .= substr(str_pad($this->ATIVO, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->PERMITELANC, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->CODCLASSIFICA, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->ENVIASPED, 1, ' ', STR_PAD_RIGHT), 0, 1);

    return $linha;
  }

}
