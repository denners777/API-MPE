<form id="formulario" class="form-horizontal" role="form" method="post" action="<?php echo base_url('importacoes/de_para/cadastrar'); ?>" onsubmit="overlay(true)">
  <fieldset class="col-sm-6 col-sm-offset-3 well">
    <legend>Novo DE / PARA</legend>
    <div class="form-group">
      <label for="tipo_importacoes" class="col-sm-3 control-label">Tipo</label>
      <div class="col-sm-9">
        <select class="form-control" id="tipo_importacoes" name="<?php echo model_de_para::TIPO; ?>" required autofocus>
            <option value="">Escolha uma opção</option>
          <?php foreach ($tipo as $row): ?>
            <option value="<?php echo $row[model_tipo_de_para::TABELA_RM]; ?>">
              <?php echo $row[model_tipo_de_para::DESCRICAO]; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="de" class="col-sm-3 control-label">DE</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="de" name="<?php echo model_de_para::DE; ?>" placeholder="O valor do DE " required />
      </div>
    </div>
    <div class="form-group">
      <label for="para" class="col-sm-3 control-label">PARA</label>
      <div class="col-sm-9">
        <select class="form-control" id="para_importacoes" name="<?php echo model_de_para::PARA; ?>" required>
          <option value="">Escolha um tipo</option>
        </select>
      </div>
    </div>
    
    <div class="form-group">
      <label for="descricao" class="col-sm-3 control-label">Descrição</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="descricao" name="<?php echo model_de_para::DESCRICAO; ?>" placeholder="Descrição" />
      </div>
    </div>
    
    <div class="form-group">
      <label for="var" class="col-sm-3 control-label">Variante</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="var" name="<?php echo model_de_para::VARIANTE; ?>" placeholder="A variante do DE/PARA (se houver)" />
      </div>
    </div>
    
    <div class="form-group">
      <label for="var" class="col-sm-3 control-label">Referência Variante</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="var" name="<?php echo model_de_para::REF; ?>" placeholder="A referência da variante do DE/PARA (se houver)" />
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