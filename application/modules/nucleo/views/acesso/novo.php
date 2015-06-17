<form id="formulario" class="form-horizontal" role="form" method="post" action="<?php echo base_url('nucleo/acesso/cadastrar'); ?>" onsubmit="overlay(true)">
  <fieldset class="col-sm-6 col-sm-offset-3 well">
    <div class="header">Novo Modulo</div>
    <div class="form-group">
      <label for="usuarios" class="col-sm-3 control-label">Usuario</label>
      <div class="col-sm-9">
        <input type="hidden" id="usuarios" name="<?php echo model_acesso::USUARIOACESSO; ?>" />
        <input type="text" id="usuarios_view" class="form-control" placeholder="Digite o nome ou chapa do funcionário" />
        <div style="position: relative">
          <div id="hide_list"></div>
        </div>
        <div class="checkbox">
          <label>
            <input name="todos_usuarios" id="todos_usuarios" type="checkbox"> Todos
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="modulos" class="col-sm-3 control-label">Módulos</label>
      <div class="col-sm-9">
        <select id="modulos" name="<?php echo model_acesso::MODULO; ?>" class="form-control" required>
          <option value="">Selecione o Módulo</option>
          <?php foreach ($modulos as $value) :
            ?>
            <option value="<?php echo $value[model_modulo::ID]; ?>">
              <?php echo $value[model_modulo::NOME]; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="privilegios" class="col-sm-3 control-label">Privilégios</label>
      <div class="col-sm-9">
        <select id="privilegios" name="<?php echo model_acesso::PRIVILEGIO; ?>" class="form-control" required>
          <option value="">Selecione o Privilégio</option>
          <?php foreach ($privilegios as $value) :
            ?>
            <option value="<?php echo $value[model_privilegio::ID]; ?>">
              <?php echo $value[model_privilegio::DESCRICAO]; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-default btn-lg" onclick="javascript:history.back()">Cancelar</button>
          <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
        </div>
      </div>
    </div>
  </fieldset>
</form>