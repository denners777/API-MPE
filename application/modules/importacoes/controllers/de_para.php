<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of de_para
 *
 * @author denner.fernandes
 */
class de_para extends MY_Controller {

  public function __construct() {
    parent::__construct();

    $this->load->Model('model_de_para');
    $this->load->Model('model_tipo_de_para');
  }

  public function __destruct() {
    
  }

  public function index() {

    if ($this->POST) {
      $this->db->join(model_tipo_de_para::TABELA, model_tipo_de_para::ID . ' = ' . model_de_para::TIPO);

      if ($this->POST[model_de_para::TIPO] == 'ALL') {
        $this->data['de_para'] = $this->model_de_para->getAll();
      } else {
        $this->data['de_para'] = $this->model_de_para->get(
                array(
                    model_de_para::TIPO => $this->POST[model_de_para::TIPO]
                )
        );
      }
      $this->data['resultado'] = $this->POST[model_de_para::TIPO];
    } else {
      $this->db->join(model_tipo_de_para::TABELA, model_tipo_de_para::ID . ' = ' . model_de_para::TIPO);
      $this->data['de_para'] = $this->model_de_para->get(
              array(
                  model_de_para::TIPO => 1
              )
      );
      $this->data['resultado'] = 1;
    }

    $this->data['tipo'] = $this->model_tipo_de_para->getAll();
    $this->data['breadcrumb'] = $this->breadcrumb(array('importacoes', 'de_para'), array('Importações', 'De/Para'));
    $this->MY_view('importacoes/de_para/listar', $this->data);
  }

  public function novo() {
    $this->data['tipo'] = $this->model_tipo_de_para->getAll();
    $this->data['breadcrumb'] = $this->breadcrumb(array('importacoes', 'de_para', 'novo'), array('Importações', 'De/Para', 'Novo'));
    $this->MY_view('importacoes/de_para/novo', $this->data);
  }

  public function cadastrar() {
    try {
      $this->validar();
      $campos = array(model_de_para::DE, model_de_para::VARIANTE, model_de_para::REF, model_de_para::DESCRICAO);
      $dados = elements($campos, $this->POST);
      $dados[model_de_para::ID] = $this->model_de_para->autoincrement();
      $codtipo = $this->model_tipo_de_para->get(array(model_tipo_de_para::TABELA_RM => $this->POST[model_de_para::TIPO]))[0][model_tipo_de_para::ID];

      $dados[model_de_para::TIPO] = $codtipo;
      $para = explode('|', $this->POST[model_de_para::PARA]);
      $dados[model_de_para::PARA] = $para[0];
      $dados[model_de_para::DESCRICAO] = $para[1];

      settype($dados[model_de_para::ID], 'integer');

      $acao = $this->model_de_para->save($dados);

      if ($acao) {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "De/Para cadastrado com sucesso.")');
      } else {
        throw new Exception('show_stack_bar_top("error", "Erro", "De/Para não cadastrado.")');
      }
      redirect('importacoes/de_para');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('importacoes/de_para/novo');
    }
  }

  private function validar() {
    if (empty($this->POST[model_de_para::TIPO])) {
      throw new Exception('show_stack_bar_top("error", "Campo vazio", "Campo <b>Tipo</b> não pode ficar vazio.");');
    }
    if (empty($this->POST[model_de_para::DE])) {
      throw new Exception('show_stack_bar_top("error", "Campo vazio", "Campo <b>DE</b> não pode ficar vazio.");');
    }
    if (empty($this->POST[model_de_para::PARA])) {
      throw new Exception('show_stack_bar_top("error", "Campo vazio", "Campo <b>PARA</b> não pode ficar vazio.");');
    }
  }

  public function editar($ID) {
    $this->db->join(model_tipo_de_para::TABELA, model_tipo_de_para::ID . ' = ' . model_de_para::TIPO);
    $this->data['de_para'] = $this->model_de_para->get(array(model_de_para::ID => $ID))[0];
    $this->data['tipo'] = $this->model_tipo_de_para->getAll();
    $campos = $this->model_tipo_de_para->get(array(model_tipo_de_para::TABELA_RM => $this->data['de_para'][model_tipo_de_para::TABELA_RM]));
    $this->data['combo_para'] = $this->model_tipo_de_para->getTipoImportacao($this->data['de_para'][model_tipo_de_para::TABELA_RM], $campos[0][model_tipo_de_para::CODIGO], $campos[0][model_tipo_de_para::NOME]);

    $this->data['breadcrumb'] = $this->breadcrumb(array('importacoes', 'de_para', 'editar'), array('Importações', 'De/Para', 'Editar'));

    $this->MY_view('importacoes/de_para/editar', $this->data);
  }

  public function atualizar() {
    try {
      $this->validar();

      $campos = array(model_de_para::DE, model_de_para::VARIANTE, model_de_para::REF, model_de_para::DESCRICAO);
      $dados = elements($campos, $this->POST);
      $codtipo = $this->model_tipo_de_para->get(array(model_tipo_de_para::TABELA_RM => $this->POST[model_de_para::TIPO]))[0][model_tipo_de_para::ID];

      $dados[model_de_para::TIPO] = $codtipo;
      $para = explode('|', $this->POST[model_de_para::PARA]);
      $dados[model_de_para::PARA] = $para[0];
      $dados[model_de_para::DESCRICAO] = $para[1];

      $acao = $this->model_de_para->save($dados, $this->POST[model_de_para::ID]);
      if ($acao) {
        $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "De/Para atualizado com sucesso.")');
      } else {
        throw new Exception('show_stack_bar_top("error", "Erro", "De/Para não atualizado.")');
      }
      redirect('importacoes/de_para');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('importacoes/de_para/editar/' . $this->POST[model_de_para::ID]);
    }
  }

  public function deletar() {
    try {
      if (isset($this->POST['id'])) {

        $ID = $this->POST['id'];
        $acao = $this->model_de_para->deletar($ID);

        if ($acao) {
          $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "De/Para deletado.")');
        } else {
          throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "De/Para não deletado.")');
        }
      } else {
        throw new Exception('MSG', 'show_stack_bar_top("error", "Erro", "De/Para inválido.")');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
    }
    redirect('importacoes/de_para');
  }

}
