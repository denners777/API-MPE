<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of valores_sindicato
 *
 * @author denner.fernandes
 */
class valores_sindicato {

  public $codigoValor = '';         //String 2 1
  public $valor = 0;                //Real 15 2
  public $codigoSindicato = '';     //String 10 3
  public $dataValor = '';           //Data 8 4
  public $observacao = '';          //(começa com /@ e termina com @/) Memo 50 5

  public function montar() {

    $linha = substr(str_pad($this->codigoValor, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->valor, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->codigoSindicato, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->dataValor, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= '/@' . substr($this->observacao, 0, 50) . '@/';

    return $linha;
  }

}
