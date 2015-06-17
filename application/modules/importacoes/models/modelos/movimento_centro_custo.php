<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of movimento_centro_custo
 *
 * @author denner.fernandes
 */
class movimento_centro_custo {

  public $chapa = '';           //String  16 1
  public $anoCompetencia = 0;   //Inteiro 04 2
  public $mesCompetencia = 0;   //Inteiro 02 3
  public $numeroPeriodo = 0;    //Inteiro 04 4
  public $codigoEvento = '';    //String 04 5
  public $hora = '';            //(Formato HHH:MM) String 06 6
  public $referencia = 0;       //(Formato 999,99 Real 09 7
  public $valor = 0;            //(Formato 999999,99 Real 09 8
  public $centroCusto = '';     //String 25 9

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->anoCompetencia, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->mesCompetencia, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->numeroPeriodo, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->codigoEvento, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->hora, 6, ' ', STR_PAD_RIGHT), 0, 6) . ';';
    $linha .= substr(str_pad($this->referencia, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->valor, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->centroCusto, 25, ' ', STR_PAD_RIGHT), 0, 25);

    return $linha;
  }

}
