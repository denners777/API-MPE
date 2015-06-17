<form class="form-horizontal clearfix" role="form" method="post" action="<?php echo base_url('nucleo/empresa/atualizar'); ?>" onsubmit="overlay(true)">
  <input type="hidden" name="<?php echo model_empresa::ID; ?>" id="id" value="<?php echo $empresa[model_empresa::ID]; ?>" />
  <fieldset class="col-sm-6 col-sm-offset-3 well">
    <div class="header">Novo Empresa</div>
    <div class="form-group">
      <label for="cod" class="col-sm-3 control-label">Código</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="cod" name="<?php echo model_empresa::CODEMPRESA; ?>" placeholder="Código da Empresa" required autofocus  maxlength="5" value="<?php echo $empresa[model_empresa::CODEMPRESA]; ?>" />
      </div>
    </div>
    <div class="form-group">
      <label for="desc" class="col-sm-3 control-label">Nome</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="desc" name="<?php echo model_empresa::DESCRICAO; ?>" placeholder="Nome da Empresa" required value="<?php echo $empresa[model_empresa::DESCRICAO]; ?>" />
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