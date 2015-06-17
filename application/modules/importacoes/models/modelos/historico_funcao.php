<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historico_funcao
 *
 * @author denner.fernandes
 */
class historico_funcao {

  public $chapa = '';                     //String 16 1
  public $dataMudanca = '';               //Data 08 2
  public $codigoMotivoMudancaFuncao = ''; //String 02 3
  public $codigoFuncao = '';              //String 10 4
  public $nivelSalarial = '';             //String 10 5
  public $faixaSalarial = '';             //String 10 6

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->dataMudanca, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->codigoMotivoMudancaFuncao, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigoFuncao, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->nivelSalarial, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->faixaSalarial, 10, ' ', STR_PAD_RIGHT), 0, 10);

    return $linha;
  }

}
