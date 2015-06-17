<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of centro_custo
 *
 * @author denner.fernandes
 */
class centro_custo {

  public $codigo = '';                    //String 25
  public $codigoGccusto = '';             //String 25
  public $nome = '';                      //String 40
  public $reservado1 = '';                //String 2
  public $reservado2 = '';                //String 22
  public $rua = '';                       //String 32
  public $numero = '';                    //String 8
  public $complemento = '';               //String 20
  public $bairro = '';                    //String 20
  public $cidade = '';                    //String 32
  public $estado = '';                    //String 2
  public $cep = '';                       //String 9
  public $codigoInss = '';                //String 22
  public $codigoTerceiros = '';           //String 4
  public $complementoGuia = '';           //String 120
  public $percentualTerceiros = '';       //Real 8
  public $codigoIntegracaoContabil = '';  //String 22
  public $codigoIntegracaoGerencial = ''; //String 22
  public $numeroFilialContabil = '';      //Integer 7
  public $reservado3 = '';                //String 15
  public $contribuiSesiSenai = '';        //Integer 1
  public $percentualAcidenteTrabalho = '';//Real 8
  public $codigoDeptoContabil = '';       //String 7

  public function montar() {

    $linha = substr(str_pad($this->codigo, 25, ' ', STR_PAD_RIGHT), 0, 25) . ';';
    $linha .= substr(str_pad($this->codigoGccusto, 25, ' ', STR_PAD_RIGHT), 0, 25) . ';';
    $linha .= substr(str_pad($this->nome, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->reservado1, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->reservado2, 22, ' ', STR_PAD_RIGHT), 0, 22) . ';';
    $linha .= substr(str_pad($this->rua, 32, ' ', STR_PAD_RIGHT), 0, 32) . ';';
    $linha .= substr(str_pad($this->numero, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->complemento, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->bairro, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->cidade, 32, ' ', STR_PAD_RIGHT), 0, 32) . ';';
    $linha .= substr(str_pad($this->estado, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->cep, 9, ' ', STR_PAD_RIGHT), 0, 9) . ';';
    $linha .= substr(str_pad($this->codigoInss, 22, ' ', STR_PAD_RIGHT), 0, 22) . ';';
    $linha .= substr(str_pad($this->codigoTerceiros, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->complementoGuia, 120, ' ', STR_PAD_RIGHT), 0, 120) . ';';
    $linha .= substr(str_pad($this->percentualTerceiros, 8, 0, STR_PAD_LEFT), 0, 8) . ';';
    $linha .= substr(str_pad($this->codigoIntegracaoContabil, 22, ' ', STR_PAD_RIGHT), 0, 22) . ';';
    $linha .= substr(str_pad($this->codigoIntegracaoGerencial, 22, ' ', STR_PAD_RIGHT), 0, 22) . ';';
    $linha .= substr(str_pad($this->numeroFilialContabil, 7, 0, STR_PAD_LEFT), 0, 7) . ';';
    $linha .= substr(str_pad($this->reservado3, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->contribuiSesiSenai, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->percentualAcidenteTrabalho, 8, 0, STR_PAD_LEFT), 0, 8) . ';';
    $linha .= substr(str_pad($this->percentualAcidenteTrabalho, 7, ' ', STR_PAD_RIGHT), 0, 7);

    return $linha;
  }

}
