<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dependentes
 *
 * @author denner.fernandes
 */
class dependentes {

  public $chapa = '';                                           //String 16
  public $numeroDependente = '';                                //Inteiro 2
  public $nomeDependente = '';                                  //String 120
  public $cpfDependente = '';                                   //String 12
  public $dataNascimentoDependente = '';                        //Data 8
  public $sexoDependente = '';                                  //String 1
  public $estadoCivilDependente = '';                           //String 1
  public $localNascimentoDependente = '';                       //String 32
  public $nomeCartorio = '';                                    //String 40
  public $numeroRegistro = '';                                  //String 10
  public $numeroLivroRegistro = '';                             //String 8
  public $numeroFolhaRegistro = '';                             //String 5
  public $incidenciaIrrf = '';                                  //Inteiro 1
  public $incidenciaInss = '';                                  //Inteiro 1
  public $incidenciaAssistenciaMedica = '';                     //Inteiro 1
  public $incidenciaPensao = '';                                //Inteiro 1
  public $incidenciaDefiniveis = '';                            //String 20 ("*" nas posições das incidências confirmadas e
  // " " (branco) nas posições das incidências não 
  // confirmadas. Ex: *_ _ * _ _ _ o dependente 
  // incide na Incidência 1 e na Incidência 4
  public $grauParentescoDependente = '';                        //String 1
  public $dependentePossuiCartaoVacina = '';                    //String 1
  public $dataEntregaCertidaoNascimento = '';                   //Data 8
  public $flagApresentoucomprovanteFreguenciaEscolar = '';      //String 1
  public $universitarioEscolaTecnica2Grau = '';                 //String 1
  public $incidenciaSalarioFamilia = '';                        //String 1
  public $agenciaPagamentoPensao = '';                          //String 6
  public $bancoPagamentoPensao = '';                            //String 3
  public $calculoPensaoSobreBruto = '';                         //String 1
  public $contaPagamentoPensao = '';                            //String 15
  public $formulaAdicionalPensao = '';                          //String 8
  public $formulaCalculo = '';                                  //String 8
  public $percentualPensao = '';                                //String 8
  public $tipoPensao = '';                                      //String 2
  public $dataInicioDescontoPensao = '';                        //Data 8
  public $nomeResponsavel = '';                                 //String 45
  public $observacao = '';                                      //String 80
  public $coligadaFornecedor = '';                              //Inteiro 5
  public $codigoFornecedor = '';                                //String 25
  public $operacaoBancaria = '';                                //String 5

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->numeroDependente, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->nomeDependente, 120, ' ', STR_PAD_RIGHT), 0, 120) . ';';
    $linha .= substr(str_pad($this->cpfDependente, 12, ' ', STR_PAD_RIGHT), 0, 12) . ';';
    $linha .= substr(str_pad($this->dataNascimentoDependente, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->sexoDependente, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->estadoCivilDependente, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->localNascimentoDependente, 32, ' ', STR_PAD_RIGHT), 0, 32) . ';';
    $linha .= substr(str_pad($this->nomeCartorio, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->numeroRegistro, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->numeroLivroRegistro, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->numeroFolhaRegistro, 5, ' ', STR_PAD_RIGHT), 0, 5) . ';';
    $linha .= substr(str_pad($this->incidenciaIrrf, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incidenciaInss, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incidenciaAssistenciaMedica, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incidenciaPensao, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incidenciaDefiniveis, 20, 0, STR_PAD_LEFT), 0, 20) . ';';
    $linha .= substr(str_pad($this->grauParentescoDependente, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->dependentePossuiCartaoVacina, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->dataEntregaCertidaoNascimento, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->flagApresentoucomprovanteFreguenciaEscolar, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->universitarioEscolaTecnica2Grau, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->incidenciaSalarioFamilia, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->agenciaPagamentoPensao, 6, ' ', STR_PAD_RIGHT), 0, 6) . ';';
    $linha .= substr(str_pad($this->bancoPagamentoPensao, 3, ' ', STR_PAD_RIGHT), 0, 3) . ';';
    $linha .= substr(str_pad($this->calculoPensaoSobreBruto, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->contaPagamentoPensao, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->formulaAdicionalPensao, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->formulaCalculo, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->percentualPensao, 9, ' ', STR_PAD_RIGHT), 0, 9) . ';';
    $linha .= substr(str_pad($this->tipoPensao, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->dataInicioDescontoPensao, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->nomeResponsavel, 45, ' ', STR_PAD_RIGHT), 0, 45) . ';';
    $linha .= substr(str_pad($this->observacao, 80, ' ', STR_PAD_RIGHT), 0, 80) . ';';
    $linha .= substr(str_pad($this->coligadaFornecedor, 5, 0, STR_PAD_LEFT), 0, 5) . ';';
    $linha .= substr(str_pad($this->codigoFornecedor, 25, ' ', STR_PAD_RIGHT), 0, 25) . ';';
    $linha .= substr(str_pad($this->operacaoBancaria, 5, ' ', STR_PAD_RIGHT), 0, 5) . ';';

    return $linha;
  }

}
