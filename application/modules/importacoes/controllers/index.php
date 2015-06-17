<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class index extends MY_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function __destruct() {
    
  }

  public function index() {

    $this->data['breadcrumb'] = $this->breadcrumb(array('importacoes', 'index'), array('Importações', 'Home'));
    $this->MY_view('importacoes/index', $this->data);
  }

}
