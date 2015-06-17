<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perguntas
 *
 * @author denner.fernandes
 */
class model_perguntas extends MY_Model {

  private $PROTHEUS;

  public function __construct() {
    $this->PROTHEUS = $this->load->database('protheus', TRUE);
  }

  public function qtdFornecedor() {
    $this->PROTHEUS->cache_on();
    $query = $this->PROTHEUS->query('
      SELECT COUNT(A2_COD) QTD FROM PRODUCAO_9ZGXI5.SA2010
      WHERE D_E_L_E_T_ <> \'*\' AND A2_COD LIKE \'F%\'');
    if ($query->num_rows > 0) {
      return $query->result_array();
    } else {
      throw new Exception('show_stack_bar_top("error", "Erro", "Não há registros em quantidade de Fornecedores.")');
    }
  }

  public function qtdProdutoServico($tipo = 'N') {
    $this->PROTHEUS->cache_on();
    $query = $this->PROTHEUS->query('
      SELECT COUNT(SB1.B1_COD) QTD FROM PRODUCAO_9ZGXI5.SB1010 SB1
      LEFT JOIN PRODUCAO_9ZGXI5.SB5010 SB5 ON SB1.B1_COD = SB5.B5_COD
      LEFT JOIN PRODUCAO_9ZGXI5.SBM010 SBM ON SB1.B1_GRUPO = SBM.BM_GRUPO
      WHERE SB1.D_E_L_E_T_ <> \'*\' AND SB1.B1_MSBLQL = \'2\'
      AND SB1.B1_GRUPO NOT IN(\'3701\', \'4201\', \'4202\')
      AND SBM.BM_XFLAG = \'' . $tipo . '\'');

    if ($query->num_rows > 0) {
      return $query->result_array();
    } else {
      throw new Exception('show_stack_bar_top("error", "Erro", "Não há registros em quantidade de Produtos e Serviços.")');
    }
  }

  public function fornecedor($fornecedor) {
    $fornecedor = strtoupper($fornecedor);
    
    $query = $this->PROTHEUS->query('
          SELECT SA2.A2_COD, SA2.A2_LOJA, SA2.A2_NOME, 
          CASE 
            WHEN LENGTH(SA2.A2_CGC) = 9
            THEN REGEXP_REPLACE(SA2.A2_CGC, \'([0-9]{3})([0-9]{3})([0-9]{3})([0-9]{2})\',\'\1.\2.\3-\4\')
            WHEN LENGTH(SA2.A2_CGC) = 14
            THEN REGEXP_REPLACE(SA2.A2_CGC, \'([0-9]{2})([0-9]{3})([0-9]{3})([0-9]{4})([0-9]{2})\',\'\1.\2.\3/\4-\5\')
            ELSE SA2.A2_CGC 
          END A2_CGC, 
          SA2.A2_EST, SA2.A2_MUN, 
          CASE SA2.A2_MSBLQL WHEN \'1\' THEN \'Sim\' ELSE \'\' END as BLOQ
          FROM PRODUCAO_9ZGXI5.SA2010 SA2
          WHERE D_E_L_E_T_ <> \'*\'
          AND SA2.A2_COD LIKE \'F%\' 
          AND (SA2.A2_NOME LIKE \'%' . $fornecedor . '%\' OR SA2.A2_COD LIKE \'%' . $fornecedor . '%\' 
            OR SA2.A2_LOJA LIKE \'%' . $fornecedor . '%\'
            OR SA2.A2_CGC LIKE \'%' . $fornecedor . '%\' OR SA2.A2_EST LIKE \'%' . $fornecedor . '%\' 
            OR SA2.A2_MUN LIKE \'%' . $fornecedor . '%\')'
        );
    if ($query->num_rows > 0) {
      return $query->result_array();
    } else {
      throw new Exception('show_stack_bar_top("error", "Erro", "Não há registros nessa consulta.")');
    }
  }

  public function produto($produtos) {
    $produtos = strtoupper($produtos);
    
    $query = $this->PROTHEUS->query('
            SELECT SB1.B1_COD, SB1.B1_DESC, SB5.B5_CEME, SB1.B1_GRUPO, SBM.BM_DESC, 
                   SB1.B1_UM, SB1.B1_POSIPI
            FROM PRODUCAO_9ZGXI5.SB1010 SB1
            LEFT JOIN PRODUCAO_9ZGXI5.SB5010 SB5 ON SB1.B1_COD = SB5.B5_COD
            LEFT JOIN PRODUCAO_9ZGXI5.SBM010 SBM ON SB1.B1_GRUPO = SBM.BM_GRUPO
            WHERE SB1.D_E_L_E_T_ <> \'*\'
              AND SB1.B1_MSBLQL = \'2\'
              AND SB1.B1_GRUPO NOT IN(\'3701\', \'4201\', \'4202\')
              AND (SB1.B1_DESC LIKE \'%' . $produtos . '%\'
               OR SBM.BM_DESC LIKE \'%' . $produtos . '%\'
               OR SB5.B5_CEME LIKE \'%' . $produtos . '%\'
               OR SB1.B1_GRUPO LIKE \'%' . $produtos . '%\'
               OR SB1.B1_COD LIKE \'%' . $produtos . '%\')'
          );
          
    if ($query->num_rows > 0) {
      return $query->result_array();
    } else {
      throw new Exception('show_stack_bar_top("error", "Erro", "Não há registros nessa consulta.")');
    }
  }

  public function __destruct() {
    
  }

}
