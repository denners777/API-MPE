<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rateio_tomador_servico
 *
 * @author denner.fernandes
 */
class rateio_tomador_servico {

  public $chapa = '';
  public $codigoTomador = '';
  public $codigoColigadoTomador = 0;
  public $valor = 0;
  public $tipoTomador = 0; //0, 1 ou 2
  public $idTomador = '';

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= $this->codigoTomador . ';';
    $linha .= $this->codigoColigadoTomador . ';';
    $linha .= $this->valor . ';';
    $linha .= $this->tipoTomador . ';';
    $linha .= $this->idTomador . ';';

    return $linha;
  }

}
