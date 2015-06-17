<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of salario_composto
 *
 * @author denner.fernandes
 */
class salario_composto {

  public $chapa = '';           //String 16 1
  public $numeroSalario = 0;    //Inteiro 02 2
  public $codigoEvento = '';    //String 04 3
  public $jornada = '';         //(Formato HHH : MM) String 06 4
  public $valor = 0;            //(Formato 999999999999, 99) Real 15 5

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->numeroSalario, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigoEvento, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->jornada, 6, ' ', STR_PAD_RIGHT), 0, 6) . ';';
    $linha .= substr(str_pad($this->valor, 15, 0, STR_PAD_LEFT), 0, 15);

    return $linha;
  }

}
