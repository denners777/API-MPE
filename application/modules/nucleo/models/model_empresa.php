<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_empresa
 *
 * @author denner.fernandes
 */
class model_empresa extends MY_Model {

  const TABELA = 'EMPRESA';
  const ID = 'ID_EMPRESA';
  const CODEMPRESA = 'CD_EMPRESA';
  const DESCRICAO = 'DS_NOME';
  const USUARIO = 'CD_USUARIO';
  const CRIADO = 'DT_CRIADO';
  const MODIFICADO = 'DT_MODIFICADO';

  public function __construct() {
    parent::__construct();
  }

  public function __destruct() {
    
  }

}
