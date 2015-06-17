<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of campo_complementar_dependente
 *
 * @author denner.fernandes
 */
class campo_complementar_dependente {

  private $campos = array('CODCOLIGADA', 'CHAPA', 'NRODEPEND', 'CPFRESPONSAVEL', 'NOMEMAE');
  public $codcoligada = 0;
  public $chapa = '';
  public $nrodepend = 0;
  public $cpfresponsavel = ''; //String 15
  public $nomemae = '';        //String 255

  public function header() {
    return implode(';', $this->campos);
  }

  public function montar() {

    $linha .= $this->codcoligada . ';';
    $linha .= substr(str_pad($this->chapa, 6, 0, STR_PAD_LEFT), 0, 6) . ';';
    $linha .= $this->nrodepend . ';';
    $linha .= $this->cpfresponsavel . ';';
    $linha .= $this->cpfresponsavel;

    return $linha;
  }

}
