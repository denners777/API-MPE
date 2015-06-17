<?php echo form_open_multipart('importacoes/ficha_financeira/router', 'role="form" class="form-horizontal" onsubmit="overlay(true);"'); ?>
<fieldset class="col-sm-6 col-sm-offset-3 well">
  <legend>Gerar</legend>

  <div class="form-group">
    <label for="empresa" class="col-sm-3 control-label">Empresa</label>
    <div class="col-sm-9">
      <select class="form-control" id="empresa" name="empresa" required autofocus>
        <option value="">Escolha uma opção</option>
        <?php foreach ($empresas as $row) : ?>
          <option value="<?php echo $row[model_empresa::ID]; ?>"><?php echo $row[model_empresa::DESCRICAO]; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="arquivo" class="col-sm-3 control-label">Arquivo</label>
    <div class="col-sm-9">
      <input type="file" class="form-control" id="arquivo" name="file" placeholder="Arquivo" required />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <div class="btn-group pull-right">
        <button type="reset" class="btn btn-default btn-lg" onclick="javascript:history.back()">Cancelar</button>
        <button type="submit" class="btn btn-primary btn-lg">Gerar</button>
      </div>
    </div>
  </div>
</fieldset>
</form>