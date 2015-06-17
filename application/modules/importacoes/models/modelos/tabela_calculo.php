<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tabela_calculo
 *
 * @author denner.fernandes
 */
class tabela_calculo {

  private $flag1 = 1;                           //Inteiro 1 1
  private $flag2 = 2;                           //Inteiro 1 10
  //
  public $codigoCalculo = '';                   //String 6 2
  public $inicioVigencia = '';                  //Data 8 3
  public $nomeCalculo = '';                     //String 30 4
  public $fimVigencia = '';                     //Data 8 5
  public $indicativoArredondamentoValor = 0;    //Inteiro 2 6
  public $truncamentoCentavos = 0;              //Inteiro 2 7
  public $finalidade = 0;                       //Inteiro 2 8
  public $atualizaVigencia = 0;                 //Inteiro 2 9
  //
  public $inicioVigenciaTabela = '';            //Data 8 12
  public $numeroFaixa = 0;                      //Inteiro 2 13
  public $valorLimiteSuperior = 0;              //Real 9 14
  public $primeiroPercentualAplicavel = 0;      //Real 9 15
  public $valorDeduzir = 0;                     //Real 9 16
  public $valorAcrescentar = 0;                 //Real 9 17
  public $segundoPercentualAplicavel = 0;       //Real 9 18

  public function montar() {

    $linha = $this->flag1 . ';';
    $linha .= substr(str_pad($this->codigoCalculo, 6, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->inicioVigencia, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->nomeCalculo, 30, ' ', STR_PAD_RIGHT), 0, 30) . ';';
    $linha .= substr(str_pad($this->fimVigencia, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->indicativoArredondamentoValor, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->truncamentoCentavos, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->finalidade, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->atualizaVigencia, 2, 0, STR_PAD_LEFT), 0, 2);

    return $linha;
  }

  public function montar2() {

    $linha = $this->flag2 . ';';
    $linha .= substr(str_pad($this->codigoCalculo, 6, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->inicioVigenciaTabela, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->numeroFaixa, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->valorLimiteSuperior, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->primeiroPercentualAplicavel, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->valorDeduzir, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->valorAcrescentar, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->segundoPercentualAplicavel, 9, 0, STR_PAD_LEFT), 0, 9);

    return $linha;
  }

}
