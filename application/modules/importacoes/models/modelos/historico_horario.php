<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historico_horario
 *
 * @author denner.fernandes
 */
class historico_horario {

  public $chapa = '';               //String 16 1
  public $dataMudanca = '';         //Data 08 2
  public $codigoHorario = '';       //String 10 3
  public $indiceInicioHorario = 0;  //Integer 02 4

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->dataMudanca, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->codigoHorario, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->indiceInicioHorario, 2, 0, STR_PAD_LEFT), 0, 2);

    return $linha;
  }

}
