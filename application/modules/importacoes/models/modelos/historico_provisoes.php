<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historico_provisoes
 *
 * @author denner.fernandes
 */
class historico_provisoes {

  public $chapa = '';                                   //String 16 1
  public $ano = 0;                                      //Inteiro 04 2
  public $mes = 0;                                      //Inteiro 02 3
  public $numeroAvosFeriasVencidos = 0;                 //Inteiro 05 4
  public $numeroAvosFeriasProporcionais = 0;            //Inteiro 05 5
  public $numeroAvos13 = 0;                             //Real 05 6
  public $dataVencimentoFerias = '';                    //Data 08 7
  public $valorProvisaoFerias = 0;                      //(Formato 999999999999,99) Real 15 8
  public $valorProvisao13 = 0;                          //(Formato 999999999999,99) Real 15 9
  public $valorProvisaoComAbatimentoFerias = 0;         //(Formato 999999999999,99) Real 15 10
  public $valorProvisaoSemAbatimentoFérias = 0;         //(Formato 999999999999,99) Real 15 11
  public $valorProvisaoMediaFeriasVencidas = 0;         //(Formato 999999999999,99) Real 15 12
  public $valorProvisaoMediaFeriasProporcionais = 0;    //(Formato 999999999999,99) Real 15 13
  public $valorProvisaoMedia13 = 0;                     //(Formato 999999999999,99) Real 15 14
  public $editado = 0;                                  //Inteiro 1 15
  public $valorProvisaoFeriasProporcionais = 0;         //(Formato 999999999999,99) Real 15 16
  public $valorProvisaoFeriasVencidas = 0;              //(Formato 999999999999,99) Real 15 17

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->ano, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->mes, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->numeroAvosFeriasVencidos, 5, 0, STR_PAD_LEFT), 0, 5) . ';';
    $linha .= substr(str_pad($this->numeroAvosFeriasProporcionais, 5, 0, STR_PAD_LEFT), 0, 5) . ';';
    $linha .= substr(str_pad($this->numeroAvos13, 5, 0, STR_PAD_LEFT), 0, 5) . ';';
    $linha .= substr(str_pad($this->dataVencimentoFerias, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->valorProvisaoFerias, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->valorProvisao13, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->valorProvisaoComAbatimentoFerias, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->valorProvisaoSemAbatimentoFérias, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->valorProvisaoMediaFeriasVencidas, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->valorProvisaoMediaFeriasProporcionais, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->valorProvisaoMedia13, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->editado, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->valorProvisaoFeriasProporcionais, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->valorProvisaoFeriasVencidas, 15, 0, STR_PAD_LEFT), 0, 15) . ';';

    return $linha;
  }

}
