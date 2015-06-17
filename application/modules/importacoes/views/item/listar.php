<div class="well clearfix">

  <div class="pull-right">
    <a href="<?php echo base_url('importacoes/item/novo'); ?>" class="btn btn-success btn-lg rnd tooltips" accesskey="n" title="Add Item">
      <i class="fa fa-arrow-circle-up"></i> Novo Item
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
          <th>NOME</th>
          <th>VERSÃO</th>
          <th>DELIMITADOR</th>
          <th width="100">AÇÕES</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($item as $row): ?>
          <tr>
            <td><?php echo str_pad($row[model_item::ID], 4, '0', STR_PAD_LEFT); ?></td>
            <td><?php echo $row[model_item::NOME]; ?></td>
            <td><?php echo $row[model_item::VERSAO]; ?></td>
            <td><?php echo $row[model_item::DELIMITADOR]; ?></td>
            <td>
              <div class="btn-group">
                <a href="<?php echo site_url('importacoes/item/editar/' . $row[model_item::ID]); ?>" class="btn btn-primary btn-lg tooltips" title="Editar">
                  <span class="glyphicon glyphicon-edit"></span>
                </a>
                <button type="button" onclick="deletar('<?php echo site_url('importacoes/item/deletar'); ?>', '<?php echo $row[model_item::ID]; ?>', '<?php echo site_url('importacoes/item'); ?>');" class="btn btn-danger btn-lg tooltips" title="Deletar">
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
