<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_otrs
 *
 * @author denner.fernandes
 */
class model_otrs extends MY_Model {

  private $OTRS;

  public function __construct() {
    parent::__construct();
    $this->OTRS = $this->load->database('otrs', TRUE);
  }

  public function __destruct() {
    
  }
  
  public function listFila() {
    
    $query = $this->OTRS->query('SELECT id, name FROM queue
                                 WHERE name NOT LIKE "%::%"
                                 AND group_id IN (9,15,19) 
                                 AND id <> 21');
    if ($query->num_rows > 0) {
      return $query->result_array();
    } else {
      throw new Exception('Não há registros.');
    }
  }
  
  public function listResponsavel() {
    
    $query = $this->OTRS->query('SELECT id, first_name, last_name FROM users
                                 WHERE id IN (
                                    SELECT DISTINCT ticket.responsible_user_id 
                                    FROM ticket 
                                    WHERE valid_id = 1)');
    if ($query->num_rows > 0) {
      return $query->result_array();
    } else {
      throw new Exception('Não há registros.');
    }
  }

}
