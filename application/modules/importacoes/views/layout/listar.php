<div class="well clearfix">

  <div class="pull-right">
    <a href="<?php echo base_url('importacoes/layout/novo'); ?>" class="btn btn-success btn-lg rnd tooltips" accesskey="n" title="Add Layout">
      <i class="fa fa-arrow-circle-up"></i> Novo Layout
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
          <th>ITEM</th>
          <th>QTD. ITENS</th>
          <th width="100">AÇÕES</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($layout as $row): ?>
          <tr>
            <td><?php echo str_pad($row['ID'], 4, '0', STR_PAD_LEFT); ?></td>
            <td><?php echo $row['ITEM']; ?></td>
            <td><?php echo $row['QTD']; ?></td>
            <td>
              <div class="btn-group">
                <a href="<?php echo site_url('importacoes/layout/editar/' . $row['ID']); ?>" class="btn btn-primary btn-lg tooltips" title="Editar">
                  <span class="glyphicon glyphicon-edit"></span>
                </a>
                <button type="button" onclick="deletar('<?php echo site_url('importacoes/layout/deletar'); ?>', '<?php echo $row['ID']; ?>', '<?php echo site_url('importacoes/layout'); ?>');" class="btn btn-danger btn-lg tooltips" title="Deletar">
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
