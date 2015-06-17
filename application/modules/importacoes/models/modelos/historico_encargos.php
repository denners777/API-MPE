<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historico_encargos
 *
 * @author denner.fernandes
 */
class historico_encargos {

  public $chapa = '';           //String 16 1
  public $anoCompetencia = 0;   //Inteiro 04 2
  public $mesCompetencia = 0;   //Inteiro 02 3
  public $codigo = '';          //String 04 4
  public $valor = 0;            //Real 09 5
  public $aplicacao = '';       //String 01 6

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_LEFT), 0, 16) . ';';
    $linha .= substr(str_pad($this->anoCompetencia, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->mesCompetencia, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigo, 4, 0, STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->valor, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->aplicacao, 1, 0, STR_PAD_RIGHT), 0, 1);

    return $linha;
  }

}
