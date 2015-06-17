<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_graficos
 *
 * @author denner.fernandes
 */
class model_graficos extends MY_Model {

  private $OTRS;

  public function __construct() {
    parent::__construct();
    $this->OTRS = $this->load->database('otrs', TRUE);
  }

  public function __destruct() {
    
  }

  public function graficoAbertosPorAtendente($fila = 'ALL', $responsavel = 'ALL', $proprietario = 'ALL') {

    if ($fila != 'ALL') {
      $fila = ' AND Fila LIKE "%' . $fila . '%" ';
    } else {
      $fila = '';
    }

    if ($responsavel != 'ALL') {
      $responsavel = ' AND Responsavel LIKE "%' . $responsavel . '%" ';
    } else {
      $responsavel = '';
    }

    if ($proprietario != 'ALL') {
      $proprietario = ' AND Proprietario IN ("' . implode('", "', $proprietario) . '") ';
    } else {
      $proprietario = '';
    }

    $query = $this->OTRS->query('SELECT Proprietario, count(Id) qtd FROM Listagem_Geral
                                 WHERE Id_Fila IN(
                                    SELECT QU.id
                                    FROM personal_queues PQ
                                    INNER JOIN users US
                                     ON US.id = PQ.user_id
                                    INNER JOIN queue QU
                                     ON QU.id = PQ.queue_id
                                    WHERE US.login = \'' . explode('@', $this->data['funcionario'][model_funcionario::EMAIL])[0] . '\') ' . $fila . $responsavel . $proprietario . '
                                 GROUP BY Proprietario 
                                 ORDER BY Proprietario');
    
    $dados = '["Atendente", "Abertos"],';

    foreach ($query->result_array() as $value) {
      $dados .= '["' . $value['Proprietario'] . '", ' . $value['qtd'] . '],';
    }

    if ($query->num_rows > 0) {
      return $dados;
    } else {
      throw new Exception('Não há registros.');
    }
  }

  public function graficoAbertosPorDepartamento($fila = 'ALL', $responsavel = 'ALL', $proprietario = 'ALL') {

    if ($fila != 'ALL') {
      $fila = ' AND Fila LIKE "%' . $fila . '%" ';
    } else {
      $fila = '';
    }

    if ($responsavel != 'ALL') {
      $responsavel = ' AND Responsavel LIKE "%' . $responsavel . '%" ';
    } else {
      $responsavel = '';
    }

    if ($proprietario != 'ALL') {
      $proprietario = ' AND Proprietario IN ("' . implode('", "', $proprietario) . '") ';
    } else {
      $proprietario = '';
    }

    $query = $this->OTRS->query('SELECT IFNULL(Depto_Cliente, "Não Classificado") Depto_Cliente, count(Id) qtd
                                 FROM Listagem_Geral 
                                 WHERE Id_Fila IN(
                                    SELECT QU.id
                                    FROM personal_queues PQ
                                    INNER JOIN users US
                                     ON US.id = PQ.user_id
                                    INNER JOIN queue QU
                                     ON QU.id = PQ.queue_id
                                    WHERE US.login = \'' . explode('@', $this->data['funcionario'][model_funcionario::EMAIL])[0] . '\') ' . $fila . $responsavel . $proprietario . '
                                 GROUP BY Depto_Cliente 
                                 ORDER BY Depto_Cliente');

    $dados = '["Departamento", "Abertos"],';

    foreach ($query->result_array() as $value) {
      $dados .= '["' . $value['Depto_Cliente'] . '", ' . $value['qtd'] . '],';
    }

    if ($query->num_rows > 0) {
      return $dados;
    } else {
      throw new Exception('Não há registros.');
    }
  }

  public function graficoEncerradosPorAtendente($fila = 'ALL', $responsavel = 'ALL', $datade = NULL, $dataate = NULL, $proprietario = 'ALL') {

    if ($fila != 'ALL') {
      $fila = ' AND Fila LIKE "%' . $fila . '%" ';
    } else {
      $fila = '';
    }

    if ($responsavel != 'ALL') {
      $responsavel = ' AND Responsavel LIKE "%' . $responsavel . '%" ';
    } else {
      $responsavel = '';
    }

    if (!is_null($datade) && !is_null($dataate)) {
      $datade = $datade . '-01';
      $dataate = $dataate . '-31';
      $intervalo = 'AND Data_Fechamento BETWEEN "' . $datade . '" AND "' . $dataate . '"';
    } else {
      $intervalo = '';
    }

    if ($proprietario != 'ALL') {
      $proprietario = ' AND Proprietario IN ("' . implode('", "', $proprietario) . '") ';
    } else {
      $proprietario = '';
    }

    $query = $this->OTRS->query('SELECT Proprietario, COUNT(Chamado) Chamado, 
                                        CONCAT(YEAR(Data_Fechamento), LPAD(MONTH(Data_Fechamento), 2, "0")) Mes
                                 FROM Listagem_Geral_Encerrados
                                 WHERE Data_Fechamento IS NOT NULL
                                 AND Id_Fila IN(
                                    SELECT QU.id
                                    FROM personal_queues PQ
                                    INNER JOIN users US
                                     ON US.id = PQ.user_id
                                    INNER JOIN queue QU
                                     ON QU.id = PQ.queue_id
                                    WHERE US.login = \'' . explode('@', $this->data['funcionario'][model_funcionario::EMAIL])[0] . '\') ' . $intervalo . $fila . $responsavel . $proprietario . '
                                 GROUP BY Proprietario, Mes
                                 ORDER BY Proprietario, Mes');

    if ($query->num_rows > 0) {

      $dados = $meses_existentes = array();

      $title = $content = array();
      $meses = array('01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04' => 'Abril', '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro');


      $datade = explode('-', $datade);
      $dataate = explode('-', $dataate);
      $datade = $datade[0] . $datade[1];
      $dataate = $dataate[0] . $dataate[1];

      for ($i = $datade; $i <= $dataate; $i++) {
        $meses_existentes[] = $i;
        if (substr($i, -2) == 12) {
          $i = $i + 88;
        }
      }

      foreach ($query->result_array() as $val) {

        if (!array_key_exists($val['Proprietario'], $dados)) {
          $dados[$val['Proprietario']] = array();
        }

        if (!array_key_exists($val['Mes'], $dados[$val['Proprietario']])) {
          $dados[$val['Proprietario']][$val['Mes']] = $val['Chamado'];
        }
      }

      foreach ($meses_existentes as $val1) {

        foreach ($dados as $key => $val2) {

          if (!array_key_exists($val1, $val2)) {
            $dados[$key][$val1] = 0;
          }
          ksort($dados[$key]);
        }
      }

      foreach ($dados as $key => $value) {
        $title[] = '"' . $key . '"';

        foreach ($value as $key2 => $val) {

          $mes = array_key_exists(substr($key2, -2), $meses) ? $meses[substr($key2, -2)] : '';

          if (!array_key_exists($key2, $content)) {

            if (count($meses_existentes) > 12) {
              $anoview = '/' . substr($key2, 0, 4);
            } else {
              $anoview = '';
            }

            $content[$key2] = '"' . $mes . $anoview . '", ' . $val . ', ';
          } else {
            $content[$key2] .= $val . ', ';
          }
        }
      }

      $return = '["Meses", ' . implode(', ', $title) . '],';
      $return .= '[' . implode('], [', $content) . ']';

      return $return;
    } else {
      throw new Exception('Não há registros.');
    }
  }

  public function graficoEncerradosPorDepartamento($fila = 'ALL', $responsavel = 'ALL', $datade = NULL, $dataate = NULL, $proprietario = 'ALL') {

    if ($fila != 'ALL') {
      $fila = ' AND Fila LIKE "%' . $fila . '%" ';
    } else {
      $fila = '';
    }

    if ($responsavel != 'ALL') {
      $responsavel = ' AND Responsavel LIKE "%' . $responsavel . '%" ';
    } else {
      $responsavel = '';
    }

    if (!is_null($datade) && !is_null($dataate)) {
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

    $query = $this->OTRS->query('SELECT IFNULL(Depto_Cliente, "Não Classificado") Depto_Cliente, COUNT(Chamado) Chamado, 
                                        CONCAT(YEAR(Data_Fechamento), LPAD(MONTH(Data_Fechamento), 2, "0")) Mes
                                 FROM Listagem_Geral_Encerrados
                                 WHERE Data_Fechamento IS NOT NULL
                                 AND Id_Fila IN(
                                    SELECT QU.id
                                    FROM personal_queues PQ
                                    INNER JOIN users US
                                     ON US.id = PQ.user_id
                                    INNER JOIN queue QU
                                     ON QU.id = PQ.queue_id
                                    WHERE US.login = \'' . explode('@', $this->data['funcionario'][model_funcionario::EMAIL])[0] . '\') ' . $intervalo . $fila . $responsavel . $proprietario . '
                                 GROUP BY Depto_Cliente, Mes
                                 ORDER BY Depto_Cliente, Mes');
    if ($query->num_rows > 0) {

      $dados = $meses_existentes = array();
      $q = $query->result_array();
      $title = $content = array();

      $meses = array('01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04' => 'Abril', '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro');

      $datade = explode('-', $datade);
      $dataate = explode('-', $dataate);
      $datade = $datade[0] . $datade[1];
      $dataate = $dataate[0] . $dataate[1];

      for ($i = $datade; $i <= $dataate; $i++) {
        $meses_existentes[] = $i;
        if (substr($i, -2) == 12) {
          $i = $i + 88;
        }
      }

      foreach ($query->result_array() as $value) {

        if (!array_key_exists($value['Depto_Cliente'], $dados)) {
          $dados[$value['Depto_Cliente']] = array();
        }
        if (!array_key_exists($value['Mes'], $dados[$value['Depto_Cliente']])) {
          $dados[$value['Depto_Cliente']][$value['Mes']] = $value['Chamado'];
        }
      }

      foreach ($meses_existentes as $val1) {

        foreach ($dados as $key => $val2) {

          if (!array_key_exists($val1, $val2)) {
            $dados[$key][$val1] = 0;
          }
          ksort($dados[$key]);
        }
      }

      foreach ($dados as $key => $value) {
        $title[] = '"' . $key . '"';

        foreach ($value as $key2 => $val) {

          $mes = array_key_exists(substr($key2, -2), $meses) ? $meses[substr($key2, -2)] : '';

          if (!array_key_exists($key2, $content)) {

            if (count($meses_existentes) > 12) {
              $anoview = '/' . substr($key2, 0, 4);
            } else {
              $anoview = '';
            }

            $content[$key2] = '"' . $mes . $anoview . '", ' . $val . ', ';
          } else {
            $content[$key2] .= $val . ', ';
          }
        }
      }

      $return = '["Meses", ' . implode(', ', $title) . '],';
      $return .= '[' . implode('], [', $content) . ']';

      return $return;
    } else {
      throw new Exception('Não há registros.');
    }
  }

}
