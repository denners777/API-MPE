<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gdepto
 *
 * @author denner.fernandes
 */
class gdepto {

  public $CODCOLIGADA = '';     //Inteiro 3
  public $CODFILIAL = '';       //Inteiro 3
  public $CODDEPARTAMENTO = ''; //String 25
  public $NOME = '';            //String 40
  public $CONTATO = '';         //String 40
  public $LOCALIZACAO = '';     //String 40
  public $TELEFONE = '';        //String 15
  public $FAX = '';             //String 15
  public $RAMAL = '';           //String 5
  public $CODCOLCONTAGER = '';  //Inteiro 3
  public $CODCONTAGER = '';     //String 40
  public $ATIVO = '';           //String 1
  public $EMAIL = '';           //String 60 - fora do layout

  public function montar() {
    $linha = substr(str_pad($this->CODCOLIGADA, 3, 0, STR_PAD_LEFT), 0, 3) . ';';
    $linha .= substr(str_pad($this->CODFILIAL, 3, 0, STR_PAD_LEFT), 0, 3) . ';';
    $linha .= substr(str_pad($this->CODDEPARTAMENTO, 25, ' ', STR_PAD_RIGHT), 0, 25) . ';';
    $linha .= substr(str_pad($this->NOME, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->CONTATO, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->LOCALIZACAO, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->TELEFONE, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->FAX, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->RAMAL, 5, ' ', STR_PAD_RIGHT), 0, 5) . ';';
    $linha .= substr(str_pad($this->CODCOLCONTAGER, 3, 0, STR_PAD_LEFT), 0, 3) . ';';
    $linha .= substr(str_pad($this->CODCONTAGER, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->ATIVO, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->EMAIL, 60, ' ', STR_PAD_RIGHT), 0, 60);
    return $linha;
  }

}
