<div class="well clearfix">
  <div class="pull-right">
    <a href="<?php echo base_url('nucleo/modulo/novo'); ?>" class="btn btn-success btn-lg rnd tooltips" title="Add Módulo">
      <i class="fa fa-arrow-circle-up"></i> Novo Módulo
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
          <th>PAI</th>
          <th>ORDEM</th>
          <th>PRIVILEGIO</th>
          <th>ÍCONE</th>
          <th>URL</th>
          <th width="100">AÇÕES</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($modulo as $row): ?>
          <tr>
            <td><?php echo str_pad($row[model_modulo::ID], 3, '0', STR_PAD_LEFT); ?></td>
            <td><?php echo $row['NOMEMODULO']; ?></td>
            <td><?php echo $row['NOMEPAI']; ?></td>
            <td><?php echo $row[model_modulo::ORDEM]; ?></td>
            <td><?php echo $row[model_privilegio::DESCRICAO]; ?></td>
            <td><i class="<?php echo $row[model_modulo::ICON]; ?>" style="font-size: 3em;"></i></td>
            <td><?php echo $row[model_modulo::URL]; ?></td>
            <td>
              <div class="btn-group">
                <a href="<?php echo site_url('nucleo/modulo/editar/' . $row[model_modulo::ID]); ?>" class="btn btn-primary btn-lg tooltips" title="Editar">
                  <span class="glyphicon glyphicon-edit"></span>
                </a>
                <button type="button" onclick="deletar('<?php echo site_url('nucleo/modulo/deletar'); ?>', '<?php echo $row[model_modulo::ID]; ?>', '<?php echo site_url('nucleo/modulo'); ?>');" class="btn btn-danger btn-lg tooltips" title="Deletar">
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