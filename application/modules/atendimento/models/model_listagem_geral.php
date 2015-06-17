<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_listagem_geral
 *
 * @author denner.fernandes
 */
class model_listagem_geral extends MY_Model {

  const TABELA = 'Listagem_Geral';
  const TABELA2 = 'Listagem_Geral_Encerrados';
  const ID = 'Id';
  const CHAMADO = 'Chamado';
  const ASSUNTO = 'Assunto';
  const FILA = 'Fila';
  const SERVICO = 'Servico';
  const ABERTURA = 'Data_Abertura';
  const FECHAMENTO = 'Data_Fechamento';
  const STATUS = 'Status';
  const TOTVS = 'Chamado_TOTVS';
  const PRIORIDADE = 'Prioridade';
  const DIAS_ABERTO = 'Dias_Aberto';
  const PERIODO_DIAS = 'Periodo_Dias_Aberto';
  const CLIENTE = 'Cliente';
  const DEPTO = 'Depto_Cliente';
  const PROPRIETARIO = 'Proprietario';
  const RESPONSAVEL = 'Responsavel';

  private $OTRS;

  public function __construct() {
    parent::__construct();
    $this->OTRS = $this->load->database('otrs', TRUE);
  }

  public function __destruct() {
    
  }

  public function getLista($fila = 'ALL', $status = 'ALL', $responsavel = 'ALL', $datade = '', $dataate = '', $proprietario = 'ALL', $tipo = 'aberto', $departamento = 'ALL') {

    if ($fila != 'ALL') {
      $fila = ' AND ' . self::FILA . ' LIKE "' . $fila . '%" ';
    } else {
      $fila = '';
    }

    if ($status != 'ALL') {
      $status = ' AND ' . self::STATUS . ' LIKE "%' . $status . '%" ';
    } else {
      $status = '';
    }

    if ($responsavel != 'ALL') {
      $responsavel = ' AND ' . self::RESPONSAVEL . ' LIKE "%' . $responsavel . '%" ';
    } else {
      $responsavel = '';
    }

    if (!empty($datade) && !empty($dataate)) {
      $datade = $datade . '-01';
      $dataate = $dataate . '-31';
      $intervalo = ' AND Data_Fechamento BETWEEN "' . $datade . '" AND "' . $dataate . '"';
    } else {
      $intervalo = '';
    }

    if ($proprietario != 'ALL') {
      $proprietario = ' AND Proprietario IN ("' . implode('", "', $proprietario) . '") ';
    } else {
      $proprietario = '';
    }

    if ($departamento != 'ALL') {
      $departamento = ' AND ' . self::DEPTO . ' LIKE "%' . $departamento . '%" ';
    } else {
      $departamento = '';
    }

    if ($tipo == 'aberto') {
      $tipo = self::TABELA;
    } else {
      $tipo = self::TABELA2;
    }

    /* $query = $this->OTRS->query('SELECT * FROM ' . $tipo . ' 
      WHERE Id_Fila IN(
      SELECT QU.id
      FROM personal_queues PQ
      INNER JOIN users US
      ON US.id = PQ.user_id
      INNER JOIN queue QU
      ON QU.id = PQ.queue_id
      WHERE US.login = \'' . explode('@', $this->data['funcionario'][model_funcionario::EMAIL])[0] . '\') ' . $fila . $status . $responsavel . $intervalo . $proprietario); */

    $query = $this->OTRS->query('SELECT * FROM ' . $tipo . ' 
                                 WHERE 1 = 1 ' . $fila . $status . $responsavel . $intervalo . $proprietario . $departamento);

    if ($query->num_rows > 0) {
      return $query->result_array();
    } else {
      throw new Exception('Não há chamados.');
    }
  }

  public function listFila() {

    /* $query = $this->OTRS->query('SELECT DISTINCT ' . self::FILA . ' FROM ' . self::TABELA . '
      WHERE Id_Fila IN(
      SELECT QU.id
      FROM personal_queues PQ
      INNER JOIN users US
      ON US.id = PQ.user_id
      INNER JOIN queue QU
      ON QU.id = PQ.queue_id
      WHERE US.login = \'' . explode('@', $this->data['funcionario'][model_funcionario::EMAIL])[0] . '\')
      ORDER BY ' . self::FILA . ''); */

    $query = $this->OTRS->query('SELECT DISTINCT ' . self::FILA . ' FROM ' . self::TABELA . '
                                 ORDER BY ' . self::FILA . '');

    if ($query->num_rows > 0) {

      $fila = array();

      foreach ($query->result_array() as $value) {
        $fila[] = explode('::', $value['Fila'])[0];
      }
      $fila = array_unique($fila);

      return $fila;
    } else {
      throw new Exception('Não há chamados.');
    }
  }

  public function listResponsavel($fila = 'ALL', $datade = '', $dataate = '', $grafico = 'aberto') {

    if ($fila != 'ALL') {
      $fila = ' AND ' . self::FILA . ' LIKE "' . $fila . '%" ';
    } else {
      $fila = '';
    }

    if (!empty($datade) && !empty($dataate)) {
      $datade = $datade . '-01';
      $dataate = $dataate . '-31';
      $intervalo = ' AND Data_Fechamento BETWEEN "' . $datade . '" AND "' . $dataate . '" ';
    } else {
      $intervalo = '';
    }

    if ($grafico == 'aberto') {
      $grafico = self::TABELA;
    } else {
      $grafico = self::TABELA2;
    }

    $query = $this->OTRS->query('SELECT DISTINCT ' . self::RESPONSAVEL . ' FROM ' . $grafico . '
                                 WHERE Id_Fila IN(
                                    SELECT QU.id
                                    FROM personal_queues PQ
                                    INNER JOIN users US
                                     ON US.id = PQ.user_id
                                    INNER JOIN queue QU
                                     ON QU.id = PQ.queue_id
                                    WHERE US.login = \'' . explode('@', $this->data['funcionario'][model_funcionario::EMAIL])[0] . '\') ' . $fila . $intervalo . '
                                 ORDER BY ' . self::RESPONSAVEL);

    if ($query->num_rows > 0) {
      return $query->result_array();
    } else {
      throw new Exception('Não há chamados.');
    }
  }

  public function listStatus($fila = 'ALL', $responsavel = 'ALL', $datade = NULL, $dataate = NULL, $grafico = 'aberto') {

    if ($fila != 'ALL') {
      $fila = ' AND ' . self::FILA . ' LIKE "' . $fila . '%" ';
    } else {
      $fila = '';
    }

    if ($responsavel != 'ALL') {
      $responsavel = ' AND ' . self::RESPONSAVEL . ' LIKE "%' . $responsavel . '%" ';
    } else {
      $responsavel = '';
    }

    if (!empty($datade) && !empty($dataate)) {
      $datade = $datade . '-01';
      $dataate = $dataate . '-31';
      $intervalo = ' AND Data_Fechamento BETWEEN "' . $datade . '" AND "' . $dataate . '" ';
    } else {
      $intervalo = '';
    }

    if ($grafico == 'aberto') {
      $grafico = self::TABELA;
    } else {
      $grafico = self::TABELA2;
    }

    $query = $this->OTRS->query('SELECT DISTINCT ' . self::STATUS . ' FROM ' . $grafico . '
                                 WHERE Id_Fila IN(
                                    SELECT QU.id
                                    FROM personal_queues PQ
                                    INNER JOIN users US
                                     ON US.id = PQ.user_id
                                    INNER JOIN queue QU
                                     ON QU.id = PQ.queue_id
                                    WHERE US.login = \'' . explode('@', $this->data['funcionario'][model_funcionario::EMAIL])[0] . '\') ' . $fila . $responsavel . $intervalo . '
                                 ORDER BY ' . self::STATUS . '');

    if ($query->num_rows > 0) {
      return $query->result_array();
    } else {
      throw new Exception('Não há chamados.');
    }
  }

  public function listProprietario($fila = 'ALL', $responsavel = 'ALL', $datade = NULL, $dataate = NULL, $grafico = 'aberto') {

    if ($fila != 'ALL') {
      $fila = ' AND ' . self::FILA . ' LIKE "' . $fila . '%" ';
    } else {
      $fila = '';
    }

    if ($responsavel != 'ALL') {
      $responsavel = ' AND ' . self::RESPONSAVEL . ' LIKE "%' . $responsavel . '%" ';
    } else {
      $responsavel = '';
    }

    if (!empty($datade) && !empty($dataate)) {
      $datade = $datade . '-01';
      $dataate = $dataate . '-31';
      $intervalo = ' AND Data_Fechamento BETWEEN "' . $datade . '" AND "' . $dataate . '" ';
    } else {
      $intervalo = '';
    }

    if ($grafico == 'aberto') {
      $grafico = self::TABELA;
    } else {
      $grafico = self::TABELA2;
    }

    $query = $this->OTRS->query('SELECT DISTINCT ' . self::PROPRIETARIO . ' FROM ' . $grafico . '
                                 WHERE Id_Fila IN(
                                    SELECT QU.id
                                    FROM personal_queues PQ
                                    INNER JOIN users US
                                     ON US.id = PQ.user_id
                                    INNER JOIN queue QU
                                     ON QU.id = PQ.queue_id
                                    WHERE US.login = \'' . explode('@', $this->data['funcionario'][model_funcionario::EMAIL])[0] . '\') ' . $fila . $responsavel . $intervalo . '
                                 ORDER BY ' . self::PROPRIETARIO . '');

    if ($query->num_rows > 0) {
      return $query->result_array();
    } else {
      throw new Exception('Não há chamados.');
    }
  }

  public function listDepartamento() {

    $query = $this->OTRS->query('SELECT DISTINCT ' . self::DEPTO . ' FROM ' . self::TABELA . ' ORDER BY ' . self::DEPTO);
    if ($query->num_rows > 0) {
      return $query->result_array();
    } else {
      throw new Exception('Não há chamados.');
    }
  }
  
  public function get($ID) {

    try {

      $this->OTRS->where(self::ID, $ID);
      $this->OTRS->order_by(self::ID, "ASC");
      $query = $this->OTRS->get(self::TABELA);
      if (!empty($query)) {
        return $query->result_array();
      } else {
        throw new Exception('show_stack_bar_top("error", "Erro", "Não há registros.")');
      }
    } catch (Exception $exc) {
      return $exc->getMessage();
    }
  }

}
