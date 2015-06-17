<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of eventos
 *
 * @author denner.fernandes
 */
class eventos {

  public $codigoIdentificadorEvento = '';                                   //String 4 
  public $descricao = '';                                                   //String 40
  public $totalizadorEvento = '';                                           //String 2
  public $chave = '';                                                       //String 1
  public $indicativoComposicaoComissao = '';                                //Inteiro 1 0 ou 1
  public $proventoDescontoBase = '';                                        //String 1 P, D ou B
  public $valorHoraDiaReferencia = '';                                      //String 1 V, H, D ou R
  public $porcentagemIncidencia = '';                                       //String 6
  public $codigoCalculo = '';                                               //Inteiro 4
  public $prioridadeEvento = '';                                            //Inteiro 3
  public $codigoFormulaValor = '';                                          //String 8
  public $codigoFormulaHora = '';                                           //String 8
  public $codigoFormulaReferencia = '';                                     //String 8
  public $codigoFormulaCritica = '';                                        //String 8
  public $incidenciaInss = '';                                              //Inteiro 1
  public $incidenciaIrrf = '';                                              //Inteiro 1
  public $incidenciaFgts = '';                                              //Inteiro 1
  public $incidenciaRais = '';                                              //Inteiro 1
  public $incidenciaInformeRendimentos = '';                                //Inteiro 1
  public $incidenciaDsr = '';                                               //Inteiro 1
  public $incidenciaValeTransporte = '';                                    //Inteiro 1
  public $incidenciaIrrfFerias = '';                                        //Inteiro 1
  public $incidenciaTercoFerias = '';                                       //Inteiro 1
  public $incidenciaSalarioFamilia = '';                                    //Inteiro 1
  public $incidenciaInss13 = '';                                            //Inteiro 1
  public $incidenciaIrrf13 = '';                                            //Inteiro 1
  public $incidenciaAcumuladores = '';                                      //String 32 "*" nas posições das incidências
  // confirmadas e "" (branco) nas 
  // posições das incidências não 
  // confirmadas
  public $incidenciaSalario = '';                                           //String 1
  public $proporcionarAcordoAdmissao = '';                                 //Inteiro 1
  public $proporcionarAcordoLicenca = '';                                   //Inteiro 1
  public $proporcionarAcordoFerias = '';                                    //Inteiro 1
  public $dedutivelIrrf = '';                                               //Inteiro 1
  public $indicativoEstornoCalculoIrrfFerias = '';                          //Inteiro 1
  public $indicativoEstornoBaseSalarioFamilia = '';                         //Inteiro 1
  public $indicativoEstornoBaseValeTransporte = '';                         //Inteiro 1
  public $indicativoEstornoInss13 = '';                                     //Inteiro 1
  public $grupoAas = '';                                                    //Inteiro 2
  public $indicativoEventoLancar = '';                                      //String 4
  public $numeroContaCredito = '';                                          //String 22
  public $numeroContaDebito = '';                                           //String 22
  public $numeroHistoricoPadrao = '';                                       //String 10
  public $complementoHistorico = '';                                        //String 60
  public $numeroContaGerencialCredito = '';                                 //String 22
  public $numeroContaGerencialDebito = '';                                  //String 22
  public $eventoDiferencaSalario = '';                                      //String 4
  public $codigoRateioEventoSegue = '';                                     //String 8
  public $baseSalarioComposto = '';                                         //String 16
  public $descontoPerdoado = '';                                            //Inteiro 1
  public $segueRateioTomadorServico = '';                                   //Inteiro 1
  public $eventoPagamentoObrigatorio = '';                                   //Inteiro 1
  public $existeIntegracaoContabilContaCredito = '';                        //Inteiro 1
  public $existeIntegracaoContabilContaDebito = '';                         //Inteiro 1
  public $existeIntegracaoContabilContaGerencialCredito = '';               //Inteiro 1
  public $existeIntegracaoContabilContaGerencialDebito = '';                //Inteiro 1
  public $existeIntegracaoContabilFuncionarioContaCredito = '';             //Inteiro 1
  public $existeIntegracaoContabilFuncionarioContaDebito = '';              //Inteiro 1
  public $existeIntegracaoGerencialFuncionarioContaCredito = '';            //Inteiro 1
  public $existeIntegracaoGerencialFuncionarioContaDebito = '';             //Inteiro 1
  public $eventoContabilizacaoParcial = '';                                 //Inteiro 1
  public $eventoIncideSubstituicao = '';                                    //Inteiro 1
  public $indicativoEstFgts13 = '';                                         //Inteiro 1
  public $indicativoEstIrrf13 = '';                                         //Inteiro 1
  public $eventoInsuficienciaSaldo = '';                                    //Inteiro 4
  public $eventoIncidePensao = '';                                          //Inteiro 1
  public $eventoIncidePensaoFerias = '';                                    //Inteiro 1
  public $eventoIncidePensao13 = '';                                        //Inteiro 1
  public $eventoIncidePensaoParticipacaoLucros = '';                        //Inteiro 1
  public $formulaComporComplementoHistorico = '';                           //String 4
  public $periodoCalculoRateioEventos = '';                                 //Inteiro 1
  public $estornaFgts = '';                                                 //Inteiro 1
  public $estornaInss = '';                                                 //Inteiro 1
  public $estornaIrrf = '';                                                 //Inteiro 1
  public $incideFgts13 = '';                                                //Inteiro 1
  public $proporcionalizarAcordoDemissao = '';                              //Inteiro 1
  public $exibirEventoEntradaMovimentoViaWeb = '';                          //Inteiro 1
  public $codigoCentroCustoEvento = '';                                     //Inteiro 25
  public $codigoRubrica = '';                                               //String 4
  public $conteudoMemo = '';                                                // /@ @/

