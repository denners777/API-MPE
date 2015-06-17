<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class MY_Controller extends CI_Controller {

  const session_usu = 'Token';

  public $data = array();
  protected $POST = NULL;
  protected $user_info = array();
  protected $gravatar = '';

  public function __construct() {
    parent::__construct();

    $this->load->model('nucleo/model_funcionario');

    $this->data['URI'] = $this->uri->segment_array();

    if (@$this->data['URI'][2] != 'login') {
      $this->setUserInfo();
      $this->permissionUser();
    }

    $this->data['MSG'] = $this->session->flashdata('MSG');

    $this->POST = $this->input->post(NULL, TRUE);
    
    if (is_array($this->POST)) {
      foreach ($this->POST as $key => $value) {
        if (!is_array($value)) {
          $this->POST[$key] = trim($value);
        } else {
          $this->POST[$key] = $value;
        }
      }
    }
    if (isset($this->data['user'])) {
      $this->menuPrincipal();
    }
  }

  public function is_ajax() {
    return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest');
  }

  public function MY_view($view, $data, $moduloHeader = NULL, $moduloFooter = NULL, $header = NULL, $footer = NULL) {
    if (is_null($header)) {
      $this->load->view('header', $data);
    } else {
      $this->load->view($header, $data);
    }

    if (!is_null($moduloHeader)) {
      $this->load->view($moduloHeader, $data);
    }

    $this->load->view($view, $data);

    if (is_null($footer)) {
      $this->load->view('footer', $data);
    } else {
      $this->load->view($footer, $data);
    }

    $this->load->view('alerts');

    if (!is_null($moduloFooter)) {
      $this->load->view($moduloFooter, $data);
    }
  }

  private function setUserInfo() {

    try {
      $token = $this->session->userdata(self::session_usu);
      if ($token) {
        $this->user_info = $this->model_usuario->get($token);
        if (!empty($this->user_info)) {
          $this->user_info = $this->user_info[0];
          $this->data['user'] = $this->user_info;
          $this->data['funcionario'] = $this->model_funcionario->get(
                          array(
                              model_funcionario::ID => $this->data['user'][model_usuario::ID]
                          )
                  )[0];
          $this->gravatar = new \emberlabs\gravatarlib\Gravatar();
          $this->gravatar->setAvatarSize(54);
          $this->data['icon_user'] = $this->gravatar->buildGravatarURL($this->data['funcionario'][model_funcionario::EMAIL]);

          $ip = "";
          // SE EXISTIR PEGA O IP DA REDE, SE não PEGA O IP REMOTO
          $ip = (@$_SERVER["HTTP_X_FORWARDED_FOR"] != '') ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER['REMOTE_ADDR'];
          // MANDA UM PACOTE DE INFORMACAO
          @$ping = shell_exec("ping -c1 " . $ip . "");
          // ELE PROCURA SE NA LISTA DO ARP TEM ESSE IP E CAPTURA TODAS AS INFORMACOES
          @$output = shell_exec("arp -n " . $ip . "");
          // SEPARA A STRING DE SAIDA POR ESPACO EM BRANCO
          @$mac = preg_split("/\s+/", $output);

          @log_message('info', 'Dados do Usuário: ' . $this->data['funcionario'][model_funcionario::NOME] . ' - ' . $this->data['funcionario'][model_funcionario::CHAPA] . ' IP: ' . $_SERVER['REMOTE_ADDR'] . ' MAC: ' . implode('-', $mac));
        } else {
          throw new Exception('Sem informações do usuário. ');
        }
      } else {
        throw new Exception('Usuario não autorizado.');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", ' . $exc->getMessage() . ')');
      redirect('nucleo/login/');
    }
  }

  private function permissionUser() {
    try {
      $this->load->model('nucleo/model_acesso');
      $this->load->model('nucleo/model_modulo');

      $modulo = $this->model_acesso->getAcessoMenu($this->data['user'][model_usuario::ID]);
      $restringe = TRUE;
      foreach ($modulo as $key => $value) {
        if (!empty($this->uri->segment_array())) {
          if ($this->uri->segment_array()[1] == str_replace('/', '', $value[model_modulo::URL])) {
            $restringe = FALSE;
          }
        } else {
          $restringe = FALSE;
        }
        if (!empty($this->uri->segment_array()[2])) {
          if ($this->uri->segment_array()[2] != 'login') {
            if ($this->uri->segment_array()[1] == str_replace('/', '', $value[model_modulo::URL])) {
              $restringe = FALSE;
            }
          }
        }
        $this->data['privilegios'][$value[model_modulo::NOME]] = $value[model_acesso::PRIVILEGIO];
      }
      if ($restringe) {
        throw new Exception('Acesso ilegal a esse módulo.');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", ' . $exc->getMessage() . ')');
      redirect('nucleo/login/');
    }
  }

  protected function breadcrumb($migalhas = 'home', $nome = 'Home', $base = null) {
    $retorno = '<ol class="breadcrumb">';
    $mig = '';
    if (is_array($migalhas)) {
      for ($i = 0; $i < count($migalhas) - 1; $i++) {
        if (!is_null($base) && $i == 0) {
          $retorno .= '<li class="active">' . $base . '</li>';
        }
        $retorno .= '<li><a href="' . base_url() . $mig . $migalhas[$i] . '">' . $nome[$i] . '</a></li>';
        $mig .= $migalhas[$i] . '/';
      }

      $retorno .= '<li class="active">' . $nome[count($nome) - 1] . '</li></ol>';
    } else {
      $retorno .= '<li class="active">' . $nome . '</li></ol>';
    }
    return $retorno;
  }

  private function menuPrincipal() {
    try {
      $this->load->model('nucleo/model_acesso');
      $this->load->model('nucleo/model_modulo');
      $this->data['menu_principal'] = $this->model_acesso->getMenu($this->data['user'][model_usuario::ID]);
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "' . $exc->getMessage() . '")');
    }
  }

  function __destruct() {
    
  }

}
