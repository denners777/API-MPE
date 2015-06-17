<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class consulta extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->Model('model_listagem_geral');
  }

  public function index() {

    try {

      if ($this->POST) {

        $dest1 = $dest2 = $dest3 = $dest4 = $dest5 = $dest6 = $dest7 = '';

        if ($this->POST['fila'] != 'ALL') {
          $dest1 = 'danger';
        }
        if ($this->POST['responsavel'] != 'ALL') {
          $dest2 = 'danger';
        }
        if ($this->POST['datade'] != 'ALL') {
          $dest3 = 'danger';
        }
        if ($this->POST['dataate'] != 'ALL') {
          $dest4 = 'danger';
        }
        if (isset($this->POST['proprietario'])) {

          if ($this->POST['proprietario'] != '') {
            $dest5 = 'danger';
          }
          $proprietario = implode(' - ', $this->POST['proprietario']);
          $proprietarios = $this->POST['proprietario'];
        } else {
          $proprietario = $proprietarios = 'ALL';
        }
        if ($this->POST['status'] != 'ALL') {
          $dest6 = 'danger';
        }
        if ($this->POST['departamento'] != 'ALL') {
          $dest7 = 'danger';
        }

        $this->data['resultado'] = 'Fila: <span class="text-' . $dest1 . '">' . $this->POST['fila'] . '</span>
                                  | Responsável: <span class="text-' . $dest3 . '">' . $this->POST['responsavel'] . '</span> 
                                  | Departamento: <span class="text-' . $dest7 . '">' . $this->POST['departamento'] . '</span>
                                  | Proprietário: <span class="text-' . $dest5 . '">' . $proprietario . '</span> 
                                  | Status: <span class="text-' . $dest6 . '">' . $this->POST['status'] . '</span>';

        $this->data['lista'] = $this->model_listagem_geral->getLista($this->POST['fila'], $this->POST['status'], $this->POST['responsavel'], $this->POST['datade'], $this->POST['dataate'], $proprietarios, $this->POST['tipo'], $this->POST['departamento']);

        if ($this->data['lista'] == 'fechado') {
          $this->valida();
          $this->data['resultado'] .= '| Período entre: <span class="text-' . $dest3 . '">' . $this->POST['datade'] . '</span> a <span class="text-' . $dest4 . '">' . $this->POST['dataate'] . '</span>';
        }
      }

      $this->data['status'] = $this->model_listagem_geral->listStatus();
      $this->data['fila'] = $this->model_listagem_geral->listFila();
      $this->data['responsavel'] = $this->model_listagem_geral->listResponsavel();
      $this->data['proprietario'] = $this->model_listagem_geral->listProprietario();
      $this->data['departamento'] = $this->model_listagem_geral->listDepartamento();
      $this->data['excel'] = json_encode($this->POST);

      $this->data['breadcrumb'] = $this->breadcrumb(array('atendimento', 'index'), array('Atendimento', 'Home'));

      $this->MY_view('atendimento/consulta', $this->data);
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "' . $exc->getMessage() . '")');
      redirect('atendimento/consulta');
    }
  }

  public function getStatus() {
    if ($this->is_ajax()) {
      $tipo = $this->model_listagem_geral->listStatus($this->POST['fila'], $this->POST['responsavel'], $this->POST['datade'], $this->POST['dataate'], $this->POST['grafico']);

      header('Content-Type: application/json');
      echo json_encode($tipo, 3);
    }
  }

  public function getResponsavel() {
    if ($this->is_ajax()) {
      $tipo = $this->model_listagem_geral->listResponsavel($this->POST['fila']);

      header('Content-Type: application/json');
      echo json_encode($tipo, 3);
    }
  }

  public function valida() {

    if (empty($this->POST['datade'])) {
      throw new Exception('Campo <b>Data de</b> não pode ficar vazio.');
    }

    if (empty($this->POST['dataate'])) {
      throw new Exception('Campo <b>Data até</b> não pode ficar vazio.');
    }

    if ($this->POST['datade'] > $this->POST['dataate']) {
      throw new Exception('Intervalo de data não válido.');
    }
  }

  public function exportaExcel($list = NULL, $download = TRUE) {

    if (is_null($list)) {
      $dados = json_decode($this->POST['dados']);
    } else {
      $dados = json_decode($list);
    }

    if (isset($dados->proprietario)) {
      $proprietarios = $dados->proprietario;
    } else {
      $proprietarios = 'ALL';
    }
    if (!is_numeric($dados)) {
      $dados = $this->model_listagem_geral->getLista($dados->fila, $dados->status, $dados->responsavel, $dados->datade, $dados->dataate, $proprietarios, $dados->tipo, $dados->departamento);
    } else {
      $dados = $this->model_listagem_geral->get($dados);
    }
    $this->load->helper('functions');
    return writeXLS($dados, $download);
  }

  public function enviarEmail() {
    try {
      if ($this->POST) {

        $attachment = $this->exportaExcel($this->POST['emaildados'], FALSE);
        $this->load->helper('functions');

        $emailto = $this->POST['emailto'];
        $nome = explode('@', $emailto)[0];
        $titulo = 'Intranet Grupo MPE - Atendimento';
        $assunto = 'Intranet Grupo MPE - Atendimento';
        $emailfrom = $this->POST['emailfrom'];
        $emailcopy = explode(';', $this->POST['emailcopy']);
        array_push($emailcopy, $emailfrom);
        $emailoculto = explode(';', $this->POST['emailoculto']);
        $emailmsg = $this->POST['emailmsg'];

        enviaEmail(array(
            'email' => $emailto,
            'nome' => $nome,
            'titulo' => $titulo,
            'assunto' => $assunto,
            'mensagem' => $emailmsg,
            'reply' => $emailfrom,
            'cc' => $emailcopy,
            'co' => $emailoculto,
            'attachment' => $attachment,
        ));
      } else {
        throw new Exception('Acesso Negado.');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', 'show_stack_bar_top("error", "Erro", "' . $exc->getMessage() . '")');
    }
    redirect('atendimento/consulta');
  }

}
