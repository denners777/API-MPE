<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of funcoes
 *
 * @author denner.fernandes
 */
class funcoes {

  public $codigo = '';              //String 10 1
  public $nomeFuncao = '';          //String 40 2
  public $numeroPontos = 0;         //(Formato 99999,99) Real 08 3
  public $cbo = '';                 //String 08 4
  public $codigoCargo = '';         //String 16 5
  public $indicativoAtividade = 0;  //(0-Não/1-Sim) Inteiro 01 6
  public $atividadeTransporte = 0;  //(0-Não/1-Sim) Inteiro 01 7
  public $descricao = '';           //(começa com /@ e termina com @/) Memo 250 8
  public $limiteFuncionarios = 0;   //Inteiro 10 9
  public $cbo2002 = '';             //String 10 10

  public function montar() {

    $linha = substr(str_pad($this->codigo, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->nomeFuncao, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->numeroPontos, 8, 0, STR_PAD_LEFT), 0, 8) . ';';
    $linha .= substr(str_pad($this->cbo, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->codigoCargo, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->indicativoAtividade, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->atividadeTransporte, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= '/@' . substr($this->descricao, 0, 1) . '@/;';
    $linha .= substr(str_pad($this->limiteFuncionarios, 10, 0, STR_PAD_LEFT), 0, 10) . ';';
    $linha .= substr(str_pad($this->cbo2002, 10, ' ', STR_PAD_LEFT), 0, 10);
    
    return $linha;
  }

}
