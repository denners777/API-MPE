<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of codigo_fixo
 *
 * @author denner.fernandes
 */
class codigo_fixo {

  public $chapa = '';               //String 16
  public $codigoEvento = '';        //String 4
  public $valor = '';               //Real 15  00000000,00
  public $numeroVezes = '';         //Inteiro 3
  public $tipo = '';                //Inteiro 2

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_LEFT), 0, 16) . ';';
    $linha .= substr(str_pad($this->codigoEvento, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->valor, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->numeroVezes, 3, 0, STR_PAD_LEFT), 0, 3) . ';';
    $linha .= substr(str_pad($this->tipo, 2, 0, STR_PAD_LEFT), 0, 2);

    return $linha;
  }

}
