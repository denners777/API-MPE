<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of linhas_vale
 *
 * @author rafael.reis
 */
class linhas_vale_transporte {

  public $codigoLinha = ''; // String 20 1
  public $nomeLinha = ''; // String 50 2
  public $codigoTarifa = ''; // String 03 3
  public $grupoTransporte = ''; // String 02 4
  public $codigoMeioTransporte = '';//B-Barca, I-Integração M-Metrô N-Bonde O-Ônibus T-Trem String 02 5
  public $codigoItinerario = ''; //  String 05 6
  public $unico = 0; // (Apenas um Ticket para o mês inteiro)(0 - Não / 1- Sim) Inteiro 01 7

  public function montar() {

    $linha = substr(str_pad($this->codigoLinha, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->nomeLinha, 50, ' ', STR_PAD_RIGHT), 0, 50) . ';';
    $linha .= substr(str_pad($this->codigoTarifa, 3, ' ', STR_PAD_RIGHT), 0, 3) . ';';
    $linha .= substr(str_pad($this->grupoTransporte, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigoMeioTransporte, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigoItinerario, 5, ' ', STR_PAD_RIGHT), 0, 5) . ';';
    $linha .= substr(str_pad($this->unico, 1, 0, STR_PAD_LEFT), 0, 1);

    return $linha;
  }

}
