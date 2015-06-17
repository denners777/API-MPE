<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_relatorio
 *
 * @author denner.fernandes
 */
class Model_Relatorio extends MY_Model {

  public function __construct() {
    parent::__construct();
  }

  public function getArquivos($dados) {

    $this->load->Model('Model_Folha');
    $this->load->Model('Model_Processo');
    $this->load->Model('Model_Log');

    $empresa = $operacao = $banco = $competencia = '';

    if (!empty($dados[Model_Empresa::ID])) {
      $empresa = ' AND EM.' . Model_Empresa::ID . ' = ' . $dados [Model_Empresa::ID];
    }
    if (!empty($dados[Model_Tipo_Operacao::ID])) {
      $operacao = ' AND OP.' . Model_Tipo_Operacao::ID . ' = ' . $dados [Model_Tipo_Operacao::ID];
    }
    if (!empty($dados[Model_Banco::ID])) {
      $banco = ' AND BA.' . Model_Banco::ID . ' = ' . $dados [Model_Banco::ID];
    }
    if (!empty($dados['competencia'])) {
      $aux = explode('-', $dados['competencia']);
      $competencia = ' AND FO.' . Model_Folha::MES . ' = ' . $aux [1] . ' AND FO.' . Model_Folha::ANO . ' = ' . $aux [0];
    }

    $query = $this->db->query('SELECT FO.' . Model_Folha::ID . ' FOLHA, 
                                      PR.' . Model_Processo::ID . ' PROCESSO, 
                                      EM.' . Model_Empresa::NOME . ' EMPRESA, 
                                      OP.' . Model_Tipo_Operacao::NOME . ' OPERACAO, 
                                      BA.' . Model_Banco::NOME . ' BANCO, 
                                      FO.' . Model_Folha::ANO . ' || \'/\' || LPAD(FO.' . Model_Folha::MES . ', 2, \'0\') COMPETENCIA, 
                                      AR.' . Model_Log::VALOR . ' VALOR 
                               FROM ' . Model_Folha::TABELA . ' FO
                               INNER JOIN ' . Model_Processo::TABELA . ' PR 
                                  ON PR.' . Model_Processo::FOLHA . ' = FO.' . Model_Folha::ID . '
                               INNER JOIN ' . Model_Empresa::TABELA . ' EM 
                                  ON EM.' . Model_Empresa::ID . ' = FO.' . Model_Folha::EMPRESA . '
                               INNER JOIN ' . Model_Tipo_Operacao::TABELA . ' OP 
                                  ON OP.' . Model_Tipo_Operacao::ID . ' = PR.' . Model_Processo::OPERACAO . '
                               INNER JOIN ' . Model_Log::TABELA . ' AR 
                                  ON AR.' . Model_Log::PROCESSO . ' = PR.' . Model_Processo::ID . '
                               LEFT JOIN ' . Model_Banco::TABELA . ' BA 
                                  ON BA.' . Model_Banco::ID . ' = AR.' . Model_Log::BANCO . '
                               WHERE 1 = 1
                               ' . $empresa . $operacao . $banco . $competencia . '
                               ORDER BY 1, 2, 6');

    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return 'Não há registros.';
    }
  }

  public function getConsulta() {

    $this->load->Model('Model_Folha');
    $this->load->Model('Model_Processo');
    $this->load->Model('Model_Log');

    $query = $this->db->query('SELECT FO.' . Model_Folha::ID . ' FOLHA, 
                                      PR.' . Model_Processo::ID . ' PROCESSO, 
                                      EM.' . Model_Empresa::NOME . ' EMPRESA,
                                      OP.' . Model_Tipo_Operacao::NOME . ' OPERACAO, 
                                      FO.' . Model_Folha::ANO . ' || \'/\' || LPAD(FO.' . Model_Folha::MES . ', 2, \'0\') COMPETENCIA, 
                                      PR.' . Model_Processo::VALOR . ' VALOR 
                               FROM ' . Model_Folha::TABELA . ' FO
                               INNER JOIN ' . Model_Processo::TABELA . ' PR 
                                  ON PR.' . Model_Processo::FOLHA . ' = FO.' . Model_Folha::ID . '
                               INNER JOIN ' . Model_Empresa::TABELA . ' EM 
                                  ON EM.' . Model_Empresa::ID . ' = FO.' . Model_Folha::EMPRESA . '
                               INNER JOIN ' . Model_Tipo_Operacao::TABELA . ' OP 
                                  ON OP.' . Model_Tipo_Operacao::ID . ' = PR.' . Model_Processo::OPERACAO . '
                               ORDER BY 1, 2, 6');

    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return 'Não há registros.';
    }
  }

