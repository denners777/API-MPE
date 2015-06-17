<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historico_periodo_ficha_financeira
 *
 * @author denner.fernandes
 */
class periodo_ficha_financeira {

  public $chapa = '';                           //String 16 1
  public $anoCompetencia = 0;                   //Inteiro 04 2
  public $mesCompetencia = 0;                   //Inteiro 02 3
  public $numeroPeriodo = 0;                    //Inteiro 02 4
  public $mesCaixaComum = 0;                    //Inteiro 02 5
  public $salarioComissao = 0;                  //(Formato999999999999,99) Real 15 6
  public $valorLancadoFeriasMes = 0;            //(Formato999999,99) Real 9 7
  public $baseInss = 0;                         //(Formato999999,99) Real 9 8
  public $baseInssOutroEmprego = 0;             //(Formato999999,99) Real 9 9
  public $inss = 0;                             //(Formato999999,99) Real 9 10
  public $inssFerias = 0;                       //(Formato999999,99) Real 9 11
  public $inssOutroEmprego = 0;                 //(Formato999999,99) Real 9 12
  public $baseInss13 = 0;                       //(Formato999999,99) Real 9 13
  public $baseInss13OutroEmprego = 0;           //(Formato999999,99) Real 9 14
  public $inss13 = 0;                           //(Formato999999,99) Real 9 15
  public $baseSalarioFamilia = 0;               //(Formato999999,99) Real 9 16
  public $salarioFamilia = 0;                   //(Formato999999,99) Real 9 17
  public $baseValeTransporte = 0;               //(Formato999999,99) Real 9 18
  public $valeTransporteEntregue = 0;           //(Formato999999,99) Real 9 19
  public $valeTransporteDescontado = 0;         //(Formato999999,99) Real 9 20
  public $baseIrrf = 0;                         //(Formato999999,99) Real 9 21
  public $irrf = 0;                             //(Formato999999,99) Real 9 22
  public $inssCaixa = 0;                        //(Formato999999,99) Real 9 23
  public $inssCalculadoPeloUsuario = 0;         //Real 9 24
  public $dedutivelIrrf = 0;                    //(Formato999999,99) Real 9 25
  public $baseIrrfParticipacao = 0;             //(Formato999999,99) Real 9 26
  public $irrfParticipacao = 0;                 //(Formato999999,99) Real 9 27
  public $baseIrrfFerias = 0;                   //(Formato999999,99) Real 9 28
  public $irrfFerias = 0;                       //(Formato999999,99) Real 9 29
  public $indicativoInssCpmf = 0;               //(Formato999999,99) Real 9 30
  public $descricaoPeriodo = '';                //String 250 31
  public $baseFgts = 0;                         //(Formato999999,99) Real 9 32
  public $baseFgts13 = 0;                       //(Formato999999,99) Real 9 33
  public $salarioPago = 0;                      //(Formato999999999999,99) Real 15 34
  public $baseIrrf13 = 0;                       //(Formato999999,99) Real 9 35
  public $irrfSob13 = 0;                        //Real 9 36
  public $inssFeriasCpmf = 0;                   //Real 9 37
  public $inssDiferencaSalarial = 0;            //(Formato999999,99) Real 9 38
  public $inssDiferencaSalarial13 = 0;          //(Formato999999,99) Real 9 39
  public $inssDiferencaSalarialFerias = 0;      //(Formato999999,99) Real 9 40
  public $baseFgtsDiferencaSalarial = 0;        //(Formato999999,99) Real 9 41

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->anoCompetencia, 5, 0, STR_PAD_LEFT), 0, 5) . ';';
    $linha .= substr(str_pad($this->mesCompetencia, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->numeroPeriodo, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->mesCaixaComum, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->salarioComissao, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->valorLancadoFeriasMes, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->baseInss, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->baseInssOutroEmprego, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->inss, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->inssFerias, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->inssOutroEmprego, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->baseInss13, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->baseInss13OutroEmprego, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->inss13, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->baseSalarioFamília, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->salarioFamilia, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->baseValeTransporte, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->valeTransporteEntregue, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->valeTransporteDescontado, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->baseIrrf, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->irrf, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->inssCaixa, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->inssCalculadoPeloUsuario, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->dedutivelIrrf, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->baseIrrfParticipacao, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->irrfParticipacao, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->baseIrrfFerias, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->irrfFerias, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->indicativoInssCpmf, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->descricaoPeriodo, 250, ' ', STR_PAD_RIGHT), 0, 250) . ';';
    $linha .= substr(str_pad($this->baseFgts, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->baseFgts13, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->salarioPago, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->baseIrrf13, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->irrfSob13, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->inssFeriasCpmf, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->inssDiferencaSalarial, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->inssDiferencaSalarial13, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->inssDiferencaSalarialFerias, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->baseFgtsDiferencaSalarial, 9, 0, STR_PAD_LEFT), 0, 9);

    return $linha;
  }

}
