<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_layout
 *
 * @author denner.fernandes
 */
class model_item extends MY_Model {

  const TABELA = 'IMP_ITEM';
  const ID = 'ID_IMP_ITEM';
  const NOME = 'NM_NOME';
  const VERSAO = 'DS_VERSAO';
  const DELIMITADOR = 'DS_DELIMITADOR';
  const USUARIO = 'CD_USUARIO';
  const CRIADO = 'DT_CRIADO';
  const MODIFICADO = 'DT_MODIFICADO';

  public function __construct() {
    parent::__construct();
  }

  public function __destruct() {
    
  }

  public function getAllUsed() {

    $this->db->where(self::ID . ' IS NOT NULL AND EXISTS (SELECT 1 FROM ' . model_layout::TABELA . ' LA WHERE LA.' . model_layout::ITEM . ' = IT.' . self::ID . ')')
            ->order_by(self::ID, 'ASC');

    $query = $this->db->get(self::TABELA . ' IT ');
    if ($query) {
      return $query->result_array();
    }
  }
  
  public function getAllNotUsed() {

    $this->db->where(self::ID . ' IS NOT NULL AND NOT EXISTS (SELECT 1 FROM ' . model_layout::TABELA . ' LA WHERE LA.' . model_layout::ITEM . ' = IT.' . self::ID . ')')
            ->order_by(self::ID, 'ASC');

    $query = $this->db->get(self::TABELA . ' IT ');
    if ($query) {
      return $query->result_array();
    }
  }

}
