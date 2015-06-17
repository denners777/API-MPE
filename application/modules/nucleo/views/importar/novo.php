<?php echo form_open_multipart('nucleo/importacao_funcionarios/importar', 'role="form" class="form-horizontal" onsubmit="overlay(true);"'); ?>
<fieldset class="col-sm-6 col-sm-offset-3 well">
  <div class="header">Importar Funcionários</div>
  <div class="form-group">
    <label for="empresa" class="col-sm-3 control-label">Empresa</label>
    <div class="col-sm-9">
      <select class="form-control" id="empresa" name="empresa" required autofocus>
        <option value="">Selecione a Empresa</option>
        <?php foreach ($empresa as $row) : ?>
          <option value="<?php echo $row[model_empresa::ID]?>"><?php echo $row[model_empresa::DESCRICAO]?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="file" class="col-sm-3 control-label">Arquivo</label>
    <div class="col-sm-9">
      <input type="file" class="form-control" id="file" name="file" required />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <div class="btn-group pull-right">
        <button type="reset" class="btn btn-default btn-lg" onclick="javascript:history.back()">Cancelar</button>
        <button type="submit" class="btn btn-primary btn-lg">Importar</button>
      </div>
    </div>
  </div>
</fieldset>
</form>