<form class="form-horizontal clearfix" role="form" method="post" action="<?php echo base_url('nucleo/modulo/atualizar'); ?>" onsubmit="overlay(true)">
  <input type="hidden" name="<?php echo model_modulo::ID; ?>" id="id" value="<?php echo $modulo[model_modulo::ID]; ?>" />
  <fieldset class="col-sm-6 col-sm-offset-3 well">
    <div class="header">Novo Módulo</div>
    <div class="form-group">
      <label for="nome" class="col-sm-3 control-label">Nome</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nome" name="<?php echo model_modulo::NOME; ?>" placeholder="Nome do Módulo" required value="<?php echo $modulo[model_modulo::NOME]; ?>" />
      </div>
    </div>

    <div class="form-group">
      <label for="pai" class="col-sm-3 control-label">Pai</label>
      <div class="col-sm-9">
        <select class="form-control" id="pai" name="<?php echo model_modulo::PAI; ?>">
          <option value="N"> -- </option>
          <?php foreach ($modulos as $value) : ?>
            <option value="<?php echo $value[model_modulo::ID]; ?>" 
                    <?php echo $modulo[model_modulo::PAI] == $value[model_modulo::ID] ? 'selected' : ''; ?>>
                      <?php echo $value[model_modulo::NOME]; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="ordem" class="col-sm-3 control-label">Ordem</label>
      <div class="col-sm-9">
        <input type="number" class="form-control" id="ordem" name="<?php echo model_modulo::ORDEM; ?>" placeholder="Ordem no Menu" value="<?php echo $modulo[model_modulo::ORDEM]; ?>" />
      </div>
    </div>

    <div class="form-group">
      <label for="privilegio" class="col-sm-3 control-label">Privilegio Mínimo</label>
      <div class="col-sm-9">
        <select class="form-control" id="privilegio" name="<?php echo model_modulo::PRIVILEGIO; ?>">
          <?php foreach ($privilegios as $value) : ?>
            <option value="<?php echo $value[model_privilegio::ID]; ?>"
                    <?php echo $modulo[model_modulo::PRIVILEGIO] == $value[model_privilegio::ID] ? 'selected' : ''; ?>>
              <?php echo $value[model_privilegio::DESCRICAO]; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="icon" class="col-sm-3 control-label">Ícone</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="icon" name="<?php echo model_modulo::ICON; ?>" placeholder="Ícone do Módulo" value="<?php echo $modulo[model_modulo::ICON]; ?>" />
      </div>
    </div>
    <div class="form-group">
      <label for="url" class="col-sm-3 control-label">URL</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="url" name="<?php echo model_modulo::URL; ?>" placeholder="URL do Módulo" required value="<?php echo $modulo[model_modulo::URL]; ?>" />
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-default btn-lg" onclick="javascript:history.back()">Cancelar</button>
          <button type="submit" class="btn btn-primary btn-lg">Atualizar</button>
        </div>
      </div>
    </div>
  </fieldset>
</form>