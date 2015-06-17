<div class="well clearfix">
  <form class="form-inline pull-left" role="form" method="post" action="<?php echo base_url('importacoes/de_para'); ?>">
    <div class="form-group">
      <label class="sr-only" for="tipo">Tipo</label>
      <select class="form-control" id="tipo" name="<?php echo model_de_para::TIPO ?>">
        <?php foreach ($tipo as $row): ?>
          <option value="<?php echo $row[model_tipo_de_para::ID]; ?>" <?php echo ($resultado == $row[model_tipo_de_para::ID]) ? 'selected' : ''; ?>>
            <?php echo $row[model_tipo_de_para::DESCRICAO]; ?>
          </option>
        <?php endforeach; ?>
        <option value="ALL">TODOS</option>
      </select>
      <button type="submit" class="btn btn-inverse btn-lg">Buscar</button>
    </div>
  </form>

  <div class="pull-right">
    <a href="<?php echo base_url('importacoes/de_para/novo'); ?>" class="btn btn-success btn-lg rnd tooltips" title="Add DE / PARA">
      <i class="fa fa-arrow-circle-up"></i> Novo DE / PARA
    </a>
  </div>
  <br />
  <br />
  <br />
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed datatable">
      <thead>
        <tr>
          <th>ID</th>
          <th>TIPO</th>
          <th>DE</th>
          <th>PARA</th>
          <th>VARIANTE</th>
          <th>REFERÊNCIA</th>
          <th>DESCRIÇÃO</th>
          <th width="100">AÇÕES</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($de_para !== false): ?>
          <?php foreach ($de_para as $row): ?>
            <tr>
              <td><?php echo str_pad($row[model_de_para::ID], 4, '0', STR_PAD_LEFT); ?></td>
              <td><?php echo $row[model_tipo_de_para::DESCRICAO]; ?></td>
              <td><?php echo $row[model_de_para::DE]; ?></td>
              <td><?php echo $row[model_de_para::PARA]; ?></td>
              <td><?php echo $row[model_de_para::VARIANTE]; ?></td>
              <td><?php echo $row[model_de_para::REF]; ?></td>
              <td><?php echo $row[model_de_para::DESCRICAO]; ?></td>
              <td>
                <div class="btn-group">
                  <a href="<?php echo site_url('importacoes/de_para/editar/' . $row[model_de_para::ID]); ?>" class="btn btn-primary  btn-lgtooltips" title="Editar">
                    <span class="glyphicon glyphicon-edit"></span>
                  </a>
                  <button type="button" onclick="deletar('<?php echo site_url('importacoes/de_para/deletar'); ?>', '<?php echo $row[model_de_para::ID]; ?>', '<?php echo site_url('importacoes/de_para'); ?>');" class="btn btn-danger tooltips" title="Deletar">
                    <span class="glyphicon glyphicon-trash"></span>
                  </button>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
