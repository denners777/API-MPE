<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cargos
 *
 * @author rafael.reis
 */
class cargos {

  public $codigoCargo = ''; //String  16 1 1
  public $nomeCargo = '';  // String 40 18 2
  public $descricao = ''; // (começa com /@ e termina com @/) Memo - 59 3

  public function montar() {

    $linha = substr(str_pad($this->codigoCargo, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->nomeCargo, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= '/@' . substr($this->descricao, 0, 59) . '@/';

    return $linha;
  }

}