  public function get_liquido_folha($dados) {

    if (!empty($dados['periodo'])) {
      $periodo = ' AND FOL.NU_PERIODO = ' . $dados['periodo'];
    } else {
      $periodo = '';
    }

    if (!empty($dados['competencia'])) {
      $aux = explode('-', $dados['competencia']);
      $competencia = ' AND FOL.NU_MES = ' . (int) $aux [1] . ' AND FOL.NU_ANO = ' . $aux [0];
    } else {
      $competencia = '';
    }

    $query = $this->db->query('
      SELECT NVL(NM_EMPDMT,\'NÃO SE APLICA\') NM_EMPDMT, CD_FILIAL, NU_ANO, NU_MES, NU_PERIODO, SUM(BB) BB,
             SUM(BRADESCO) BRADESCO, SUM(CITY) CITY, SUM(SANTANDER) SANTANDER, SUM(TOTAL) TOTAL
      FROM (
        SELECT EMPDMT.NM_EMPDMT, FOL.CD_FILIAL, FOL.CD_SECAO, UPPER(SEC.DESCRICAO) NM_SECAO,
               FOL.NU_ANO, FOL.NU_MES, FOL.NU_PERIODO, FOL.BB, FOL.BRADESCO, FOL.CITY, FOL.SANTANDER, 
               FOL.TOTAL
        FROM VW_FOLHA_RESUMO_BANCO FOL
        LEFT JOIN RM.PSECAO@RMPROD SEC
          ON FOL.CD_SECAO = SEC.CODIGO
        LEFT JOIN EMPDMT_SECAO ESEC
          ON ESEC.CD_SECAO = SEC.CODIGO
        LEFT JOIN EMPREENDIMENTO EMPDMT
          ON EMPDMT.ID_EMPDMT = ESEC.ID_EMPDMT
        WHERE 1 = 1 ' . $periodo . $competencia . ') JUNTA
      GROUP BY NM_EMPDMT, CD_FILIAL, NU_ANO, NU_MES, NU_PERIODO
      ORDER BY NU_ANO, NU_MES, NU_PERIODO, NM_EMPDMT, CD_FILIAL');
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return 'Não há registros.';
    }
  }

  public function get_liquido_folha_analitico($dados) {

    if (isset($dados['empreendimento'])) {
      if ($dados['empreendimento'] == 'NÃO SE APLICA') {
        $empreendimento = ' AND EMPDMT.NM_EMPDMT IS NULL ';
      } else {
        $empreendimento = ' AND EMPDMT.NM_EMPDMT = \'' . $dados['empreendimento'] . '\' ';
      }
    }else {
      $empreendimento = ' ';
    }

    if (isset($dados['filial'])) {
      $filial = ' AND FOL.CD_FILIAL = ' . $dados['filial'];
    } else {
      $filial = ' ';
    }

    $query = $this->db->query('
      SELECT NVL(EMPDMT.NM_EMPDMT,\'NÃO SE APLICA\') NM_EMPDMT, FOL.CD_FILIAL, FOL.CD_SECAO, 
             UPPER(SEC.DESCRICAO) NM_SECAO, FOL.NU_ANO, FOL.NU_MES, FOL.NU_PERIODO, FOL.BB, 
             FOL.BRADESCO, FOL.CITY, FOL.SANTANDER, FOL.TOTAL
      FROM VW_FOLHA_RESUMO_BANCO FOL
      LEFT JOIN RM.PSECAO@RMPROD SEC
        ON FOL.CD_SECAO = SEC.CODIGO
      LEFT JOIN EMPDMT_SECAO ESEC
        ON ESEC.CD_SECAO = SEC.CODIGO
      LEFT JOIN EMPREENDIMENTO EMPDMT
        ON EMPDMT.ID_EMPDMT = ESEC.ID_EMPDMT
      WHERE FOL.NU_PERIODO = ' . $dados['periodo'] . '
        AND FOL.NU_MES = ' . $dados['mes'] . ' 
        AND FOL.NU_ANO = ' . $dados['ano'] . 
        $filial . $empreendimento . 
     ' ORDER BY EMPDMT.NM_EMPDMT, FOL.CD_FILIAL, SEC.DESCRICAO, FOL.NU_ANO, FOL.NU_MES, FOL.NU_PERIODO');
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return 'Não há registros.';
    }
  }

  public function getPeriodo() {
    $query = $this->db->query('SELECT CODCLIENTE, UPPER(DESCRICAO) DESCRICAO FROM RM.PDESCPERIODO@RMPROD');
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return 'Não há registros.';
    }
  }

}
