<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historico_endereco
 *
 * @author denner.fernandes
 */
class historico_endereco {

  public $flag = 0;
  public $codigoPessoa = 0;     //(verificar observação) Inteiro 05 1
  public $chapa = 0;            //(verificar observação) String 16 1
  public $dataMudanca = '';     //Data 08 2
  public $rua = '';             //String 30 3
  public $numero = '';          //String 08 4
  public $complemento = '';     //String 16 5
  public $bairro = '';          //String 20 6
  public $estado = '';          //String 02 7
  public $cidade = '';          //String 32 8
  public $cep = '';             //String 09 9
  public $pais = '';            //String 16 10
  public $telefone = '';        //String 15 11

  public function montar() {

    if ($this->flag == 0) {
      $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_LEFT), 0, 16) . ';';
    } else {
      $linha = substr(str_pad($this->codigoPessoa, 5, 0, STR_PAD_LEFT), 0, 16) . ';';
    }
    $linha .= substr(str_pad($this->dataMudanca, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->rua, 30, ' ', STR_PAD_RIGHT), 0, 30) . ';';
    $linha .= substr(str_pad($this->numero, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->complemento, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->bairro, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->estado, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->cidade, 32, ' ', STR_PAD_RIGHT), 0, 32) . ';';
    $linha .= substr(str_pad($this->cep, 9, ' ', STR_PAD_RIGHT), 0, 9) . ';';
    $linha .= substr(str_pad($this->pais, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->telefone, 15, ' ', STR_PAD_RIGHT), 0, 15);

    return $linha;
  }

}
