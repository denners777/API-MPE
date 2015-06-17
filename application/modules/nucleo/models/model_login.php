<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_login
 *
 * @author denner.fernandes
 */
class model_login extends MY_Model {

  private $RM;

  public function __construct() {
    parent::__construct();
    $this->RM = $this->load->database('rm', TRUE);
  }

  public function getUsuario($chapa = NULL, $cpf = NULL, $dataadm = NULL, $empresa = NULL) {

    if (!is_null($dataadm)) {
      $data = ' AND PF.DATAADMISSAO = TO_DATE(\'' . $dataadm . '\', \'DD/MM/YYYY\')';
    } else {
      $data = '';
    }
    
    if (!is_null($cpf)) {
      $cpf = ' AND PP.CPF = \'' . $cpf . '\'';
    } else {
      $cpf = '';
    }

    $query = $this->RM->query('SELECT PF.CHAPA ' . model_funcionario::CHAPA . ',
                             PF.NOME ' . model_funcionario::NOME . ', 
                             REGEXP_REPLACE(LPAD(PP.CPF, 11, \'0\'), \'([0-9]{3})([0-9]{3})([0-9]{3})([0-9]{2})\',\'\1.\2.\3-\4\')  ' . model_funcionario::CPF . ',
                             TO_CHAR(PF.DATAADMISSAO, \'DD/MM/YYYY\')  ' . model_funcionario::ADMISSAO . ',
                             FU.NOME  ' . model_funcionario::FUNCAO . ',
                             PF.CODSECAO ' . model_funcionario::SECAO . ',
                             UPPER(PS.DESCRICAO)  ' . model_funcionario::DESCSECAO . ',
                             UPPER(ST.DESCRICAO)  ' . model_funcionario::SITUACAO . ',
                             PF.CODTIPO || \' \' || UPPER(PT.DESCRICAO)  ' . model_funcionario::TIPO . '
                      FROM RM.PFUNC PF
                      INNER JOIN RM.PPESSOA PP
                        ON PP.CODIGO = PF.CODPESSOA
                      LEFT JOIN RM.PSECAO PS 
                        ON PS.CODIGO = PF.CODSECAO
                        AND PS.CODCOLIGADA = PF.CODCOLIGADA
                      LEFT JOIN RM.GUSUARIO GU 
                        ON UPPER(GU.NOME) = PF.NOME
                      LEFT JOIN RM.PFUNCAO FU
                        ON FU.CODIGO = PF.CODFUNCAO
                      LEFT JOIN RM.PTPFUNC PT
                        ON PF.CODTIPO = PT.CODCLIENTE
                      LEFT JOIN RM.PCODSITUACAO ST
                        ON PF.CODSITUACAO = ST.CODCLIENTE
                      WHERE PF.CODCOLIGADA = ' . $empresa . ' 
                        AND PF.CHAPA = \'' . $chapa . '\'' . $cpf . $data);
    echo $this->RM->last_query();
    if ($query->num_rows > 0) {
      return $query->result_array();
    } else {
      return FALSE;
    }
  }

  public function __destruct() {
    
  }

}
