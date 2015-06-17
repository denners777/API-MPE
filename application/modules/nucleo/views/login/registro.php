
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo FILE_PUBLIC; ?>assets/icons/favicon.ico">

    <title>Cadastre-se :: Grupo MPE</title>
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
      <div class="login-panel registro" style="display: block;">
        <div class="media">
          <a class="pull-left" href="#">
            <img src="<?php echo FILE_PUBLIC; ?>assets/img/logo.png" alt="Grupo MPE" />
          </a>
          <div class="media-body">
            <h2 class="text-success text-center">Intranet Grupo MPE</h2>
          </div>
        </div>
        <?php
        echo form_open('nucleo/login/realizaRegistro', 'class="form-signin"'),
        form_input('chapa', '', 'class="form-control" placeholder="Matrícula" required autofocus');
        ?>
        <div class="input-group">
          <input type="text" name="email" class="form-control" placeholder="E-mail" required />
          <span class="input-group-addon">@grupompe.com.br</span>
        </div>
        <div class="row">
          <div class="col-sm-6 col-alpha">
            <?php echo form_password('senha', '', 'class="form-control" placeholder="Senha" required'); ?>
          </div>
          <div class="col-sm-6 col-omega">
            <?php echo form_password('senha_confirm', '', 'class="form-control" placeholder="Confirme a Senha" required'); ?>
          </div>
        </div>
        <?php echo form_dropdown('empresa', $empresa, 0, 'class="form-control" required'), form_input('cpf', '', 'class="form-control" placeholder="CPF" required'); ?>

        <div class="input-group">
          <?php echo form_input('dataadm', '', 'class="form-control datep" id="dataadm" placeholder="Data de Admissão (dia/mês/ano)" required'); ?>
          <span class="input-group-btn">
            <?php echo form_submit('submit', 'Registrar', 'class="btn btn-default btn-lg"'); ?>
          </span>
        </div>
        <?php form_close(); ?>
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
    $("#dataadm").mask("99/99/9999");
      
    </script>
  </body>
</html>