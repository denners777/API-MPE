<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of eventos_adicionais_ferias
 *
 * @author rafael.reis
 */
class eventos_adicionais_ferias {

  public $chapa = '';                 // string 16 1
  public $codigoEventoRecibo = '';      // string 04 2
  public $codigoEventoFolha = '';       // string 04 3
  public $valor = 0;                    // real 09 4
  public $numeroVezes = 0;              // inteiro 04 5
  public $eventoFolhaProxMes = '';      // string 04 6
  public $eventoFolhaMesAnt = 0;        // string 04 7

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->codigoEventoRecibo, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->codigoEventoFolha, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->valor, 9, 0, STR_PAD_LEFT), 0, 9) . ';';
    $linha .= substr(str_pad($this->numeroVezes, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->eventoFolhaProxMes, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->eventoFolhaMesAnt, 4, ' ', STR_PAD_RIGHT), 0, 4);

    return $linha;
    
  }

}
