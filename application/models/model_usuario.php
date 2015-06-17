<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_usuario
 *
 * @author denner.fernandes
 */
class model_usuario extends MY_Model {

  const TABELA = 'USUARIO';
  const ID = 'ID_USUARIO';
  const AD = 'DS_AD';
  const SENHA = 'DS_SENHA';
  const FUNC = 'ID_FUNCIONARIO';
  const TOKEN = 'DS_TOKEN';
  const STATUS = 'ST_STATUS';
  const CRIADO = 'DT_CRIADO';
  const MODIFICADO = 'DT_MODIFICADO';

  public function __construct() {
    parent::__construct();
  }

  public function get($criterio = NULL) {
    switch ($criterio) {
      case is_numeric($criterio):
        $this->getByID($criterio);
        break;

      case filter_var($criterio, FILTER_VALIDATE_EMAIL):
        $this->getByEmail($criterio);
        break;

      case is_string($criterio):
        $this->getByToken($criterio);
        break;

      case is_array($criterio):
        $this->getByCriterio($criterio);
        break;
    }
    return $this->dados;
  }

  public function getByID($ID) {
    $this->db->where(self::ID, $ID);
    $query = $this->db->get(self::TABELA);
    $this->dados = $query->result_array();
  }

  public function setToken($ID = NULL) {
    if (is_string($ID)) {
      $this->db->where(self::ID, $ID);
      $token[self::TOKEN] = md5(mktime() . $ID);
      $this->db->update(self::TABELA, $token);
    }
    return $token[self::TOKEN];
  }

  private function getByToken($token) {
    $this->db->where(self::TOKEN, $token);
    $this->db->where(self::STATUS, 'A');
    $query = $this->db->get(self::TABELA);
    $this->dados = $query->result_array();
  }

  private function getByEmail($email) {
    $this->db->where(self::EMAIL, $email);
    $query = $this->db->get(self::TABELA);
    $this->dados = $query->result_array();
  }

  private function getByCriterio($criterio) {

    $this->db->where($criterio);
    $query = $this->db->get(self::TABELA);
    $this->dados = $query->result_array();
  }

  public function getUsuario($criterio) {
    $this->db->join(model_funcionario::TABELA . ' FU', 'FU.' . model_funcionario::ID . ' = US.' . self::ID);
    $this->db->where($criterio);
    $query = $this->db->get(self::TABELA . ' US');
    return $query->result_array();
  }

  public function getByNome($busca = NULL, $page = NULL, $paginacao = NULL) {

    try {
      $return = NULL;
      if (!is_null($busca)) {
        $this->db->like('FU.' . model_funcionario::NOME, $busca);
        $this->db->or_like('FU.' . model_funcionario::CHAPA, $busca);
        $this->db->or_like('FU.' . model_funcionario::EMAIL, $busca);
      }
      $this->db->join(model_funcionario::TABELA . ' FU', 'FU.' . model_funcionario::ID . ' = US.' . self::ID);
      $this->db->join(model_empresa::TABELA . ' EM', 'EM.' . model_empresa::ID . ' = FU.' . model_funcionario::EMPRESA);
      $this->db->order_by('US.' . self::ID, "ASC");

      if (!is_null($page) && !is_null($paginacao)) {
        $query = $this->db->get(self::TABELA . ' US', $page, $paginacao);
      } else {
        $query = $this->db->get(self::TABELA . ' US');
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

  public function getByChapa($busca = NULL, $page = NULL, $paginacao = NULL) {

    try {

      $return = NULL;
      if (!is_null($busca)) {
        $this->db->like('FU.' . model_funcionario::CHAPA, $busca);
        $this->db->or_like('US.' . self::AD, $busca);
      }
      $this->db->join(model_funcionario::TABELA . ' FU', 'FU.' . model_funcionario::ID . ' = US.' . self::ID);
      $this->db->order_by('US.' . self::ID, "ASC");

      if (!is_null($page) && !is_null($paginacao)) {
        $query = $this->db->get(self::TABELA . ' US', $page, $paginacao);
      } else {
        $query = $this->db->get(self::TABELA . ' US');
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

  public function getAll($page = NULL, $paginacao = NULL) {

    try {

      $return = NULL;

      $this->db->order_by(self::ID, "ASC");
      $this->db->join(model_funcionario::TABELA . ' FU', 'FU.' . model_funcionario::ID . ' = US.' . model_usuario::FUNC);
      if (!is_null($page) && !is_null($paginacao)) {
        $query = $this->db->get(self::TABELA . ' US', $page, $paginacao);
      } else {
        $query = $this->db->get(self::TABELA . ' US');
      }

      $return = $query->result_array();

      if (!is_null($return)) {
        return $return;
      } else {
        throw new Exception('Não há registros.');
      }
    } catch (Exception $exc) {
      return $exc->getMessage();
    }
  }

  public function __destruct() {
    
  }

}
