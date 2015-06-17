<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of valores_rubrica
 *
 * @author rafael.reis
 */
class valores_rubrica {

  public $codigoCliente = ''; // String 3 1
  public $codigoInterno = ''; // String 3 2
  public $descricao = 0; // Real 60 3
  public $podeAlterar = 0; // (sim/não) Inteiro 2 4

  public function montar() {

    $linha = substr(str_pad($this->codigoCliente, 3, ' ', STR_PAD_RIGHT), 0, 3) . ';';
    $linha = substr(str_pad($this->codigoInterno, 3, ' ', STR_PAD_RIGHT), 0, 3) . ';';
    $linha .= substr(str_pad($this->descricao, 60, 0, STR_PAD_LEFT), 0, 60) . ';';
    $linha .= substr(str_pad($this->podeAlterar, 2, 0, STR_PAD_LEFT), 0, 2);

    return $linha;
  }

}
