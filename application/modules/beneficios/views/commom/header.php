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
            <li class="<?php echo isset($menu_dashboard) ? $menu_dashboard : ''; ?>">
              <a href="<?php echo site_url('nucleo/dashboard'); ?>">
                <span class="glyphicon glyphicon-dashboard"></span> Dashboard
              </a>
            </li>
            <li class="<?php echo isset($menu_usuario) ? $menu_usuario : ''; ?>">
              <a href="<?php echo site_url('nucleo/usuario'); ?>">
                <span class="glyphicon glyphicon-user"></span> Usuário
              </a>
            </li>
            <li class="<?php echo isset($menu_modulo) ? $menu_modulo : ''; ?>">
              <a href="<?php echo site_url('nucleo/modulo'); ?>">
                <i class="fa fa-caret-square-o-up"></i> Módulos
              </a>
            </li>
            <li class="<?php echo isset($menu_privilegio) ? $menu_privilegio : ''; ?>">
              <a href="<?php echo site_url('nucleo/privilegio'); ?>">
                <i class="fa fa-key"></i> Privilégio
              </a>
            </li>
            <li class="<?php echo isset($menu_acesso) ? $menu_acesso : ''; ?>">
              <a href="<?php echo site_url('nucleo/acesso'); ?>">
                <span class="glyphicon glyphicon-random"></span> Acesso
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



