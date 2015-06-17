<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_funcionario
 *
 * @author denner.fernandes
 */
class model_funcionario extends MY_Model {

  const TABELA = 'FUNCIONARIO';
  const ID = 'ID_FUNCIONARIO';
  const EMPRESA = 'CD_EMPRESA';
  const CHAPA = 'CD_CHAPA';
  const NOME = 'NM_NOME';
  const CPF = 'CD_CPF';
  const ADMISSAO = 'DT_DATAATDMISSAO';
  const SECAO = 'CD_SECAO';
  const DESCSECAO = 'DS_DESCRICAOSECAO';
  const SITUACAO = 'DS_SITUACAO';
  const TIPO = 'DS_TIPO';
  const FUNCAO = 'DS_FUNCAO';
  const EMAIL = 'DS_EMAIL';
  const SOBRE = 'DS_SOBRE';
  const USUARIO = 'CD_USUARIO';
  const CRIADO = 'DT_CRIADO';
  const MODIFICADO = 'DT_MODIFICADO';

  public function __construct() {
    parent::__construct();
  }

  public function __destruct() {
    
  }

}