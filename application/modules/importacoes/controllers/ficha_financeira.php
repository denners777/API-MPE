<?php

/**
 * Description of ficha_financeira
 *
 * @author denner.fernandes
 */
class ficha_financeira extends MY_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function __destruct() {
    
  }

  public function index() {
    
    $this->load->Model('nucleo/model_empresa');
    $this->data['empresas'] = $this->model_empresa->getAll();
    $this->data['breadcrumb'] = $this->breadcrumb(array('importacoes', 'ficha_financeira'), array('Importações', 'Ficha Financeira'));
    $this->MY_view('importacoes/ficha_financeira/form', $this->data);
    
  }

}
