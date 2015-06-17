<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of formulas
 *
 * @author rafael.reis
 */
class formulas {

  public $codigo = ''; // String 08 1
  public $titulo = ''; // String 70 2 
  public $criticaGlobal = 0; // (0-Não / 1-Sim) Inteiro 01 3
  public $indicadorFormulaSelecao = 0; // (0-Não / 1-Sim) Inteiro 01 4
  public $numeroDecimais = 0; // Inteiro 02 5
  public $grupo = ''; // String 01 6
  public $texto = ''; //(começa com /@ e termina com @/) Memo - -
  public $letraAplicacao = ''; // String 01 7

  public function montar() {

    $linha = substr(str_pad($this->codigo, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->titulo, 70, ' ', STR_PAD_RIGHT), 0, 70) . ';';
    $linha .= substr(str_pad($this->criticaGlobal, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->indicadorFormulaSelecao, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->numeroDecimais, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->grupo, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= '/@' . $this->texto . '@/;';
    $linha .= substr(str_pad($this->letraAplicacao, 1, ' ', STR_PAD_RIGHT), 0, 1);

    return $linha;
  }

}
