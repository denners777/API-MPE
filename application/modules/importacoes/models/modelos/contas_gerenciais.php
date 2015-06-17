<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contas_gerenciais
 *
 * @author denner.fernandes
 */
class contas_gerenciais {

  public $codigoContabil = '';          //Alfanumérico 20 1 a 40 Sim
  public $codigoReduzido = '';          //Alfanumérico 10 1 a 20 Sim
  public $descricaoConta = '';          //Alfanumérico 40  Sim
  public $analiticaOuSintetica = '';    //A ou S 01  Sim
  public $devedoraOuCredora = '';       //D ou C 01  Sim
  public $gerencial = '';               //G 01  Sim
  public $distribuicaoGerencial = '';   //N 01  Sim
  public $contaGlobal = '';             //S ou N Não Tem 01 Não

  public function montar() {

    $linha = substr(str_pad($this->codigoContabil, 20, ' ', STR_PAD_RIGHT), 0, 20);
    $linha .= substr(str_pad($this->codigoReduzido, 10, ' ', STR_PAD_RIGHT), 0, 10);
    $linha .= substr(str_pad($this->descricaoConta, 40, ' ', STR_PAD_RIGHT), 0, 40);
    $linha .= substr(str_pad($this->analiticaOuSintetica, 1, ' ', STR_PAD_RIGHT), 0, 1);
    $linha .= substr(str_pad($this->devedoraOuCredora, 1, ' ', STR_PAD_RIGHT), 0, 1);
    $linha .= substr(str_pad($this->gerencial, 1, ' ', STR_PAD_RIGHT), 0, 1);
    $linha .= substr(str_pad($this->distribuicaoGerencial, 1, ' ', STR_PAD_RIGHT), 0, 1);
    $linha .= substr(str_pad($this->contaGlobal, 1, ' ', STR_PAD_RIGHT), 0, 1);
    
    return $linha;
  }

}
