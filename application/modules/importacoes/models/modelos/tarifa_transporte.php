<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tarifa_transporte
 *
 * @author denner.fernandes
 */
class tarifa_transporte {

  public $codigoTarifa = '';    //String 03 1
  public $inicioVigencia = '';  //Data 08 2
  public $finalVigencia = '';   //Data 08 3
  public $descricaoTarifa = ''; //String 30 4
  public $valorTarifa = 0;      //(Formato 99999,99) Real 08 5

  public function montar() {

    $linha = substr(str_pad($this->codigoTarifa, 3, ' ', STR_PAD_RIGHT), 0, 3) . ';';
    $linha .= substr(str_pad($this->inicioVigencia, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->finalVigencia, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->descricaoTarifa, 30, ' ', STR_PAD_RIGHT), 0, 30) . ';';
    $linha .= substr(str_pad($this->valorTarifa, 8, 0, STR_PAD_LEFT), 0, 8);

    return $linha;
  }

}
