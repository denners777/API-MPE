<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_modulo
 *
 * @author denner.fernandes
 */
class model_modulo extends MY_Model {

  const TABELA = 'MODULO';
  const ID = 'ID_MODULO';
  const NOME = 'DS_DESCRICAO';
  const ICON = 'DS_ICON';
  const URL = 'DS_URL';
  const ORDEM = 'CD_ORDEM';
  const PAI = 'CD_PARENT';
  const PRIVILEGIO = 'CD_PRIVILEGIO';
  const USUARIO = 'CD_USUARIO';
  const CRIADO = 'DT_CRIADO';
  const MODIFICADO = 'DT_MODIFICADO';

  public function __construct() {
    parent::__construct();
  }

  public function __destruct() {
    
  }

  public function getAllMP() {

    /*
     * Se atualizar
     * CodeIgniter 2.1.x
     * 
     *  This library doesn't work with CodeIgniter 2.1.x out of the box. It requires modifications to a file in /system to make it work.
     * 
     *  You need to edit /system/database/DB_active_rec.php and modify the signature of _compile_select 
     * (should be line 1673). In the older version(s) of CodeIgniter, this function was not protected, 
     * so if you remove the protected keyword from the function, my library will work.
     * 
     *  (There's probably a reason this function is protected.)
     * 
     *  In the develop version of CodeIgniter (which works with this library just fine, by the way), 
     * there is a public function that you can use. You can "steal" the get_compiled_select function from the 
     * /system/database/DB_query_builder.php file (line 1283).
     *
     */

    try {

      $return = NULL;

      $this->load->library('subquery');

      $this->db->select('MO.*, MO.' . self::NOME . ' NOMEMODULO, PR.' . model_privilegio::DESCRICAO);
      $sub = $this->subquery->start_subquery('select');
      $sub->select('MO2.' . self::NOME)->from(self::TABELA . ' MO2')->where('MO.' . self::PAI . ' = MO2.' . self::ID);
      $this->subquery->end_subquery('NOMEPAI');
      $this->db->join(model_privilegio::TABELA . ' PR', 'PR.' . model_privilegio::ID . ' = MO.' . self::PRIVILEGIO, 'LEFT');
      $this->db->order_by(self::ID, "ASC");
      $query = $this->db->get(self::TABELA . ' MO');

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
