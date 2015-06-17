<div class="well clearfix">
  <div class="pull-right">
    <a href="<?php echo base_url('importacoes/tipo/novo'); ?>" class="btn btn-success btn-lg rnd tooltips" title="Add Tipo">
      <i class="fa fa-arrow-circle-up"></i> Novo Tipo
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
          <th>DESCRIÇÃO</th>
          <th>TABELA RM</th>
          <th>C. CODIGO</th>
          <th>C. NOME</th>
          <th width="100">AÇÕES</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tipo as $row): ?>
          <tr>
            <td><?php echo str_pad($row[model_tipo_de_para::ID], 4, '0', STR_PAD_LEFT); ?></td>
            <td><?php echo $row[model_tipo_de_para::DESCRICAO]; ?></td>
            <td><?php echo $row[model_tipo_de_para::TABELA_RM]; ?></td>
            <td><?php echo $row[model_tipo_de_para::CODIGO]; ?></td>
            <td><?php echo $row[model_tipo_de_para::NOME]; ?></td>
            <td>
              <div class="btn-group">
                <a href="<?php echo site_url('importacoes/tipo/editar/' . $row[model_tipo_de_para::ID]); ?>" class="btn btn-primary tooltips" title="Editar">
                  <span class="glyphicon glyphicon-edit"></span>
                </a>
                <button type="button" onclick="deletar('<?php echo site_url('importacoes/tipo/deletar'); ?>', '<?php echo $row[model_tipo_de_para::ID]; ?>', '<?php echo site_url('importacoes/tipo'); ?>');" class="btn btn-danger tooltips" title="Deletar">
                  <span class="glyphicon glyphicon-trash"></span>
                </button>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
