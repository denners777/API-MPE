<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Dashboard extends MY_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {

    $this->data['breadcrumb'] = $this->breadcrumb(array('cnab'), array('Cnab'));
    $this->MY_view('cnab/dashboard', $this->data);
  }

}
