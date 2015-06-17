<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Intranet Grupo MPE</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="<?php echo FILE_PUBLIC; ?>assets/css/main.css">
    <script src="<?php echo FILE_PUBLIC; ?>assets/js/vendor/modernizr.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo FILE_PUBLIC; ?>assets/icons/favicon.ico">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <div id="overlay">
      <!--<span><i class="fa fa-spinner fa-spin"></i> Carregando...</span>-->
      <div class="loading">
        <div class="loading_cube">
          <div class="cube_big">
            <div class="cube_small"></div>
          </div>
        </div>
      </div>
    </div>
    <div id="wrap">
      <div class="container" id="header">
        <div class="row">
          <section>
            <nav class="navbar navbar-default " role="navigation">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target=".menu_modulos">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" id="logo" href="<?php site_url(); ?>">
                    <h1 class="text-hide">Grupo MPE</h1>
                  </a>
                </div>
                <div class="navbar-collapse collapse menu_modulos">
                  <ul class="nav navbar-nav">
                    <?php foreach ($menu_principal as $row): ?>
                      <?php if (array_key_exists('PARENTS', $row)): ?>
                        <li class="dropdown <?php echo @$URI[1] == $row[model_modulo::URL] ? 'active' : ''; ?>">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="<?php echo $row[model_modulo::ICON]; ?>"></i>
                            <?php echo $row[model_modulo::NOME]; ?> <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                            <!-- 
                            <li class="<?php echo!isset($URI[2]) ? ($URI[1] == $row[model_modulo::URL] ? 'active' : '') : ''; ?>">
                                  <a href="<?php echo site_url($row[model_modulo::URL]); ?>">
                                    <i class="fi-home"></i> Home
                                  </a>
                            </li>
                            -->
                            <?php foreach ($row['PARENTS'] as $row2): ?>
                              <?php if ($privilegios[$row[model_modulo::NOME]] >= $row2[model_modulo::PRIVILEGIO]): ?>
                                <li class="<?php echo isset($URI[2]) ? ($URI[2] == $row2[model_modulo::URL] ? 'active' : '') : ''; ?>">
                                  <a href="<?php echo site_url($row[model_modulo::URL] . '/' . $row2[model_modulo::URL]); ?>">
                                    <i class="<?php echo $row2[model_modulo::ICON]; ?>"></i> <?php echo $row2[model_modulo::NOME]; ?>
                                  </a>
                                </li>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </ul>
                        </li>
                      <?php else: ?>
                        <li class="<?php echo @$URI[1] == $row[model_modulo::URL] ? 'active' : ''; ?>">
                          <a href="<?php echo site_url($row[model_modulo::URL]); ?>" >
                            <i class="<?php echo $row[model_modulo::ICON]; ?>"></i> <?php echo $row[model_modulo::NOME]; ?>
                          </a>
                        </li>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right">
                      <a href="<?php echo site_url('nucleo/login/logoff'); ?>">
                        <i class="fa fa-power-off"></i> Logout
                      </a>
                    </li>
                  </ul>

                </div><!--/.nav-collapse -->
              </div>
            </nav>
          </section>
        </div>
      </div>
      <section class="container" id="main">
        <div class="row">
          <?php echo $breadcrumb; ?>
        </div>
        <div class="row">