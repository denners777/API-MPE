<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of linha_transporte_utilizada
 *
 * @author denner.fernandes
 */
class linha_transporte_utilizada {
  
  public $chapa = '';                   //String 16
  public $nViagens = '';                //Interger 2
  public $nViagensMeioExpediente = '';  //Interger 2
  public $codigoLinha = '';             //String 20
  public $dataInicioUsoLinha = '';      //Date 8
  public $dataFinalUsoLinha = '';       //Date 8
  

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_LEFT), 0, 16) . ';';
    $linha .= substr(str_pad($this->nViagens, 2, 0, STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->nViagensMeioExpediente, 2, 0, STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigoLinha, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->dataInicioUsoLinha, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->dataFinalUsoLinha, 8, ' ', STR_PAD_RIGHT), 0, 8);
    
    return $linha;
  }
  
}
