<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of eventos_sindicato
 *
 * @author rafael.reis
 */
class eventos_sindicato {

  public $codigoSindicato = ''; // String 10 1
  public $tipoMedias = 0; // Inteiro 02 2
  public $grupoMedias = 0; // Inteiro 02 3
  public $codigoEventoPagto = ''; // String 04 4
  public $codigoEventoDiferenca = ''; // String 04 5
  public $desprezaAdicional = 0; // Inteiro 02 6
  public $codigoEventoEnvelope = ''; // String 04 7

  public function montar() {

    $linha = substr(str_pad($this->codigoSindicato, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->tipoMedias, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->grupoMedias, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigoEventoPagto, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->codigoEventoDiferenca, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->desprezaAdicional, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigoEventoEnvelope, 4, ' ', STR_PAD_RIGHT), 0, 4);

    return $linha;
  }

}
