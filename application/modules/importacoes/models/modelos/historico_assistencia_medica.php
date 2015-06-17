<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historico_assistencia_medica
 *
 * @author denner.fernandes
 */
class historico_assistencia_medica {

  public $chapa = '';             //String 16 1
  public $anoCompetencia = '';    //String 04 2
  public $mesCompetencia = '';    //String 02 3
  public $numeroPeriodo = 0;      //Inteiro 02 4
  public $numeroDependente = 0;   //Inteiro 16 5
  public $codigoEvento = '';      //String 02 6
  public $tipoValor = 0;          //Inteiro 02 7
  public $dataPagamento = '';     //Data 08 8
  public $anoReferencia = '';     //String 04 9
  public $mesReferencia = '';     //String 02 10
  public $periodoReferencia = 0;  //Inteiro 02 11
  public $valor = 0;              //Real 15 12
  public $valorOriginal = 0;      //Real 15 13

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_LEFT), 0, 16) . ';';
    $linha .= substr(str_pad($this->anoCompetencia, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->mesCompetencia, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->numeroPeriodo, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->numeroDependente, 16, 0, STR_PAD_LEFT), 0, 16) . ';';
    $linha .= substr(str_pad($this->codigoEvento, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->tipoValor, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->dataPagamento, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->anoReferencia, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->mesReferencia, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->periodoReferencia, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->valor, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->valorOriginal, 15, 0, STR_PAD_LEFT), 0, 15);

    return $linha;
  }

}
