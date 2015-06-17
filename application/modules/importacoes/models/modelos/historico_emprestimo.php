<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historico_emprestimo
 *
 * @author denner.fernandes
 */
class historico_emprestimo {

  public $chapa = '';             //String 16 1
  public $codigo = '';            //String 20 2
  public $anoCompetencia = 0;     //Inteiro 4 3
  public $mesCompetencia = 0;     //Inteiro 2 4
  public $periodo = 0;            //Inteiro 2 5
  public $tipo = '';              //(L-Lançamento / C-Correção) Char 1 6
  public $valor = 0;              //Real 15 7

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->codigo, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->anoCompetencia, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->mesCompetencia, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->periodo, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->tipo, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->valor, 15, 0, STR_PAD_LEFT), 0, 15);
    return $linha;
  }

}
