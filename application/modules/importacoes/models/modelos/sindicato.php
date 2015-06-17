<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sindicato
 *
 * @author denner.fernandes
 */
class sindicato {

  public $codigo = '';                                                      //String 10 1
  public $nomeSindicato = '';                                               //String 120 2
  public $rua = '';                                                         //String 30 3
  public $numero = '';                                                      //String 08 4
  public $complemento = '';                                                 //String 16 5
  public $bairro = '';                                                      //String 20 6
  public $estado = '';                                                      //String 02 7
  public $cidade = '';                                                      //String 32 8
  public $cep = '';                                                         //String 09 9
  public $nomePais = '';                                                    //String 16 10
  public $valorSalarioMinimo = 0;                                           //(Formato 999999999999, 99) Real 15 11
  public $percentualValeTransporte = 0;                                     //(Formato 999, 99) Real 06 12
  public $descontoUnicoValeTransporte = 0;                                  //(0-Não/1-Sim) Inteiro 01 13
  public $usa30DiasParaDescValeTransporte = 0;                              //(0-Não/1-Sim) Inteiro 01 14
  public $descontaContribuicaoMesAdmissao = 0;                              //(0-Não/1-Sim) Inteiro 01 15
  public $consideraMesRescisaoParaMedia = 0;                                //(0-Não/1-Sim) Inteiro 01 16
  public $pagaFeriasProporcionaisRescisao = 0;                              //(0-Não/1-Sim) Inteiro 01 17
  public $numeroMinimoMesesTrabalhados = 0;                                 //Inteiro 02 18
  public $pagaMediaPrimeiraParcela13 = 0;                                   //(0-Não/1-Sim) Inteiro 01 19
  public $ignoraEventoFeriasParaMedia = 0;                                  //(0-Não/1-Sim) Inteiro 01 20
  public $permiteFeriasPartidasMenor18 = 0;                                 //(0-Não/1-Sim) Inteiro 01 21
  public $permiteFeriasPartidasMaior50 = 0;                                 //(0-Não/1-Sim) Inteiro 01 22
  public $pagaLicencaFuncionarioComMenosDeUmAno = 0;                        //(0-Não/1-Sim) Inteiro 01 23
  public $funcionarioMenosDeUmAnoGozamFeriasProporcionaisIntegrais = 0;     //(0-Não/1-Sim) Inteiro 01 24
  public $funcionarioComFeriasVencidasGozamFeriasIntegrais = 0;             //(0-Não/1-Sim) Inteiro 01 25
  public $pagaFeriasPeriodoAquisitivoQueNaoComecou = 0;                     //(0-Não/1-Sim) Inteiro 01 26
  public $minimoGarantidoPeloSindicato = 0;                                 //(Formato 999999999999, 99) Real 15 27
  public $formulaCalculoUmTercoFerias = '';                                 //String 08 28
  public $formulaCalculoIndenizacaoArtigo479 = '';                          //String 08 29
  public $formulaEstabilidade = '';                                         //String 08 30
  public $grupoInsalubridade = 0;                                           //Inteiro 02 31
  public $formulaNumeroDiasAviso = '';                                      //String 08 32
  public $formulaGarantiaSalarial = '';                                     //String 08 33
  public $cnpj = '';                                                        //String 20 34
  public $codigoEntidadeSindical = '';                                      //String 20 35
  public $onsideraMesAtualParaMediaFerias = 0;                              //(0-Não/1-Sim) Inteiro 01 36
  public $telefoneSindicato = '';                                           //String 15 37
  public $telefone2 = '';                                                   //String 15 38
  public $pessoaContatoSindicato = '';                                      //String 45 39
  public $utilizaParametrosMediaFeriasRescisao = 0;                         //(0-Não/1-Sim) Inteiro 01 40
  public $utilizaParametrosMedias13Rescisão = 0;                            //(0- Não/1-Sim) Inteiro 01 41
  public $completaPeriodoGozoSeSaldoMenor10Dias = 0;                        //(0-Não/1-Sim) Inteiro 01 42
  public $ignoraFaltasFeriasNormais = 0;                                    //(0-Não/1-Sim) Inteiro 01 43
  public $agenciaSindicato = '';                                            //String 04 44
  public $digitoVerificadorAgenciaSindicato = '';                           //String 01 45
  public $coligadaFornecedor = 0;                                           //Inteiro 02 46
  public $fornecedorLancamentoFinanceiro = '';                              //String 25 47
  public $pagaFeriasProporcionaisParaDemitidosPorJustaCausa = 0;            //(0 –Nâo/1 - Sim) Inteiro 01 48

  public function montar() {

    $linha = substr(str_pad($this->codigo, 10, ' ', STR_PAD_LEFT), 0, 10) . ';';
    $linha .= substr(str_pad($this->nomeSindicato, 120, ' ', STR_PAD_RIGHT), 0, 120) . ';';
    $linha .= substr(str_pad($this->rua, 30, ' ', STR_PAD_RIGHT), 0, 30) . ';';
    $linha .= substr(str_pad($this->numero, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->complemento, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->bairro, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->estado, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->cidade, 32, ' ', STR_PAD_RIGHT), 0, 32) . ';';
    $linha .= substr(str_pad($this->cep, 9, ' ', STR_PAD_RIGHT), 0, 9) . ';';
    $linha .= substr(str_pad($this->nomePais, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->valorSalarioMinimo, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->percentualValeTransporte, 6, 0, STR_PAD_LEFT), 0, 6) . ';';
    $linha .= substr(str_pad($this->descontoUnicoValeTransporte, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->usa30DiasParaDescValeTransporte, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->descontaContribuicaoMesAdmissao, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->consideraMesRescisaoParaMedia, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->pagaFeriasProporcionaisRescisao, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->numeroMinimoMesesTrabalhados, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->pagaMediaPrimeiraParcela13, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->ignoraEventoFeriasParaMedia, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->permiteFeriasPartidasMenor18, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->permiteFeriasPartidasMaior50, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->pagaLicencaFuncionarioComMenosDeUmAno, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->funcionarioMenosDeUmAnoGozamFeriasProporcionaisIntegrais, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->funcionarioComFeriasVencidasGozamFeriasIntegrais, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->pagaFeriasPeriodoAquisitivoQueNaoComecou, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->minimoGarantidoPeloSindicato, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->formulaCalculoUmTercoFerias, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->formulaCalculoIndenizacaoArtigo479, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->formulaEstabilidade, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->grupoInsalubridade, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->formulaNumeroDiasAviso, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->formulaGarantiaSalarial, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->cnpj, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->codigoEntidadeSindical, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->consideraMesRescisaoParaMedia, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->telefoneSindicato, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->telefone2, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->pessoaContatoSindicato, 45, ' ', STR_PAD_RIGHT), 0, 45) . ';';
    $linha .= substr(str_pad($this->utilizaParametrosMediaFeriasRescisao, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->utilizaParametrosMedias13Rescisão, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->completaPeriodoGozoSeSaldoMenor10Dias, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->ignoraFaltasFeriasNormais, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->agenciaSindicato, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->digitoVerificadorAgenciaSindicato, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->coligadaFornecedor, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->fornecedorLancamentoFinanceiro, 25, ' ', STR_PAD_RIGHT), 0, 25) . ';';
    $linha .= substr(str_pad($this->pagaFeriasProporcionaisParaDemitidosPorJustaCausa, 1, 0, STR_PAD_LEFT), 0, 1) . ';';

    return $linha;
  }

}
