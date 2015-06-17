<form id="formulario" class="form-horizontal" role="form" method="post" action="<?php echo base_url('importacoes/item/cadastrar'); ?>" onsubmit="overlay(true)">
  <fieldset class="col-sm-6 col-sm-offset-3 well">
    <div class="header">Novo Item</div>
    <div class="form-group">
      <label for="nome" class="col-sm-3 control-label">Nome</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nome" name="<?php echo model_item::NOME; ?>" placeholder="Nome" required autofocus />
      </div>
    </div>
    
    <div class="form-group">
      <label for="versao" class="col-sm-3 control-label">Versão</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="versao" name="<?php echo model_item::VERSAO; ?>" placeholder="Versão Ex.: 1.0" />
      </div>
    </div>
    
    <div class="form-group">
      <label for="delimitador" class="col-sm-3 control-label">Delimitador</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="delimitador" name="<?php echo model_item::DELIMITADOR; ?>" placeholder="Delimitador Ex.: ;" />
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