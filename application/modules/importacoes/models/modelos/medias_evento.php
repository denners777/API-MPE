<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of medias_evento
 *
 * @author rafael.reis
 */
class medias_evento {

  public $codigoEvento = ''; // String 04 1
  public $tipoMedia = 0; // (1- Férias, 2-13º Salário Rescisão, 3-Aviso Prévio, 4-Licença Maternidade, 5 – 13º Salário, 6 – Férias na Rescisão) Inteiro 01 2
  public $grupo = 0; // (Valor de estar entre 0 e 7) Inteiro 01 3
  public $eventoUltimoValor = 0; // (0 - Não/ 1 - Sim) Inteiro 01 4

  public function montar() {

    $linha = substr(str_pad($this->codigoEvento, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->tipoMedia, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->grupo, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->eventoUltimoValor, 1, 0, STR_PAD_LEFT), 0, 1);

    return $linha;
  }
}
