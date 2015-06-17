<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of base_aas
 *
 * @author rafael.reis
 */
class base_aas {

  public $chapa = '';             //String 16 1
  public $anoCompetencia = 0;     //Inteiro 04 2
  public $mesCompetencia = 0;     //Inteiro 02 3
  public $numeroGrupo = 0;        //(Referência a "Código" na tabela de Códigos de Grupos de AAS) Inteiro 01 4
  public $baseContribuicao = 0;   //(Formato 999999999999,99) Real 15 5

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->anoCompetencia, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->mesCompetencia, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->numeroGrupo, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->baseContribuicao, 15, 0, STR_PAD_LEFT), 0, 15);

    return $linha;
  }

}
