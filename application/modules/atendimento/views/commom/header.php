<header id="mpe" class="legend">
  <div class="container">
    <div class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" id="logo" href="<?php site_url(); ?>">
            <h1 class="text-hide">Grupo MPE</h1>
          </a>
        </div>
        <nav class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="<?php echo isset($menu_lista) ? $menu_lista : ''; ?>">
              <a href="<?php echo site_url('atendimento/index'); ?>">
                <span class="glyphicon glyphicon-dashboard"></span> Lista
              </a>
            </li>
            <li class="<?php echo isset($menu_grafico) ? $menu_grafico : ''; ?>">
              <a href="<?php echo site_url('atendimento/graficos'); ?>">
                <span class="glyphicon glyphicon-signal"></span> Gráficos
              </a>
            </li>
          </ul>
        </nav><!--/.nav-collapse -->
      </div>
    </div>
  </div>
</header>
<section class="container">
  <?php echo $breadcrumb; ?>