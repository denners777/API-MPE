<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historico_encargos_centro_custo
 *
 * @author denner.fernandes
 */
class historico_encargos_centro_custo {

  public $codigoIdentificadorColigada = 0;  //Inteiro 05 1
  public $chapa = '';                       //String 16 2
  public $anoCompetencia = 0;               //Inteiro 04 3
  public $mesCompetencia = 0;               //Inteiro 02 4
  public $codigoEncargo = '';               //String 04 5
  public $codigoCentroCustoRMLabore = '';   //String 25 6
  public $valor = 0;                        //(Formato 999999999999, 99) Real 15 7
  public $eventoDigitado = 0;               //Inteiro 02 8
  public $codigoCentroCustoGlobal = '';     //String 25 9

  public function montar() {

    $linha = substr(str_pad($this->codigoIdentificadorColigada, 5, 0, STR_PAD_LEFT), 0, 5) . ';';
    $linha .= substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->anoCompetencia, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->mesCompetencia, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigoEncargo, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->codigoCentroCustoRMLabore, 25, ' ', STR_PAD_RIGHT), 0, 25) . ';';
    $linha .= substr(str_pad($this->valor, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->eventoDigitado, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigoCentroCustoGlobal, 25, ' ', STR_PAD_RIGHT), 0, 25);

    return $linha;
  }

}
