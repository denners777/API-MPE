<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of encargos
 *
 * @author denner.fernandes
 */
class encargos {

  public $codigoIdentificadorEncargo = ''; //String 4 1
  public $descricaoEncargo = ''; //String 40 2
  public $tipoEncargo = ''; //String 2 3
  public $porcentagemEncargo = 0; //Real 9 4
  public $codigoIdentificadorFormulaValor = ''; //String 8 5
  public $indicativoProvisaoAcumulada = 0; //Inteiro 2 6
  public $codigoSindQueIncideSalario = 0; //Inteiro 2 7
  public $indicativoConsideracaoMesAtual = 0; //Inteiro 2 8
  public $indicativoStatusAtividade = ''; //String 40 9
  public $codigoFormulaSelecao = ''; //String 8 10
  public $numeroContaCredito = ''; //String 22 11
  public $numeroContaDébito = ''; //String 22 12
  public $numeroHistoricoPadrao = ''; //String 10 13
  public $complementoHistorico = ''; //String 60 14
  public $codigoAplicacaoEncargo = ''; //String 1 15
  public $numeroContaGerencialCredito = ''; //String 22 16
  public $numeroContaGerencialDebito = ''; //String 22 17
  public $existeIntgracaoContabilContaCredito = 0; //Inteiro 2 18
  public $existeIntgracaoContabilContaDebito = 0; //Inteiro 2 19
  public $existeIntgracaoContabilContaGerencialCredito = 0; //Inteiro 2 20
  public $existeIntgracaoContabilContaGerencialDebito = 0; //Inteiro 2 21
  public $existeIntgracaoFuncContabilContaCredito = 0; //Inteiro 2 22
  public $existeIntgracaoFuncContabilContaDebito = 0; //Inteiro 2 23
  public $existeIntgracaoFuncGerencialContaCredito = 0; //Inteiro 2 24
  public $existeIntgracaoFuncGerencialContaDedito = 0; //Inteiro 2 25
  public $indicativoContabilidadeParcial = 0; //Inteiro 2 26
  public $permicaoValorNegativo = 0; //Inteiro 2 27
  public $formulaParaComporComplementoHistorico = ''; //String 8 28
  public $periodoCalculoRateioEncargos = 0; //Inteiro 2 29
  public $codigoRateioQueEncargoSegue = ''; //String 8 30
  public $contaReversao = ''; //String 22 31
  public $consideraValorAnteriorTransferencia = 0; //Inteiro 2 32
  public $layoutImportacaoEncargos = 0; //Inteiro 2 33
  public $consideraSecaoAnteriorGerarLancamento = 0; //Inteiro 2 34

  public function montar() {

    $linha = substr(str_pad($this->codigoIdentificadorEncargo, 4, ' ', STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->descricaoEncargo, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->tipoEncargo, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->porcentagemEncargo, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->codigoIdentificadorFormulaValor, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->indicativoProvisaoAcumulada, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigoSindQueIncideSalario, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->indicativoConsideracaoMesAtual, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->indicativoStatusAtividade, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->codigoFormulaSelecao, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->numeroContaCredito, 22, ' ', STR_PAD_RIGHT), 0, 22) . ';';
    $linha .= substr(str_pad($this->numeroContaDébito, 22, ' ', STR_PAD_RIGHT), 0, 22) . ';';
    $linha .= substr(str_pad($this->numeroHistoricoPadrao, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->complementoHistorico, 60, ' ', STR_PAD_RIGHT), 0, 60) . ';';
    $linha .= substr(str_pad($this->codigoAplicacaoEncargo, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->numeroContaGerencialCredito, 22, ' ', STR_PAD_RIGHT), 0, 22) . ';';
    $linha .= substr(str_pad($this->numeroContaGerencialDebito, 22, ' ', STR_PAD_RIGHT), 0, 22) . ';';
    $linha .= substr(str_pad($this->existeIntgracaoContabilContaCredito, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->existeIntgracaoContabilContaDebito, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->existeIntgracaoContabilContaGerencialCredito, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->existeIntgracaoContabilContaGerencialDebito, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->existeIntgracaoFuncContabilContaCredito, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->existeIntgracaoFuncContabilContaDebito, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->existeIntgracaoFuncGerencialContaCredito, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->existeIntgracaoFuncGerencialContaDedito, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->indicativoContabilidadeParcial, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->permicaoValorNegativo, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->formulaParaComporComplementoHistorico, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->periodoCalculoRateioEncargos, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigoRateioQueEncargoSegue, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->contaReversao, 22, ' ', STR_PAD_RIGHT), 0, 22) . ';';
    $linha .= substr(str_pad($this->consideraValorAnteriorTransferencia, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->layoutImportacaoEncargos, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->consideraSecaoAnteriorGerarLancamento, 2, ' ', STR_PAD_RIGHT), 0, 2);

    return $linha;
  }

}
