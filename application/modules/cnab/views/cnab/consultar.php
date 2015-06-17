<div class="container">
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed datatable">
      <thead>
        <tr>
          <th>FOLHA</th>
          <th>PROCESSO</th>
          <th>EMPRESA</th>
          <th>TP. PAGTO</th>
          <th>COMPETÊNCIA</th>
          <th>TOTAL</th>
          <th width='100'>VER</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($consultar as $row): ?>
          <tr>
            <td><?php echo str_pad($row['FOLHA'], 4, '0', STR_PAD_LEFT); ?></td>
            <td><?php echo str_pad($row['PROCESSO'], 4, '0', STR_PAD_LEFT); ?></td>
            <td><?php echo $row['EMPRESA']; ?></td>
            <td><?php echo $row['OPERACAO']; ?></td>
            <td><?php echo $row['COMPETENCIA']; ?></td>
            <td><?php echo 'R$ ' . number_format(str_replace(',', '.', $row['VALOR']), 2, ',', '.'); ?></td>
            <td>
              <?php if ($user['NU_PRIVILEGIO'] >= 90): ?>
                <div class="btn-group">
                <?php endif; ?>
                <a href="<?php echo site_url(); ?>cnab/listar/<?php echo $row['PROCESSO']; ?>" class="btn btn-default">
                  <span class="glyphicon glyphicon-eye-open tooltips" title="Visualizar Processo"></span>
                </a>
                <?php if ($user['NU_PRIVILEGIO'] >= 90): ?>
                  <a onclick="deletar('<?php echo site_url('cnab/deletar/' . $row['PROCESSO']); ?>', '<?php echo site_url('cnab/consultar'); ?>');" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash tooltips" title="Deletar"></span>
                  </a>
                </div>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>

    </table>    
  </div>

</div> <!-- /container --> 