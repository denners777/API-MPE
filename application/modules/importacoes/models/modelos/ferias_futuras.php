<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ferias_futuras
 *
 * @author denner.fernandes
 */
class ferias_futuras {

  public $chapa = '';                             //String 16 1
  public $dataVencimentoFerias = '';              //Data 8 2
  public $dataProgramadaInicioFerias = '';        //Data 8 3
  public $dataProgramadaFimFerias = '';           //Data 8 4
  public $numeroDiasFerias = 0;                   //Inteiro 2 5
  public $dataPagamentoFerias = '';               //Data 8 6
  public $dataAvisoFerias = '';                   //Data 8 7
  public $funcionarioQuerAbono = 0;               //Inteiro 2 8
  public $numeroDiasAbono = 0;                    //Inteiro 2 9
  public $funcionarioQuerPrimeiraParcela13 = 0;   //Inteiro 2 10
  public $eventoAdiantamentoFerias = '';          //String 4 11
  public $feriasColetivasGlobais = 0;             //Inteiro 2 12
  public $observacoesSobreFerias = '';            //String 80 13
  public $numeroDiasLicencaRemunerada = 0;        //Real 9 14
  public $numeroDiasLicencaRemunerada2 = 0;       //Real 9 15
  public $dataInicioLicencaRemunerada = '';       //Data 8 16
  public $numeroParcelasEmprestimoFerias = 0;     //Inteiro 2 17
  public $dataInicioDescontoEmprestimo = '';      //Data 8 18
  public $querAdiantamentoFerias = 0;             //(0-Não/1-Sim) Inteiro 1 19

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_LEFT), 0, 16) . ';';
    $linha .= substr(str_pad($this->dataVencimentoFerias, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->dataProgramadaInicioFerias, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->dataProgramadaFimFerias, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->numeroDiasFerias, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->dataPagamentoFerias, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->dataAvisoFerias, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->funcionarioQuerAbono, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->numeroDiasAbono, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->funcionarioQuerPrimeiraParcela13, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->eventoAdiantamentoFerias, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->feriasColetivasGlobais, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->observacoesSobreFerias, 80, ' ', STR_PAD_RIGHT), 0, 80) . ';';
    $linha .= substr(str_pad($this->numeroDiasLicencaRemunerada, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->numeroDiasLicencaRemunerada2, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->dataInicioLicencaRemunerada, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->numeroParcelasEmprestimoFerias, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->dataInicioDescontoEmprestimo, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->querAdiantamentoFerias, 1, 0, STR_PAD_LEFT), 0, 1);

    return $linha;
  }

}
