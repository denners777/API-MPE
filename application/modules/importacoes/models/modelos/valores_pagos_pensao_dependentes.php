<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of valores_pagos_pensao_dependentes
 *
 * @author denner.fernandes
 */
class valores_pagos_pensao_dependentes {

  public $chapa = '';                       //String 16 1
  public $numeroDependente = '';            //Inteiro 02 2
  public $anoCompetencia = 0;               //Inteiro 04 3
  public $mesCompetencia = 0;               //Inteiro 02 4
  public $mesCaixa = 0;                     //Inteiro 02 5
  public $tipoMovimentoPensao = 0;          //Inteiro 01 6
  public $numeroPeriodo = 0;                //Inteiro 02 7
  public $valor = 0;                        //(formato 999999999999, 99) Real 15 8
  public $valorOriginal = 0;                //(formato 999999999999, 99) Real 15 9
  public $indicativoAlteraçãoManual = 0;    //Inteiro 01 10

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->numeroDependente, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->anoCompetencia, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->mesCompetencia, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->mesCaixa, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->tipoMovimentoPensao, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->numeroPeriodo, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->valor, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->valorOriginal, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->indicativoAlteraçãoManual, 1, 0, STR_PAD_LEFT), 0, 1) . ';';

    return $linha;
  }

}
