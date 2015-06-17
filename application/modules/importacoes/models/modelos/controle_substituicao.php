<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controle_substituicao
 *
 * @author denner.fernandes
 */
class controle_substituicao {

  public $chapa = '';                           //String 16 1
  public $anoSubstituicao = 0;                  //Inteiro 4 2
  public $mesSubstituicao = 0;                  //Inteiro 2 3
  public $codigoFuncaoSubstituida = '';         //String 10 4
  public $codigoFaixaSalarialSubstituida = '';  //String 10 5
  public $chapaSubstituida = '';                //String 16 6
  public $numeroHoras = '';                     //(Formato HHH:MM) String 6 6
  public $numeroHorasOriginal = '';             //(Formato HHH:MM) String 6 7
  public $nivelSalarial = '';                   //String 10 8
  public $secao = '';                           //String 35 9

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_LEFT), 0, 16) . ';';
    $linha .= substr(str_pad($this->anoSubstituicao, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->mesSubstituicao, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigoFuncaoSubstituida, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->codigoFaixaSalarialSubstituida, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->chapaSubstituida, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->numeroHoras, 6, ' ', STR_PAD_RIGHT), 0, 6) . ';';
    $linha .= substr(str_pad($this->numeroHorasOriginal, 6, ' ', STR_PAD_RIGHT), 0, 6) . ';';
    $linha .= substr(str_pad($this->nivelSalarial, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->secao, 35, ' ', STR_PAD_RIGHT), 0, 35);

    return $linha;
  }

}
