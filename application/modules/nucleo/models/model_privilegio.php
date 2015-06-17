<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_privilegio
 *
 * @author denner.fernandes
 */
class model_privilegio extends MY_Model {

  const TABELA = 'PRIVILEGIO';
  const ID = 'CD_PRIVILEGIO';
  const DESCRICAO = 'DS_DESCRICAO';
  const USUARIO = 'CD_USUARIO';
  const CRIADO = 'DT_CRIADO';
  const MODIFICADO = 'DT_MODIFICADO';

  public function __construct() {
    parent::__construct();
  }

  public function __destruct() {
    
  }

}
