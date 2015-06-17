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
class model_layout extends MY_Model {

  const TABELA = 'IMP_LAYOUT';
  const ID = 'ID_IMP_LAYOUT';
  const ITEM = 'CD_IMP_ITEM';
  const POSICAO = 'NU_POSICAO';
  const DESCRICAO = 'DS_DESCRICAO';
  const TAMANHO = 'NU_TAMANHO';
  const TIPO = 'DS_TIPO';
  const DEPARA = 'CD_IMP_TIPO_DE_PARA';
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

    $this->db->select('COUNT(' . self::POSICAO . ') QTD, ' . model_item::NOME . ' ITEM, ' . model_item::ID . ' ID')
            ->from(self::TABELA)
            ->join(model_item::TABELA, model_item::ID . ' = ' . self::ITEM)
            ->group_by(model_item::NOME . ', ' . model_item::ID)
            ->order_by(model_item::NOME);

    $query = $this->db->get();

    if (!empty($query)) {
      return $query->result_array();
    } else {
      throw new Exception('show_stack_bar_top("error", "Erro", "Não há registros.")');
    }
  }
  
  public function deletarByItem($ID) {
    try {
      
      $this->db->where(self::ITEM, $ID);
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
