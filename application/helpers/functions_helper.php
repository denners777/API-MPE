<?php

if (!function_exists('enviaEmail')) {

  function enviaEmail($dados) {

    if (is_array($dados)) {

      /* Recebimento de dados
       * $dados = array(
        'email'       => 'ti@grupompe.com.br',              //email do detinatário      string
        'nome'        => 'Administrador do Sistema',        //nome do destinatário      string
        'titulo'      => 'Intranet Grupo MPE',              //título do email           string
        'assunto'     => 'Intranet Grupo MPE',              //assunto do email          string
        'mensagem'    => 'Mensagem do Grupo MPE',           //mensagem do email         string
        'reply'       => 'noreply@grupompe.com.br',         //responder para            string
        'cc'          => 'copia@grupompe.com.br',           //email para cópia          string/array
        'co'          => 'copiaoculta@grupompe.com.br',     //email para cópia oculta   string/array
        'attachment'  => 'C:/caminho/do/arquivo.extensao',  //caminho do arquivo        string/array
        );
       */

      $emailDestinatario = isset($dados['email']) ? $dados['email'] : 'ti@grupompe.com.br';
      $nomeDestinatario = isset($dados['nome']) ? $dados['nome'] : 'Administrador do Sistema';
      $titulo = isset($dados['titulo']) ? $dados['titulo'] : 'Intranet Grupo MPE';
      $assunto = isset($dados['assunto']) ? $dados['assunto'] : 'Intranet Grupo MPE';
      $mensagem = isset($dados['mensagem']) ? $dados['mensagem'] : 'Mensagem do Grupo MPE';
      $reply = isset($dados['reply']) ? $dados['reply'] : 'noreply@grupompe.com.br';
      $fromName = explode('@', $reply)[0];

      $mail = new \PHPMailer();
      $mail->IsSMTP();

      $mail->isSMTP();
      $mail->Host = 'mpemta.grupompe.com.br';
      $mail->SMTPAuth = true;
      $mail->Username = 'gestaodepessoas';
      $mail->Password = 'alterar1';
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;
      $mail->CharSet = 'UTF-8';

      $mail->From = $reply;
      $mail->FromName = $fromName;
      $mail->addAddress($emailDestinatario, $nomeDestinatario);
      $mail->addReplyTo($reply, $fromName);

      if (isset($dados['cc'])) {
        if (is_array($dados['cc'])) {
          foreach ($dados['cc'] as $key => $value) {
            $mail->addCC($value);
          }
        } else {
          $mail->addCC($dados['cc']);
        }
      }
      if (isset($dados['co'])) {
        if (is_array($dados['co'])) {
          foreach ($dados['co'] as $key => $value) {
            $mail->addBCC($value);
          }
        } else {
          $mail->addBCC($dados['co']);
        }
      }

      if (isset($dados['attachment'])) {
        if (is_array($dados['attachment'])) {
          foreach ($dados['attachment'] as $key => $value) {
            $filename = explode('/', $value);
            $mail->addAttachment($value, $filename[count($filename) - 1]);
          }
        } else {
          $filename = explode('/', $dados['attachment']);
          $mail->AddAttachment($dados['attachment'], $filename[count($filename) - 1]);
        }
      }

      $mail->isHTML(true);
      $mail->WordWrap = TRUE;

      $mail->Subject = $assunto;

      $inst = &get_instance();
      $corpoEmail = $inst->load->view('email', '', TRUE);

      $corpoEmail = str_replace('@@title@@', $titulo, $corpoEmail);

      $corpoEmail = str_replace('@@content@@', $mensagem, $corpoEmail);
      $mail->Body = $corpoEmail;

      $mail->AltBody = $corpoEmail;

      if (!$mail->Send()) {
        throw new Exception('show_stack_bar_top("error", "Erro no envio de e-mail!", "Ocorreu um erro durante o envio: ' . $mail->ErrorInfo . '");');
      } else {
        $inst->session->set_flashdata('MSG', 'show_stack_bar_top("success", "Sucesso", "E-mail enviado com sucesso.")');
        return TRUE;
      }
    } else {
      throw new Exception('show_stack_bar_top("error", "Erro dados!", "Erro no envio dos dados para o e-mail!<br>Envie array!!!");');
    }
  }

}

if (!function_exists('readXLS')) {

  function readXLS($ext, $file) {

    $PHPExcel = new \PHPExcel();

    //$this->load->library('PHPExcel');
    $inputFileName = $file;

    switch ($ext) {
      case 'xls':
        $objReader = new PHPExcel_Reader_Excel5();
        break;
      case 'xlsx':
        $objReader = new PHPExcel_Reader_Excel2007();
        break;
      case 'csv':
        $objReader = new PHPExcel_Reader_CSV();
        break;
//	$objReader = new PHPExcel_Reader_OOCalc();
//	$objReader = new PHPExcel_Reader_SYLK();
//	$objReader = new PHPExcel_Reader_Gnumeric();
      default:
        $objReader = new PHPExcel_Reader_Excel5();
        break;
    }

    $objPHPExcel = $objReader->load($inputFileName);

    return $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
  }

}

