<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of valores_fixos
 *
 * @author rafael.reis
 */
class valores_fixos {

  public $codigoValorFixo = ''; // String 2 1
  public $inicioVigencia = ''; //  Data 8 2
  public $nomeValorFixo = ''; // String 45 3
  public $valorDoValorFixo = 0; // Real 9 4
  public $finalVigenica = ''; // Data 8 5
  public $finalidadeValFixo = 0; // Inteiro 2 6
  public $atualizaVigencia = 0; // (0 ou 1) Inteiro 1 7

  public function montar() {

    $linha = substr(str_pad($this->codigoValorFixo, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha = substr(str_pad($this->inicioVigencia, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha = substr(str_pad($this->nomeValorFixo, 45, ' ', STR_PAD_RIGHT), 0, 45) . ';';
    $linha = substr(str_pad($this->valorDoValorFixo, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha = substr(str_pad($this->finalVigenica, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha = substr(str_pad($this->finalidadeValFixo, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->atualizaVigencia, 1, 0, STR_PAD_LEFT), 0, 1);

    return $linha;
  }

}