  public function montar() {

    $linha = substr(str_pad($this->codigoIdentificadorEvento, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->descricao, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->totalizadorEvento, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->chave, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->indicativoComposicaoComissao, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->proventoDescontoBase, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->valorHoraDiaReferencia, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->porcentagemIncidencia, 6, 0, STR_PAD_LEFT), 0, 6) . ';';
    $linha .= substr(str_pad($this->codigoCalculo, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->prioridadeEvento, 3, 0, STR_PAD_LEFT), 0, 3) . ';';
    $linha .= substr(str_pad($this->codigoFormulaValor, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->codigoFormulaHora, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->codigoFormulaReferencia, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->codigoFormulaCritica, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->incidenciaInss, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incidenciaIrrf, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incidenciaFgts, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incidenciaRais, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incidenciaInformeRendimentos, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incidenciaDsr, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incidenciaValeTransporte, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incidenciaIrrfFerias, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incidenciaTercoFerias, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incidenciaSalarioFamilia, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incidenciaInss13, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incidenciaIrrf13, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incidenciaAcumuladores, 32, ' ', STR_PAD_RIGHT), 0, 32) . ';';
    $linha .= substr(str_pad($this->incidenciaSalario, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->proporcionarAcordoAdmissao, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->proporcionarAcordoLicenca, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->proporcionarAcordoFerias, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->dedutivelIrrf, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->indicativoEstornoCalculoIrrfFerias, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->indicativoEstornoBaseSalarioFamilia, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->indicativoEstornoBaseValeTransporte, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->indicativoEstornoInss13, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->grupoAas, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->indicativoEventoLancar, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->numeroContaCredito, 22, ' ', STR_PAD_RIGHT), 0, 22) . ';';
    $linha .= substr(str_pad($this->numeroContaDebito, 22, ' ', STR_PAD_RIGHT), 0, 22) . ';';
    $linha .= substr(str_pad($this->numeroHistoricoPadrao, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->complementoHistorico, 60, ' ', STR_PAD_RIGHT), 0, 60) . ';';
    $linha .= substr(str_pad($this->numeroContaGerencialCredito, 22, ' ', STR_PAD_RIGHT), 0, 22) . ';';
    $linha .= substr(str_pad($this->numeroContaGerencialDebito, 22, ' ', STR_PAD_RIGHT), 0, 22) . ';';
    $linha .= substr(str_pad($this->eventoDiferencaSalario, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->codigoRateioEventoSegue, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->baseSalarioComposto, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->descontoPerdoado, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->segueRateioTomadorServico, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->eventoPagamentoObrigatorio, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->existeIntegracaoContabilContaCredito, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->existeIntegracaoContabilContaDebito, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->existeIntegracaoContabilContaGerencialCredito, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->existeIntegracaoContabilContaGerencialDebito, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->existeIntegracaoContabilFuncionarioContaCredito, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->existeIntegracaoContabilFuncionarioContaDebito, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->existeIntegracaoGerencialFuncionarioContaCredito, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->existeIntegracaoGerencialFuncionarioContaDebito, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->eventoContabilizacaoParcial, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->eventoIncideSubstituicao, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->indicativoEstFgts13, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->indicativoEstIrrf13, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->eventoInsuficienciaSaldo, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->eventoIncidePensao, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->eventoIncidePensaoFerias, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->eventoIncidePensao13, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->eventoIncidePensaoParticipacaoLucros, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->formulaComporComplementoHistorico, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->periodoCalculoRateioEventos, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->estornaFgts, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->estornaInss, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->estornaIrrf, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incideFgts13, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->proporcionalizarAcordoDemissao, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->exibirEventoEntradaMovimentoViaWeb, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->codigoCentroCustoEvento, 25, 0, STR_PAD_LEFT), 0, 25) . ';';
    $linha .= substr(str_pad($this->codigoRubrica, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= '/@' . $this->conteudoMemo . '@/';

    return $linha;
  }

}
