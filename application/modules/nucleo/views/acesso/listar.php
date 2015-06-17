<div class="well clearfix">
  <form class="form-inline pull-left" role="form" method="post" action="<?php echo base_url('nucleo/acesso'); ?>">
    <div class="form-group">
      <label class="sr-only" for="usuario">Usuario</label>
      <input type="text" class="form-control" id="usuario" placeholder="Usuário" name="<?php echo model_usuario::AD ?>" />
      <button type="submit" class="btn btn-inverse btn-lg">Buscar</button>
    </div>
  </form>

  <a href="<?php echo base_url('nucleo/acesso/novo'); ?>" class="btn btn-success btn-lg tooltips pull-right" title="Add Acesso">
    <i class="fa fa-arrow-circle-up"></i> Novo Acesso
  </a>

  <br />
  <br />
  <br />
  <?php if (isset($acesso)): ?>
    <p class="text-muted">Registro da busca por: <?php echo $resultado == '' ? 'ALL' : $resultado; ?></p>
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover table-condensed datatable">
        <thead>
          <tr>
            <th>ID</th>
            <th>USUARIO</th>
            <th>MODULO</th>
            <th>PRIVILÉGIO</th>
            <th width="100">AÇÕES</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($acesso as $row): ?>
            <tr>
              <td><?php echo str_pad($row[model_acesso::ID], 6, '0', STR_PAD_LEFT); ?></td>
              <td><?php echo $row['NOME']; ?></td>
              <td><?php echo $row['MODULO']; ?></td>
              <td><?php echo $row['PRIVILEGIO']; ?></td>
              <td>
                <div class="btn-group">
                  <a href="<?php echo site_url('nucleo/acesso/editar/' . $row[model_acesso::ID]); ?>" class="btn btn-primary btn-lg tooltips" title="Editar">
                    <span class="glyphicon glyphicon-edit"></span>
                  </a>
                  <button type="button" onclick="deletar('<?php echo site_url('nucleo/acesso/deletar'); ?>', '<?php echo $row[model_acesso::ID]; ?>', '<?php echo site_url('nucleo/acesso'); ?>');" class="btn btn-danger btn-lg tooltips" title="Deletar">
                    <span class="glyphicon glyphicon-trash"></span>
                  </button>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>