<div class="well clearfix">
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed datatable">
      <thead>
        <tr>
          <th>ID</th>
          <th>LAYOUT</th>
          <th>EMPRESA</th>
          <th>REGISTROS</th>
          <th width="120">AÇÕES</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($linha as $row): ?>
          <tr>
            <td><?php echo str_pad($row['ID'], 4, '0', STR_PAD_LEFT); ?></td>
            <td><?php echo $row['ITEM']; ?></td>
            <td><?php echo $row['EMPRESA']; ?></td>
            <td><?php echo $row['QTD']; ?></td>
            <td>
              <div class="btn-group">
                <a href="<?php echo site_url('importacoes/arquivo/visualisar/' . $row['ID']); ?>" class="btn btn-primary btn-lg tooltips" title="Visualisar">
                  <span class="glyphicon glyphicon-eye-open"></span>
                </a>
                <a href="<?php echo site_url('importacoes/arquivo/geraArquivo/' . $row['ID'] . '/' . $row['ID_EMPRESA'] . '/' . retiraAcentos($row['ITEM'])); ?>" class="success tooltips" title="Download" target="_new">
                  <span class="glyphicon glyphicon glyphicon-cloud-download"></span>
                </a>
                <button type="button" onclick="deletar('<?php echo site_url('importacoes/arquivo/deletar'); ?>', '<?php echo $row['ID']; ?>', '<?php echo site_url('importacoes/arquivo'); ?>');" class="btn btn-danger btn-lg tooltips" title="Deletar">
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
