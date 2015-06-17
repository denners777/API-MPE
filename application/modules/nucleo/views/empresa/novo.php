<form id="formulario" class="form-horizontal" role="form" method="post" action="<?php echo base_url('nucleo/empresa/cadastrar'); ?>" onsubmit="overlay(true)">
  <fieldset class="col-sm-6 col-sm-offset-3 well">
    <div class="header">Nova Empresa</div>
    <div class="form-group">
      <label for="cod" class="col-sm-3 control-label">Código</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="cod" name="<?php echo model_empresa::CODEMPRESA; ?>" placeholder="Código da Empresa" required autofocus />
      </div>
    </div>
    <div class="form-group">
      <label for="desc" class="col-sm-3 control-label">Nome</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="desc" name="<?php echo model_empresa::DESCRICAO; ?>" placeholder="Nome da Empresa" required />
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
