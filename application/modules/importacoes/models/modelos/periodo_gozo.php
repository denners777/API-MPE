<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of periodo_gozo
 *
 * @author denner.fernandes
 */
class periodo_gozo {

  public $CHAPA = '';               //string 16
  public $FIMPERAQUIS = '';         //Data 08
  public $DATAPAGTO = '';           //Data 08
  public $DATAINICIO = '';          //Data 08
  public $DATAFIM = '';             //Data 08
  public $DATAAVISO = '';           //Data 08
  public $NRODIASABONO = 0;         //Real 04
  public $PAGA1APARC13O = 0;        //Inteiro 02
  public $NDIASLICREM1 = 0;         //Inteiro 04
  public $NDIASLICREM2 = 0;         //Inteiro 04
  public $FERIASCOLETIVAS = 0;      //Inteiro 02
  public $FERIASPERDIDAS = 0;       //Inteiro 04
  public $OBSERVACAO = '';          //string 80
  public $SITUACAOFERIAS = '';      //string 04
  public $DATAINICIODESCEMPR = '';  //Data 08
  public $NROVEZESDESCEMPR = 0;     //Inteiro 03
  public $ALTAS = 0;                //Real 04
  public $NRODIASANTECIPADOS = 0;   //Real 04
  public $FIMPERAQUISANTEC = '';    //Data 08
  public $DATAPAGTOANTEC = '';      //Data 08
  public $PERIODOANTECIPADO = 0;    //Inteiro 02
  public $NRODIASFERIADO = 0;       //Real 04

  public function montar() {

    $linha = substr(str_pad($this->CHAPA, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->FIMPERAQUIS, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->DATAPAGTO, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->DATAINICIO, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->DATAFIM, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->DATAAVISO, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->NRODIASABONO, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->PAGA1APARC13O, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->PAGA1APARC13O, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->NDIASLICREM1, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->NDIASLICREM2, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->FERIASCOLETIVAS, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->FERIASPERDIDAS, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->OBSERVACAO, 80, ' ', STR_PAD_RIGHT), 0, 80) . ';';
    $linha .= substr(str_pad($this->SITUACAOFERIAS, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->DATAINICIODESCEMPR, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->NROVEZESDESCEMPR, 3, 0, STR_PAD_LEFT), 0, 3) . ';';
    $linha .= substr(str_pad($this->ALTAS, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->NRODIASANTECIPADOS, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->FIMPERAQUISANTEC, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->DATAPAGTOANTEC, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->PERIODOANTECIPADO, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->NRODIASFERIADO, 4, 0, STR_PAD_LEFT), 0, 4);

    return $linha;
  }

}
