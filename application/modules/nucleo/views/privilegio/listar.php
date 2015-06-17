<div class="well clearfix">
  <div class="pull-right">
    <a href="<?php echo base_url('nucleo/privilegio/novo'); ?>" class="btn btn-success btn-lg rnd tooltips" title="Add Privilégio">
      <i class="fa fa-arrow-circle-up"></i> Novo Privilégio
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
          <th width="100">AÇÕES</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($privilegio as $row): ?>
          <tr>
            <td><?php echo $row[model_privilegio::ID] ?></td>
            <td><?php echo $row[model_privilegio::DESCRICAO] ?></td>
            <td>
              <div class="btn-group">
                <a href="<?php echo site_url('nucleo/privilegio/editar/' . $row[model_privilegio::ID]); ?>" class="btn btn-primary btn-lg tooltips" title="Editar">
                  <span class="glyphicon glyphicon-edit"></span>
                </a>
                <button type="button" onclick="deletar('<?php echo site_url('nucleo/privilegio/deletar'); ?>', '<?php echo $row[model_privilegio::ID]; ?>', '<?php echo site_url('nucleo/privilegio'); ?>');" class="btn btn-danger btn-lg tooltips" title="Deletar">
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