<header id="mpe" class="legend">
  <div class="container">
    <div class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
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
            <li class="<?php echo isset($menu_index) ? $menu_index : ''; ?>">
              <a href="<?php echo site_url('importacoes/index'); ?>">
                <span class="glyphicon glyphicon-dashboard"></span> Index
              </a>
            </li>
            <li class="<?php echo isset($menu_tipo) ? $menu_tipo : ''; ?>">
              <a href="<?php echo site_url('importacoes/tipo'); ?>">
                <span class="fi-tablet-portrait"></span> Tipo
              </a>
            </li>
            <li class="<?php echo isset($menu_de_para) ? $menu_de_para : ''; ?>">
              <a href="<?php echo site_url('importacoes/de_para'); ?>">
                <span class="fi-arrows-compress"></span> DE / PARA
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



