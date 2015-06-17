<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo FILE_PUBLIC; ?>assets/icons/favicon.ico">

    <title>Esqueci minha senha :: Grupo MPE</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo FILE_PUBLIC; ?>assets/css/main.css">   
    <script src="<?php echo FILE_PUBLIC; ?>assets/js/vendor/modernizr.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body cz-shortcut-listen="true" class="legend">

    <section class="login" style="">
      <div class="login-panel" style="display: block;">
        <div class="media">
          <a class="pull-left" href="#">
            <img src="<?php echo FILE_PUBLIC; ?>assets/img/logo.png" alt="Grupo MPE" />
          </a>
          <div class="media-body">
            <h2 class="text-success text-center">Intranet Grupo MPE</h2>
          </div>
        </div>
        <?php echo form_open('nucleo/login/trocarSenha', 'class="form-signin" onsubmit="return validar();"'); ?>
        <input type="hidden" name="id" value="<?php echo $funcionario; ?>" />
        <div class="input-group">  
          <p class="text-muted">Digite a nova senha e confirme-a.</p>
        </div>
        <div class="row">
          <div class="col-sm-6 col-alpha">
            <?php echo form_password('senha', '', 'id="senha" class="form-control" placeholder="Nova Senha" required'); ?>
          </div>
          <div class="col-sm-6 col-omega">
            <?php echo form_password('senha_confirm', '', 'id="senha_confirm" class="form-control" placeholder="Confirme a Nova Senha" required'); ?>
          </div>
        </div>
        <span class="input-group-btn">
          <?php echo form_submit('submit', 'Trocar Senha', 'class="btn btn-default btn-lg pull-right"'); ?>
        </span>
        <?php form_close(); ?>
        <hr>
      </div>
      <div class="backstretch">
        <img src="<?php echo FILE_PUBLIC; ?>assets/img/background-login.jpg" />
      </div>
    </section>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo FILE_PUBLIC; ?>assets/js/vendor/jquery.js"><\/script>')</script>
    <script src="<?php echo FILE_PUBLIC; ?>assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo FILE_PUBLIC; ?>assets/js/vendor/jquery-ui.js"></script>
    <script src="<?php echo FILE_PUBLIC; ?>assets/js/vendor/semantic.js"></script>
    <script src="<?php echo FILE_PUBLIC; ?>assets/js/vendor/cookie.js"></script>
    <script src="<?php echo FILE_PUBLIC; ?>assets/js/plugins.js"></script>
    <script src="<?php echo FILE_PUBLIC; ?>assets/js/main.js"></script>

    <script src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/mensagens.js'); ?>"></script>
    <script>
      login();

      function validar() {

        var $senha = $('#senha').val();
        var $confirm_senha = $('#senha_confirm').val();
        var $retorno = true;

        if ($senha == '') {
          show_stack_bar_top("error", "Erro", "Campo 'Nova Senha' não pode ficar vazio'.");
          $retorno = false;
        }
        if ($confirm_senha == '') {
          show_stack_bar_top("error", "Erro", "Campo 'Confirme a Nova Senha' não pode ficar vazio'.");
          $retorno = false;
        }
        if ($senha != $confirm_senha) {
          show_stack_bar_top("error", "Erro", "As senha não são idênticas'.");
          $retorno = false;
        }
        return $retorno;
      }

    </script>
  </body>
</html>