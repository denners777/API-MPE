<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historico_afastamento
 *
 * @author denner.fernandes
 */
class historico_afastamento {

  public $chapa = '';                   //String 16 1
  public $dataInicioAfastamento = '';   //Data 08 2
  public $dataFinalAfastamento = '';    //Data 08 3
  public $codigoTipoAfastamento = '';   //(E-Licença Maternidade I-Apos. Invalidez L-Licença sem vencimento M-Serv. Militar P-Af. Previdência R-Licença Remunerada T-Af. Ac. Trabalho U-Outros) String 01 4
  public $codigoMotivoAfastamento = ''; //(Referência a "Código do Motivo da Mud. de Situação" no arquivo de motivo de mudança de situação do funcionário) String 02 5
  public $observacao = '';              //String 50 6
  public $estornaTempoServico = '';     //(0-Não/1-Sim) String 01 7
  public $dataRequerimento = '';        //Data 08 8

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->dataInicioAfastamento, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->dataFinalAfastamento, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->codigoTipoAfastamento, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->codigoMotivoAfastamento, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->observacao, 50, ' ', STR_PAD_RIGHT), 0, 50) . ';';
    $linha .= substr(str_pad($this->estornaTempoServico, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->dataRequerimento, 8, ' ', STR_PAD_RIGHT), 0, 8);

    return $linha;
  }

}
