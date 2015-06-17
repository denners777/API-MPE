<?php

/**
 * Description of ldap
 *
 * @author denner.fernandes
 */
class ldap extends MY_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $server = '172.16.10.174:389'; //IP ou nome do servidor
    $dominio = ''; //Dominio Ex: @gmail.com
    $user = 'seu_usuario' . $dominio;
    $pass = 'sua_senha';

    if ($this->valida_ldap($server, $user, $pass)) {
      echo "usuário autenticado<br>";
    } else {
      echo "usuário ou senha inválida";
    }
  }

  private function valida_ldap($srv, $usr, $pwd) {
    $ldap_server = $srv;
    $auth_user = $usr;
    $auth_pass = $pwd;

// Tenta se conectar com o servidor 
    if (!($connect = @ldap_connect($ldap_server))) {
      return FALSE;
    }

// Tenta autenticar no servidor 
    if (!($bind = @ldap_bind($connect, $auth_user, $auth_pass))) {
// se não validar retorna false 
      return FALSE;
    } else {
// se validar retorna true 
      return TRUE;
    }
  }

}
