<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of campo_complementar
 *
 * @author denner.fernandes
 */
class campo_complementar {

  private $campos = array('CODCOLIGADA', 'CHAPA', 'PLSAUDE', 'VAVR', 'PLODONTO', 'OPODON', 'NCARTAO', 'OPTRANSP', 'TIPOSVIDA', 'QTDVRVA', 'FORMAPGTO', 'TIPSANG', 'VALIMENT', 'DATAOPPSAUDE', 'CAGED');
  public $codcoligada = 0;
  public $chapa = '';
  public $plsaude = '';
  public $vavr = '';
  public $plodonto = '';
  public $opodon = '';
  public $ncartao = '';
  public $optransp = '';
  public $tiposvida = '';
  public $qtdvrva = 0;
  public $formapgto = '';
  public $tipsang = '';
  public $valiment = '';
  public $dataoppsaude = '';
  public $caged = '';

  public function header() {
    return implode(';', $this->campos);
  }

  public function montar() {

    $linha .= $this->codcoligada . ';';
    $linha .= substr(str_pad($this->chapa, 6, 0, STR_PAD_LEFT), 0, 6) . ';';
    $linha .= $this->plsaude . ';';
    $linha .= $this->vavr . ';';
    $linha .= $this->plodonto . ';';
    $linha .= $this->opodon . ';';
    $linha .= $this->ncartao . ';';
    $linha .= $this->optransp . ';';
    $linha .= $this->tiposvida . ';';
    $linha .= $this->qtdvrva . ';';
    $linha .= $this->formapgto . ';';
    $linha .= $this->tipsang . ';';
    $linha .= $this->valiment . ';';
    $linha .= $this->dataoppsaude . ';';
    $linha .= $this->caged;

    return $linha;
  }

}
