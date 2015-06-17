<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_tipo_de_para
 *
 * @author denner.fernandes
 */
class model_tipo_de_para extends MY_Model {

  const TABELA = 'IMP_TIPO_DE_PARA';
  const ID = 'ID_IMP_TIPO_DE_PARA';
  const DESCRICAO = 'DS_DESCRICAO';
  const TABELA_RM = 'DS_TABELA';
  const CODIGO = 'CD_CODIGO';
  const NOME = 'NM_NOME';
  const USUARIO = 'CD_USUARIO';
  const CRIADO = 'DT_CRIADO';
  const MODIFICADO = 'DT_MODIFICADO';

  private $RM;

  public function __construct() {
    parent::__construct();
  }

  public function __destruct() {
    
  }

  public function getTipoImportacao($tabela, $cod, $nome) {
    $this->RM = $this->load->database('rm', TRUE);
    $query = $this->RM->query('SELECT ' . $cod . ' COD, ' . $nome . ' NOME FROM RM.' . $tabela . ' ORDER BY ' . $cod);

    if ($query->num_rows > 0) {
      return $query->result_array();
    } else {
      return FALSE;
    }
  }

}
