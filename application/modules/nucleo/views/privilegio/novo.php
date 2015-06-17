<form id="formulario" class="form-horizontal" role="form" method="post" action="<?php echo base_url('nucleo/privilegio/cadastrar'); ?>" onsubmit="overlay(true)">
  <fieldset class="col-sm-6 col-sm-offset-3 well">
    <div class="header">Novo Privilégio</div>
    <div class="form-group">
      <label for="cod" class="col-sm-3 control-label">Código</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="cod" name="<?php echo model_privilegio::ID; ?>" placeholder="Código do Privilégio" required autofocus maxlength="5" />
      </div>
    </div>
    <div class="form-group">
      <label for="desc" class="col-sm-3 control-label">Descrição</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="desc" name="<?php echo model_privilegio::DESCRICAO; ?>" placeholder="Descrição do Privilégio" required />
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
