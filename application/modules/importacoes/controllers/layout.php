<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of layout
 *
 * @author denner.fernandes
 */
class layout extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->Model('model_layout');
    $this->load->Model('model_item');
    $this->load->Model('model_tipo_de_para');
  }

  public function __destruct() {
    
  }

  public function index() {

    $this->data['layout'] = $this->model_layout->getAll();
    $this->data['breadcrumb'] = $this->breadcrumb(array('importacoes', 'layout'), array('Importações', 'Layout'));
    $this->MY_view('importacoes/layout/listar', $this->data);
  }

  public function novo() {

    $this->data['item'] = $this->model_item->getAllNotUsed();
    $this->data['tipo_de_para'] = $this->model_tipo_de_para->getAll();
    $this->data['breadcrumb'] = $this->breadcrumb(array('importacoes', 'layout', 'novo'), array('Importações', 'Layout', 'Novo'));
    $this->MY_view('importacoes/layout/novo', $this->data);
  }

  public function cadastrar() {
    try {

      $this->validar();
      $this->db->trans_start();
      for ($i = 0; $i < count($this->POST[model_layout::POSICAO]); $i++) {

        $dados = array(
            model_layout::ITEM => $this->POST[model_layout::ITEM],
            model_layout::POSICAO => $this->POST[model_layout::POSICAO][$i],
            model_layout::DESCRICAO => trim(strtoupper($this->POST[model_layout::DESCRICAO][$i])),
            model_layout::TAMANHO => $this->POST[model_layout::TAMANHO][$i],
            model_layout::TIPO => $this->POST[model_layout::TIPO][$i]
        );

        $dados[model_layout::ID] = $this->model_layout->autoincrement();

        if ($this->POST[model_layout::DEPARA][$i] != '') {
          $dados[model_layout::DEPARA] = $this->POST[model_layout::DEPARA][$i];
          settype($dados[model_layout::DEPARA], 'integer');
        }
        settype($dados[model_layout::ID], 'integer');
        settype($dados[model_layout::POSICAO], 'integer');
        settype($dados[model_layout::ITEM], 'integer');
        settype($dados[model_layout::TAMANHO], 'integer');
        $acao = $this->model_layout->save($dados);

        if (!$acao) {
          throw new Exception('show_stack_bar_top("error", "Erro", "Layout não cadastrado.<xmp>' . print_r($dados) . '</xmp>")');
        }
      }
      $this->db->trans_complete();
      $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Layout Cadastrado.")');
      redirect('importacoes/layout');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('importacoes/layout/novo');
    }
  }

  private function validar() {
    if (empty($this->POST[model_layout::ITEM])) {
      throw new Exception('show_stack_bar_top("error", "Campo(s) vazio(s)", "O campo <b>Item</b> não pode ficar vazio.");');
    }
    if (empty($this->POST[model_layout::POSICAO])) {
      throw new Exception('show_stack_bar_top("error", "Campo(s) vazio(s)", "O(s) campo(s) <b>Posição</b> não pode(m) ficar vazio(s).");');
    }
    if (empty($this->POST[model_layout::DESCRICAO])) {
      throw new Exception('show_stack_bar_top("error", "Campo(s) vazio(s)", "O(s) campo(s) de <b>Descrição</b> não pode(m) ficar vazio(s).");');
    }
    if (empty($this->POST[model_layout::TAMANHO])) {
      throw new Exception('show_stack_bar_top("error", "Campo(s) vazio(s)", "O(s) campo(s) de <b>Tamanho</b> não pode(m) ficar vazio(s).");');
    }
    if (empty($this->POST[model_layout::TIPO])) {
      throw new Exception('show_stack_bar_top("error", "Campo(s) vazio(s)", "O(s) campo(s) de <b>Tipo</b> não pode(m) ficar vazio(s).");');
    }
  }

  public function editar($ID) {

    $this->data['item'] = $this->model_item->get($ID)[0];
    $this->data['tipo_de_para'] = $this->model_tipo_de_para->getAll();
    $this->data['layout'] = $this->model_layout->get(array(model_layout::ITEM => $ID));
    $this->data['breadcrumb'] = $this->breadcrumb(array('importacoes', 'layout', 'editar'), array('Importações', 'Layout', 'Editar'));

    $this->MY_view('importacoes/layout/editar', $this->data);
  }

  public function atualizar() {
    try {

      $this->validar();
      $this->db->trans_start();

      $deletar = $this->model_layout->deletarByItem($this->POST[model_layout::ITEM]);

      if (!$deletar) {
        throw new Exception('show_stack_bar_top("error", "Erro ao Atualizar", "Não foi posivel deletar registros.")');
      }

      for ($i = 0; $i < count($this->POST[model_layout::POSICAO]); $i++) {

        $dados = array(
            model_layout::ITEM => $this->POST[model_layout::ITEM],
            model_layout::POSICAO => $this->POST[model_layout::POSICAO][$i],
            model_layout::DESCRICAO => trim(strtoupper($this->POST[model_layout::DESCRICAO][$i])),
            model_layout::TAMANHO => $this->POST[model_layout::TAMANHO][$i],
            model_layout::TIPO => $this->POST[model_layout::TIPO][$i],
        );

        $dados[model_layout::ID] = $this->model_layout->autoincrement();

        if ($this->POST[model_layout::DEPARA][$i] != '') {
          $dados[model_layout::DEPARA] = $this->POST[model_layout::DEPARA][$i];
          settype($dados[model_layout::DEPARA], 'integer');
        }

        settype($dados[model_layout::ID], 'integer');
        settype($dados[model_layout::POSICAO], 'integer');
        settype($dados[model_layout::ITEM], 'integer');
        settype($dados[model_layout::TAMANHO], 'integer');

        $acao = $this->model_layout->save($dados);

        if (!$acao) {
          throw new Exception('show_stack_bar_top("error", "Erro", "Layout não Atualizado.<xmp>' . print_r($dados) . '</xmp>")');
        }
      }
      $this->db->trans_complete();

      $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Layout Atualizado.")');
      redirect('importacoes/layout');
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
      redirect('importacoes/layout/editar/' . $this->POST[model_item::ID]);
    }
  }

  public function deletar() {
    try {
      if (isset($this->POST['id'])) {

        $ID = $this->POST['id'];
        $acao = $this->model_layout->deletarByItem($ID);

        if ($acao) {
          $this->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "Layout deletado.")');
        } else {
          throw new Exception('show_stack_bar_top("error", "Erro", "Layout não deletado.")');
        }
      } else {
        throw new Exception('show_stack_bar_top("error", "Erro", "Layout inválido.")');
      }
    } catch (Exception $exc) {
      $this->session->set_flashdata('MSG', $exc->getMessage());
    }
    redirect('importacoes/layout');
  }

}
