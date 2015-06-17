<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of emprestimos
 *
 * @author denner.fernandes
 */
class emprestimos {

  public $chapa = '';                   //String 16
  public $codigoEmprestimo = '';        //String 20
  public $tipoEmprestimo = '';          //String 10
  public $codigoEvento = '';            //String 4
  public $dataEmprestimo = '';          //Data 8 ddmmyyyy
  public $valorOriginal = '';           //Real 15 
  public $saldoDevedor = '';            //Real 15
  public $nroParcelas = '';             //Integer 2
  public $nroParcelasPagas = '';        //Integer 2
  public $periocidade = '';             //Integer 2
  public $codigoFormulaCorrecao = '';   //String 8
  public $inicioDesconto = '';          //Data 8 ddmmyyyy
  public $codigoFormulaLancamento = ''; //String 8
  public $observacao = '';              //String 80 no placeholder

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->codigoEmprestimo, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->tipoEmprestimo, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->codigoEvento, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->dataEmprestimo, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->valorOriginal, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->saldoDevedor, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->nroParcelas, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->nroParcelasPagas, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->periocidade, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigoFormulaCorrecao, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->inicioDesconto, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->codigoFormulaLancamento, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= $this->percentualAcidenteTrabalho;

    return $linha;
  }

}
