<form id="formulario" class="form-horizontal" role="form" method="post" action="<?php echo base_url('importacoes/tipo/atualizar'); ?>" onsubmit="overlay(true)">
  <fieldset class="col-sm-6 col-sm-offset-3 well">
    <div class="header">Novo Tipo</div>
    <div class="form-group">
      <label for="nome" class="col-sm-3 control-label">Descrição</label>
      <div class="col-sm-9">
        <input type="hidden" name="<?php echo model_tipo_de_para::ID; ?>" value="<?php echo $tipo[model_tipo_de_para::ID]; ?>" />
        <input type="text" class="form-control" id="nome" name="<?php echo model_tipo_de_para::DESCRICAO; ?>" placeholder="Descrição do Tipo" required autofocus value="<?php echo $tipo[model_tipo_de_para::DESCRICAO]; ?>" />
      </div> 
    </div>
    <div class="form-group">
      <label for="icon" class="col-sm-3 control-label">Tabela RM</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="icon" name="<?php echo model_tipo_de_para::TABELA_RM; ?>" placeholder="Nome da Tabela no RM" required value="<?php echo $tipo[model_tipo_de_para::TABELA_RM]; ?>" />
      </div>
    </div>
    <div class="form-group">
      <label for="codigo" class="col-sm-3 control-label">Campo Código</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="codigo" name="<?php echo model_tipo_de_para::CODIGO; ?>" placeholder="Campo código da Tabela no RM" required value="<?php echo $tipo[model_tipo_de_para::CODIGO]; ?>"/>
      </div>
    </div>    
    <div class="form-group">
      <label for="nome" class="col-sm-3 control-label">Campo Nome</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nome" name="<?php echo model_tipo_de_para::NOME; ?>" placeholder="Campo Nome da Tabela no RM" required value="<?php echo $tipo[model_tipo_de_para::NOME]; ?>" />
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