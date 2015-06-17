<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gagencia
 *
 * @author denner.fernandes
 */
class gagencia {

  public $NUMBANCO = '';              //String 3
  public $NUMAGENCIA = '';            //String 6
  public $NOME = '';                  //String 20
  public $PRACA = '';                 //String 32
  public $CODCOMPENSACAO = '';        //String 3
  public $RUA = '';                   //String 30
  public $NUMERO = '';                //String 8
  public $COMPLEMENTO = '';           //String 16
  public $BAIRRO = '';                //String 20
  public $ESTADO = '';                //String 2
  public $CIDADE = '';                //String 32
  public $CEP = '';                   //String 9
  public $PAIS = '';                  //String 16
  public $TIPOAGENCIA = 0;            //Inteiro 2
  public $DIGAG = '';                 //String 2
  public $TELEFONE = '';              //String 15
  public $INFORMACOESADICIONAIS = ''; //String 255 - fora do layout

  public function montar() {
    $linha = substr(str_pad($this->NUMBANCO, 3, 0, STR_PAD_LEFT), 0, 3) . ';';
    $linha .= substr(str_pad($this->NUMAGENCIA, 6, 0, STR_PAD_LEFT), 0, 6) . ';';
    $linha .= substr(str_pad($this->NOME, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->PRACA, 32, ' ', STR_PAD_RIGHT), 0, 32) . ';';
    $linha .= substr(str_pad($this->CODCOMPENSACAO, 3, 0, STR_PAD_LEFT), 0, 3) . ';';
    $linha .= substr(str_pad($this->RUA, 30, ' ', STR_PAD_RIGHT), 0, 30) . ';';
    $linha .= substr(str_pad($this->NUMERO, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->COMPLEMENTO, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->BAIRRO, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->ESTADO, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->CIDADE, 32, ' ', STR_PAD_RIGHT), 0, 32) . ';';
    $linha .= substr(str_pad($this->CEP, 9, ' ', STR_PAD_RIGHT), 0, 9) . ';';
    $linha .= substr(str_pad($this->PAIS, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->TIPOAGENCIA, 2, ' ', STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->DIGAG, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->TELEFONE, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->INFORMACOESADICIONAIS, 255, ' ', STR_PAD_RIGHT), 0, 255);
    return $linha;
  }

}
