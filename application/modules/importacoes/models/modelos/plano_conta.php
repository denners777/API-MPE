<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of plano_conta
 *
 * @author denner.fernandes
 */
class plano_conta {

  public $codigoContabil = '';        //Alfanumérico 20 Sim
  public $codigoReduzido = '';        //Alfanumérico 10 Sim
  public $descricaoConta = '';        //Alfanumérico 40 Sim
  public $analiticaOuSintetica = '';  //A ou S 01 Sim
  public $devedoraOuCredora = '';     //D ou C 01 Sim
  public $contabil = '';              //C 01 Sim
  public $distribuicaoGerencial = ''; //S ou N 01 Sim
  public $saldoAnterior = 0;          //Numérico c/ 2 decimais 18 Não

  public function montar() {

    $linha = substr(str_pad($this->codigoContabil, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->codigoReduzido, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->descricaoConta, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->analiticaOuSintetica, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->devedoraOuCredora, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->contabil, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->distribuicaoGerencial, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->saldoAnterior, 18, 0, STR_PAD_LEFT), 0, 18);

    return $linha;
  }

}