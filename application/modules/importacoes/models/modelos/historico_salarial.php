<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historico_salarial
 *
 * @author denner.fernandes
 */
class historico_salarial {

  public $chapa = '';                       //String 16 1
  public $dataHoraMudanca = '';             //Data/Hora 14 2
  public $codigoMotivoMudancaSalario = '';  //String 02 3
  public $numeroSalario = 0;                //Inteiro 02 4
  public $salario = 0;                      //(Formato 999999999999,99) Real 15 5
  public $jornada = '';                     //(Formato HHH: MM) String 06 6
  public $dataHoraProcessamento = '';       //Data/Hora 14 7

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->dataHoraMudanca, 14, ' ', STR_PAD_RIGHT), 0, 14) . ';';
    $linha .= substr(str_pad($this->codigoMotivoMudancaSalario, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->numeroSalario, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->salario, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->jornada, 6, ' ', STR_PAD_RIGHT), 0, 6) . ';';
    $linha .= substr(str_pad($this->dataHoraProcessamento, 14, ' ', STR_PAD_RIGHT), 0, 14);

    return $linha;
  }

}
