<div class="container">
  <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('tipo_operacao/cadastrar'); ?>">
    <fieldset class="col-sm-6 center col-lg-offset-3">
      <div class="form-group">
        <label for="nome" class="col-sm-3 control-label">Nome</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="nome" name="<?php echo Model_Tipo_Operacao::NOME; ?>" placeholder="Nome do Tipo de Operação" required />
        </div>
      </div>
      <div class="form-group">
        <label for="natureza" class="col-sm-3 control-label">Natureza</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="natureza" name="<?php echo Model_Tipo_Operacao::NATUREZA; ?>" placeholder="Código da Natureza da Transação" required />
        </div>
      </div>
      <div class="form-group">
        <label for="tipo" class="col-sm-3 control-label">Tipo</label>
        <div class="col-sm-9">
          <select class="form-control" id="tipo" name="<?php echo Model_Tipo_Operacao::TIPO; ?>" required >
            <option value="">Selecione uma opção</option>
            <?php foreach ($tipo as $value) : ?>
              <option value="<?php echo $value['X5_CHAVE']; ?>"><?php echo $value['X5_DESCRI']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-9">
          <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
      </div>
    </fieldset>
  </form>
  <xmp>
  </xmp>
</div> <!-- /container --> 