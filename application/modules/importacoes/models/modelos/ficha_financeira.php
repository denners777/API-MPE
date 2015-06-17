<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ficha_financeira
 *
 * @author denner.fernandes
 */
class ficha_financeira {

  public $chapa = '';               //String 16 1
  public $anoCompetencia = 0;       //Inteiro 04 2
  public $mesCompetencia = 0;       //Inteiro 02 3
  public $numeroPeriodo = 0;        //Inteiro 02 4
  public $codigoEvento = '';        //String 04 5
  public $dataPagamento = '';       //Data 08 6
  public $hora = '';                //(Formato HHH:MM) String 06 7
  public $referencia = 0;          //(Formato 999, 99) Real 06 8
  public $valor = 0;                //(Formato 999999999999, 99) Real 15 9
  public $valorOriginal = 0;        //(Formato 999999999999, 99) Real 15 10

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->anoCompetencia, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->mesCompetencia, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->numeroPeriodo, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigoEvento, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->dataPagamento, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->hora, 6, ' ', STR_PAD_RIGHT), 0, 6) . ';';
    $linha .= substr(str_pad($this->referencia, 6, 0, STR_PAD_LEFT), 0, 6) . ';';
    $linha .= substr(str_pad($this->valor, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->valorOriginal, 15, 0, STR_PAD_LEFT), 0, 15);

    return $linha;
  }

}
