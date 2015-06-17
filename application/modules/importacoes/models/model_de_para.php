<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_de_para
 *
 * @author denner.fernandes
 */
class model_de_para extends MY_Model {

  const TABELA = 'IMP_DE_PARA';
  const ID = 'ID_IMP_DE_PARA';
  const TIPO = 'CD_IMP_TIPO_DE_PARA';
  const DE = 'CD_DE';
  const PARA = 'CD_PARA';
  const DESCRICAO = 'DS_DE_PARA';
  const VARIANTE = 'CD_VARIANTE';
  const REF = 'DS_REF_VARIANTE';
  const USUARIO = 'CD_USUARIO';
  const CRIADO = 'DT_CRIADO';
  const MODIFICADO = 'DT_MODIFICADO';

  public function __construct() {
    parent::__construct();
  }

  public function __destruct() {
    
  }

  public function getCriterio($criterio = NULL) {
    parent::get($criterio);

    $this->db->where($criterio);
    $this->db->order_by(self::ID, "ASC");
    $query = $this->db->get(self::TABELA);
    if ($query) {
      return $query->result_array();
    } else {
      throw new Exception('show_stack_bar_top("error", "Erro", "Não há registros.")');
    }
  }

}
