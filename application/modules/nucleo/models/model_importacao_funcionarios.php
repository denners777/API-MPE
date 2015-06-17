<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_importacao_funcionarios
 *
 * @author denner.fernandes
 */
class model_importacao_funcionarios extends MY_Model {

  const TABELA = 'FUNC_IMPORTACAO';
  const ID = 'ID_FUNC_IMPORTACAO';
  const CHAPA = 'CD_CHAPA';
  const NOME = 'NM_NOME';
  const SECAO = 'CD_SECAO';
  const DESCRICAO = 'DS_DESCRICAOSECAO';
  const CPF = 'CD_CPF';
  const SITUACAO = 'DS_SITUACAO';
  const TIPO = 'DS_TIPO';
  const ADMISSAO = 'DT_DATAADMISSAO';
  const CARGO = 'DS_CARGO';
  const EMAIL = 'DS_EMAIL';
  const EMPRESA = 'CD_EMPRESA';
  const USUARIO = 'CD_USUARIO';
  const CRIADO = 'DT_CRIADO';
  const MODIFICADO = 'DT_MODIFICADO';

  public function __construct() {
    parent::__construct();
  }

  public function __destruct() {
    
  }

  public function getUsuario($chapa = NULL, $cpf = NULL, $dataadm = NULL, $empresa = NULL) {

    if (!is_null($cpf)) {
      $cpf = 'AND ' . self::CPF . ' = \'' . $cpf . '\'';
    } else {
      $cpf = '';
    }

    if (!is_null($dataadm)) {
      $dataadm = 'AND ' . self::ADMISSAO . ' = \'' . $dataadm . '\'';
    } else {
      $dataadm = '';
    }

    $query = $this->db->query('SELECT ' . self::CHAPA . ' ' . model_funcionario::CHAPA . ',
                               ' . self::NOME . ' ' . model_funcionario::NOME . ',
                               ' . self::SECAO . ' ' . model_funcionario::SECAO . ',
                               ' . self::DESCRICAO . ' ' . model_funcionario::DESCSECAO . ',
                               ' . self::CPF . ' ' . model_funcionario::CPF . ',
                               UPPER(' . self::SITUACAO . ') ' . model_funcionario::SITUACAO . ',
                               ' . self::TIPO . ' ' . model_funcionario::TIPO . ',
                               ' . self::ADMISSAO . ' ' . model_funcionario::ADMISSAO . ',
                               ' . self::CARGO . ' ' . model_funcionario::FUNCAO . '
                               FROM ' . self::TABELA . '
                               WHERE ' . self::CHAPA . ' = \'' . $chapa . '\''
            . $cpf . $dataadm . '
                               AND ' . self::EMPRESA . ' = ' . $empresa);

    if ($query->num_rows > 0) {
      return $query->result_array();
    } else {
      return FALSE;
    }
  }

  public function getLike($busca) {
    $this->db->join(model_empresa::TABELA, model_empresa::ID . ' = ' . self::EMPRESA);
    $query = $this->db->query(
            'SELECT * FROM ' . self::TABELA . ' IF
                INNER JOIN ' . model_empresa::TABELA . ' EM
                  ON EM.' . model_empresa::ID . ' = IF.' . self::EMPRESA . '
                WHERE UPPER(IF.' . self::CHAPA . ') LIKE UPPER(\'%' . $busca . '%\')
                   OR UPPER(IF.' . self::NOME . ') LIKE UPPER(\'%' . $busca . '%\') 
                   OR UPPER(IF.' . self::SECAO . ') LIKE UPPER(\'%' . $busca . '%\') 
                   OR UPPER(IF.' . self::DESCRICAO . ') LIKE UPPER(\'%' . $busca . '%\') 
                   OR UPPER(IF.' . self::CPF . ') LIKE UPPER(\'%' . $busca . '%\') 
                   OR UPPER(IF.' . self::SITUACAO . ') LIKE UPPER(\'%' . $busca . '%\') 
                   OR UPPER(IF.' . self::TIPO . ') LIKE UPPER(\'%' . $busca . '%\') 
                   OR UPPER(IF.' . self::ADMISSAO . ') LIKE UPPER(\'%' . $busca . '%\') 
                   OR UPPER(IF.' . self::CARGO . ') LIKE UPPER(\'%' . $busca . '%\') 
                   OR UPPER(EM.' . model_empresa::DESCRICAO . ') LIKE UPPER(\'%' . $busca . '%\') 
             '
    );
    if ($query->num_rows > 0) {
      return $query->result_array();
    } else {
      throw new Exception('Não há registros.');
    }
  }

  public function getAll($page = NULL, $paginacao = NULL) {

    try {

      $return = NULL;

      $this->db->select('IF.*, EM.' . model_empresa::DESCRICAO);
      $this->db->join(model_empresa::TABELA . ' EM', 'EM.' . model_empresa::ID . ' = ' . 'IF.' . self::EMPRESA);
      $this->db->order_by('IF.' . self::ID, "ASC");
      if (!is_null($page) && !is_null($paginacao)) {
        $query = $this->db->get(self::TABELA . ' IF', $page, $paginacao);
      } else {
        $query = $this->db->get(self::TABELA . ' IF');
      }

      $return = $query->result_array();

      if (!is_null($return)) {
        return $return;
      } else {
        throw new Exception('show_stack_bar_top("error", "Erro", "Não há registros.")');
      }
    } catch (Exception $exc) {
      return $exc->getMessage();
    }
  }

}
