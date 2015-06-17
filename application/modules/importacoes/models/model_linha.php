<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_linha
 *
 * @author denner.fernandes
 */
class model_linha extends MY_Model {

  const TABELA = 'IMP_LINHA';
  const ID = 'ID_IMP_LINHA';
  const LAYOUT = 'CD_IMP_ITEM';
  const LINHA = 'TX_LINHA';
  const EMPRESA = 'CD_EMPRESA';
  const USUARIO = 'CD_USUARIO';
  const CRIADO = 'DT_CRIADO';
  const MODIFICADO = 'DT_MODIFICADO';

  public function __construct() {
    parent::__construct();
  }

  public function __destruct() {
    
  }

  public function getAll($page = NULL, $paginacao = NULL) {
    parent::getAll($page, $paginacao);

    $this->load->Model('model_item');
    $this->load->Model('nucleo/model_empresa');

    $this->db->select('COUNT(LN.' . self::ID . ') QTD, IT.' . model_item::NOME . ' ITEM, IT.' . model_item::ID . ' ID, EM.' . model_empresa::DESCRICAO . ' EMPRESA, EM.' . model_empresa::ID . ' ID_EMPRESA')
            ->from(self::TABELA . ' LN')
            ->join(model_item::TABELA . ' IT', 'IT.' . model_item::ID . ' = LN.' . self::LAYOUT)
            ->join(model_empresa::TABELA . ' EM', 'EM.' . model_empresa::ID . ' = LN.' . self::EMPRESA)
            ->group_by('IT.' . model_item::NOME . ', IT.' . model_item::ID . ', EM.' . model_empresa::DESCRICAO . ', EM.' . model_empresa::ID)
            ->order_by('IT.' . model_item::NOME);

    $query = $this->db->get();

    if (!empty($query)) {
      return $query->result_array();
    } else {
      throw new Exception('show_stack_bar_top("error", "Erro", "Não há registros.")');
    }
  }
  
  public function deletarByItem($ID) {
    try {
      
      $this->db->where(self::LAYOUT, $ID);
      $resposta = $this->db->delete(self::TABELA);
      if (!$resposta) {
        throw new Exception('show_stack_bar_top("error", "Erro", "Falha ao excluir dado.")');
      }
      return $resposta;
    } catch (Exception $exc) {
      return $exc->getMessage();
    }
  }
}
