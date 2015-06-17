<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_acesso
 *
 * @author denner.fernandes
 */
class model_acesso extends MY_Model {

  const TABELA = 'ACESSO';
  const ID = 'ID_ACESSO';
  const USUARIOACESSO = 'ID_USUARIO';
  const MODULO = 'ID_MODULO';
  const PRIVILEGIO = 'CD_PRIVILEGIO';
  const USUARIO = 'CD_USUARIO';
  const CRIADO = 'DT_CRIADO';
  const MODIFICADO = 'DT_MODIFICADO';

  public function __construct() {
    parent::__construct();
  }

  public function getByUsuario($busca = NULL, $page = NULL, $paginacao = NULL) {

    try {

      $return = NULL;

      $this->db->select('AC.' . self::ID . ', FU.' . model_funcionario::NOME . ' NOME, 
              US.' . model_usuario::AD . ' USUARIO, MO.' . model_modulo::NOME . ' MODULO, 
              PR.' . model_privilegio::DESCRICAO . ' PRIVILEGIO');
      $this->db->join(model_usuario::TABELA . ' US', 'US.' . model_usuario::ID . ' = AC.' . self::USUARIOACESSO);
      $this->db->join(model_funcionario::TABELA . ' FU', 'FU.' . model_funcionario::ID . ' = US.' . model_usuario::FUNC);
      $this->db->join(model_modulo::TABELA . ' MO', 'MO.' . model_modulo::ID . ' = AC.' . self::MODULO);
      $this->db->join(model_privilegio::TABELA . ' PR', 'PR.' . model_privilegio::ID . ' = AC.' . self::PRIVILEGIO);
      if (!is_null($busca)) {
        $this->db->like('FU.' . model_funcionario::NOME, $busca);
        $this->db->or_like('US.' . model_usuario::AD, $busca);
        $this->db->or_like('UPPER(PR.' . model_privilegio::DESCRICAO . ')', $busca);
      }
      $this->db->order_by(self::ID, "ASC");

      if (!is_null($page) && !is_null($paginacao)) {
        $query = $this->db->get(self::TABELA . ' AC', $page, $paginacao);
      } else {
        $query = $this->db->get(self::TABELA . ' AC');
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

  public function getMenu($ID) {
    try {

      $query = $this->db->query('SELECT AC.ID_ACESSO, MO.DS_DESCRICAO DECS_MOD, MO.DS_ICON ICON_MOD, MO.DS_URL URL_MOD,
                                        MO.CD_ORDEM ORDEM_MOD, M2.DS_DESCRICAO DESC_MENU, M2.DS_ICON ICON_MENU,
                                        M2.DS_URL URL_MENU, M2.CD_ORDEM ORDEM_MENU, M2.CD_PARENT, 
                                        MO.CD_PRIVILEGIO PRIVILEGIO_MOD, M2.CD_PRIVILEGIO PRIVILEGIO_MENU
                                 FROM MODULO MO
                                 INNER JOIN ACESSO AC
                                    ON AC.ID_MODULO   = MO.ID_MODULO
                                    AND AC.ID_USUARIO = ' . $ID . '
                                 LEFT JOIN MODULO M2
                                    ON M2.CD_PARENT = MO.ID_MODULO
                                 ORDER BY MO.CD_ORDEM, M2.CD_ORDEM ASC');

      $dados = array();

      foreach ($query->result_array() as $value) {
        if (!array_key_exists($value[self::ID], $dados)) {

          $dados[$value[self::ID]] = array(
              model_modulo::NOME => $value['DECS_MOD'],
              model_modulo::ICON => $value['ICON_MOD'],
              model_modulo::URL => $value['URL_MOD'],
              model_modulo::ORDEM => $value['ORDEM_MOD'],
              model_acesso::PRIVILEGIO => $value['PRIVILEGIO_MOD'],
          );
          if (!empty($value['DESC_MENU'])) {
            $dados[$value[self::ID]]['PARENTS'][] = array(
                model_modulo::NOME => $value['DESC_MENU'],
                model_modulo::ICON => $value['ICON_MENU'],
                model_modulo::URL => $value['URL_MENU'],
                model_modulo::ORDEM => $value['ORDEM_MENU'],
                model_modulo::PRIVILEGIO => $value['PRIVILEGIO_MENU'],
            );
          }
        } else {
          $dados[$value[self::ID]]['PARENTS'][] = array(
              model_modulo::NOME => $value['DESC_MENU'],
              model_modulo::ICON => $value['ICON_MENU'],
              model_modulo::URL => $value['URL_MENU'],
              model_modulo::ORDEM => $value['ORDEM_MENU'],
              model_modulo::PRIVILEGIO => $value['PRIVILEGIO_MENU'],
          );
        }
      }
      // echo '<xmp>', print_r($dados), exit;

      if ($query->num_rows > 0) {
        return $dados;
      } else {
        throw new Exception('show_stack_bar_top("error", "Erro", "Não há registros para o menu.")');
      }
    } catch (Exception $exc) {
      return $exc->getMessage();
    }
  }

  public function getAcessoMenu($ID) {
    try {

      $this->db->select('AC.' . self::ID . ', MO.' . model_modulo::NOME . ', MO.' . model_modulo::ICON . ', MO.' . model_modulo::URL . ', AC.' . self::PRIVILEGIO);
      $this->db->join(model_modulo::TABELA . ' MO', 'MO.' . model_modulo::ID . ' = AC.' . self::MODULO);
      $this->db->where('AC.' . self::USUARIOACESSO, $ID);
      $this->db->order_by('AC.' . self::ID, "ASC");
      $query = $this->db->get(self::TABELA . ' AC');

      if ($query->num_rows > 0) {
        return $query->result_array();
      } else {
        throw new Exception('show_stack_bar_top("error", "Erro", "Não há registros para o menu.")');
      }
    } catch (Exception $exc) {
      return $exc->getMessage();
    }
  }

  public function getAcessoFuncionario($ID) {

    $this->db->join(model_usuario::TABELA . ' US', 'US.' . model_usuario::ID . ' = AC.' . self::USUARIOACESSO);
    $this->db->join(model_funcionario::TABELA . ' FU', 'FU.' . model_funcionario::ID . ' = US.' . model_usuario::FUNC);
    $this->db->where('AC.' . self::ID, $ID);
    $this->db->order_by('AC.' . self::ID, "ASC");
    $query = $this->db->get(self::TABELA . ' AC');
    if (!empty($query)) {
      return $query->result_array();
    } else {
      throw new Exception('show_stack_bar_top("error", "Erro", "Não há registros.")');
    }
  }

  public function __destruct() {
    
  }

}