if (!function_exists('doUpload')) {

  function doUpload($form = NULL, $pasta = NULL, $extensoes = NULL) {

    //tratamento de erro padrao
    if (!is_null($form)) {

      $nome_arquivo = $_FILES[$form]['name'];
      $nome_final = date('YmdHis') . '-' . $nome_arquivo;

      //define onde guardar arquivo
      if (is_null($pasta)) {
        $config['pasta'] = getcwd() . '/files/funcionarios/';
      } else {
        $config['pasta'] = getcwd() . '/files/' . $pasta . '/';
      }
      $file = $config['pasta'] . $nome_final;

      //tipo de erros
      $config['erros'][0] = 'Não houve erro';
      $config['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
      $config['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
      $config['erros'][3] = 'O upload do arquivo foi feito parcialmente';
      $config['erros'][4] = 'Não foi feito o upload do arquivo';

      //verifica se upload houve erros
      if ($_FILES[$form]['error'] != 0) {
        throw new Exception($config['erros'][$_FILES[$form]['error']]);
        return FALSE;
      }

      //poder receber todo tipo de extensao
      if (is_null($extensoes)) {
        $config['extensoes'] = array('xls', 'xlsx', 'csv');
      } else {
        if (is_array($extensoes)) {
          $config['extensoes'] = $extensoes;
        } else {
          throw new Exception('As extensões devem estar em uma array.');
          return FALSE;
        }
      }

      //verificando as extensoes
      $extensao = strtolower(end(explode('.', $_FILES[$form]['name'])));

      if (array_search($extensao, $config['extensoes']) === false) {
        $ext = '';
        foreach ($config['extensoes'] as $it) {
          $ext .= $it . ' - ';
        }
        throw new Exception('Por favor, envie arquivos com a(s) seguinte(s) extensão (ões): ' . substr($ext, 0, -3));
        return FALSE;
      } else {

        if (!move_uploaded_file($_FILES[$form]['tmp_name'], $file)) {
          throw new Exception('Não foi possível enviar o arquivo, tente novamente');
        } else {
          return $file;
        }
      }
    } else {
      throw new Exception('Não foi enviado de um formulário');
      return FALSE;
    }
  }

}

if (!function_exists('writeXLS')) {

  function writeXLS($dados = NULL, $download = TRUE) {

    if (is_null($dados)) {
      throw new Exception('Erro no envio de dados para exportar o excel.');
    }
    //$this->load->library('PHPExcel');

    $objPHPExcel = new \PHPExcel();
    $objPHPExcel->getProperties()->setCreator('Intranet')
            ->setLastModifiedBy('Intranet')
            ->setTitle('Relatorio de Arquivos Gerados:')
            ->setCategory('Relatorios');
    $objPHPExcel->getActiveSheet()->setTitle('Arquivos Gerados');

    $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $i = 0;

    //$objPHPExcel->setProperties(PHPExcel_DocumentProperties::PROPERTY_TYPE_STRING);

    foreach ($dados as $key => $value) {
      $i++;
      $j = 0;
      $l = -1;
      $letra = '';
      $liga = FALSE;
      foreach ($value as $key2 => $value2) {

        if ($j > 26) {
          $l++;
          $j = 0;
          $letra = $alpha[$l];
          $liga = TRUE;
        }

        if ($liga) {
          $letra .= $alpha[$j];
        } else {
          $letra = $alpha[$j];
        }

        if (1 == $i) {

          /* ------------------Perfumaria---------------------- */
          $objPHPExcel->getActiveSheet()->getStyle($letra . $i)->getFont()->getColor(new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_DARKGREEN));
          $objPHPExcel->getActiveSheet()->getStyle($letra . $i)->getFont()->setBold(true);
          $objPHPExcel->getActiveSheet()->getStyle($letra . $i)->getFont()->setSize(12);
          $objPHPExcel->getActiveSheet()->getStyle($letra . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
          $objPHPExcel->getActiveSheet()->getStyle($letra . $i)->getFont()->setItalic(true);
          $objPHPExcel->getActiveSheet()->getStyle($letra . $i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
          /* -------------------------------------------------- */

          $objPHPExcel->setActiveSheetIndex(0)->setCellValue($letra . $i, $key2);
          $k = $i + 1;
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue($letra . $k, $value2);
        } else {
          $k = $i + 1;
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue($letra . $k, $value2);
        }
        $objPHPExcel->setActiveSheetIndex(0)->getStyle($letra . $k)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
        $objPHPExcel->getActiveSheet()->getColumnDimension($letra)->setAutoSize(true);
        $j++;
      }
    }

    $nomeArquivo = date('Ymd-His') . '.xlsx';

    if ($download) {

      header("HTTP/1.1 200 OK");
      header("Pragma: public");
      header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
      header("Cache-Control: private", false);
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="' . $nomeArquivo);
      header("Content-Transfer-Encoding: binary");
      //header('Cache-Control: max-age=1');

      $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
      $objWriter->save('php://output');
    } else {

      $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
      $objWriter->save(getcwd() . '/files/exportacoes/' . $nomeArquivo);
      return getcwd() . '/files/exportacoes/' . $nomeArquivo;
    }
  }

}

if (!function_exists('writeExportRM')) {

  function writeExportRM($dados, $nomeArquivo = 'Importar RM') {

    $nomeArquivo = retiraAcentos($nomeArquivo) . date('Ymdhis') . '.txt';

    $path = getcwd() . '/files/exportacoes/' . $nomeArquivo;

    $ponteiro = fopen(getcwd() . '/files/exportacoes/' . $nomeArquivo, 'a');

    $i = 1;

    foreach ($dados as $row) {

      if (count($dados) != $i) {
        $quebra = chr(13) . chr(10);
      } else {
        $quebra = '';
      }
      $linha = $row[model_linha::LINHA]->load() . $quebra;

      fwrite($ponteiro, $linha, strlen($linha));
      $i++;
    }

    fclose($ponteiro);

    header('HTTP/1.1 200 OK');
    header('Pragma: public');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Cache-Control: private', false);
    header('Content-Length: ' . filesize($path));
    header('Content-Type: application/force-download');
    header('Content-type: application/octet-stream;');
    header('Content-disposition: attachment; filename=' . $nomeArquivo);
    header("Content-Transfer-Encoding: binary");

    readfile($path);
    flush();
  }

}

if (!function_exists('retiraAcentos')) {

  function retiraAcentos($texto) {

    return strtr(utf8_decode($texto), utf8_decode('ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿªº¹²³\''), 'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyyao123 ');
  }

}

class Datagrid {

  private $hide_pk_col = true;
  private $hide_cols = array();
  private $tbl_name = '';
  private $pk_col = '';
  private $headings = array();
  private $tbl_fields = array();

  function __construct($tbl_name, $pk_col = 'id') {
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->tbl_fields = $this->CI->db->list_fields($tbl_name);
    if (!in_array($pk_col, $this->tbl_fields)) {
      throw new Exception("Coluna de chave primária '$pk_col' não encontrado na tabela '$tbl_name'");
    }
    $this->tbl_name = $tbl_name;
    $this->pk_col = $pk_col;
    $this->CI->load->library('table');
  }

  public function setHeadings(array $headings) {
    $this->headings = array_merge($this->headings, $headings);
  }

  public function hidePkCol($bool) {
    $this->hide_pk_col = (bool) $bool;
  }

  public function ignoreFields(array $fields) {
    foreach ($fields as $f) {
      if ($f != $this->pk_col)
        $this->hide_cols[] = $f;
    }
  }

  private function _selectFields() {
    foreach ($this->tbl_fields as $field) {
      if (!in_array($field, $this->hide_cols)) {
        $this->CI->db->select($field);
        // hide pk column heading?
        if ($field == $this->pk_col && $this->hide_pk_col)
          continue;
        $headings[] = isset($this->headings[$field]) ? $this->headings[$field] : ucfirst($field);
      }
    }
    if (!empty($headings)) {
      // prepend a checkbox for toggling 
      array_unshift($headings, '<label class="checkbox"><input type="checkbox" /></label>');
      $this->CI->table->set_heading($headings);
    }
  }

  public function generate() {
    $this->_selectFields();
    $rows = $this->CI->db
            ->from($this->tbl_name)
            ->get()
            ->result_array();
    foreach ($rows as &$row) {
      $id = $row[$this->pk_col];

      // prepend a checkbox to enable selection of items
      array_unshift($row, "<label class='checkbox'><input class='dg_check_item' type='checkbox' name='dg_item[]' value='$id' />");

      // hide pk column?
      if ($this->hide_pk_col) {
        unset($row[$this->pk_col]);
      }
    }

    return $this->CI->table->generate($rows);
  }

  public static function createButton($action_name, $label) {
    return "<div class='pull-rigth'><input type='submit' class='$action_name btn' name='dg_action[$action_name]' value='$label' /></div>";
  }

  public static function getPostAction() {
    // get name of submitted action (if any)
    if (isset($_POST['dg_action'])) {
      return key($_POST['dg_action']);
    }
  }

  public static function getPostItems() {
    if (!empty($_POST['dg_item'])) {
      return $_POST['dg_item'];
    }
    return array();
  }

  public function deletePostSelection() {
    // remove selected items from the db
    if (!empty($_POST['dg_item']))
      return $this->CI->db
                      ->from($this->tbl_name)
                      ->where_in($this->pk_col, $_POST['dg_item'])
                      ->delete();
  }

}
