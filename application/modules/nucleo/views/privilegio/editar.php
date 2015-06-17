<form class="form-horizontal clearfix" role="form" method="post" action="<?php echo base_url('nucleo/privilegio/atualizar'); ?>" onsubmit="overlay(true)">
  <input type="hidden" name="<?php echo model_privilegio::ID; ?>OLD" id="id" value="<?php echo $privilegio[model_privilegio::ID]; ?>" />
  <fieldset class="col-sm-6 col-sm-offset-3 well">
    <div class="header">Novo Privilégio</div>
    <div class="form-group">
      <label for="cod" class="col-sm-3 control-label">Código</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="cod" name="<?php echo model_privilegio::ID; ?>" placeholder="Código do Privilégio" required autofocus  maxlength="5" value="<?php echo $privilegio[model_privilegio::ID]; ?>" />
      </div>
    </div>
    <div class="form-group">
      <label for="desc" class="col-sm-3 control-label">Descrição</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="desc" name="<?php echo model_privilegio::DESCRICAO; ?>" placeholder="Descrição do Privilégio" required value="<?php echo $privilegio[model_privilegio::DESCRICAO]; ?>" />
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