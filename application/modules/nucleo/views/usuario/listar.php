<div class="well clearfix">
  <form class="form-inline pull-left acerto" role="form" method="post" action="<?php echo base_url('nucleo/usuario'); ?>">
    <div class="form-group">
      <label class="sr-only" for="usuario">Usuario</label>
      <input type="text" class="form-control" id="usuario" placeholder="Usuário" name="usuario" />
      <button type="submit" class="btn btn-inverse">Buscar</button>
    </div>
  </form>

  <a href="<?php echo base_url('nucleo/usuario/novo'); ?>" class="btn btn-success tooltips pull-right" title="Add Usuário">
    <i class="fa fa-arrow-circle-up"></i> Novo Usuário
  </a>

  <br />
  <br />
  <br />
  <?php if (isset($usuario)): ?>
    <p class="text-muted">Registro da busca por: <?php echo $resultado == '' ? 'ALL' : $resultado; ?></p>
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover table-condensed datatable">
        <thead>
          <tr>
            <th>CHAPA</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>EMPRESA</th>
            <th>STATUS</th>
            <th width="100">AÇÕES</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($usuario as $row): ?>
            <tr>
              <td><?php echo $row[model_funcionario::CHAPA]; ?></td>
              <td><?php echo $row[model_funcionario::NOME]; ?></td>
              <td><?php echo $row[model_funcionario::EMAIL]; ?></td>
              <td><?php echo $row[model_empresa::DESCRICAO]; ?></td>
              <td><?php
                switch ($row[model_usuario::STATUS]) :
                  case 'D':
                    echo 'DESATIVADO';
                    break;
                  case 'A':
                    echo 'ATIVO';
                    break;
                  case 'I':
                    echo 'INATIVO';
                    break;
                  default :
                    echo 'NÃO ATIVOU';
                endswitch;
                ?></td>
              <td>
                <?php if ($row[model_usuario::STATUS] == 'A'): ?>
                  <div class="btn-group">
                    <a href="<?php echo site_url('nucleo/usuario/editar/' . $row[model_usuario::ID]); ?>" class="btn btn-primary tooltips" title="Editar">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <button type="button" onclick="action('<?php echo site_url('nucleo/usuario/desativar'); ?>', '<?php echo $row[model_usuario::ID]; ?>', '<?php echo site_url('nucleo/usuario'); ?>', 'desativar', 'desativado');" class="btn btn-info tooltips" title="Desativar">
                      <span class="glyphicon glyphicon-remove-circle"></span>
                    </button>
                  </div>
                <?php else: ?>
                  <div class="btn-group">
                    <button type="button" onclick="action('<?php echo site_url('nucleo/usuario/ativar'); ?>', '<?php echo $row[model_usuario::ID]; ?>', '<?php echo site_url('nucleo/usuario'); ?>', 'ativar', 'ativado');" class="btn btn-success tooltips" title="Ativar">
                      <span class="glyphicon glyphicon-exclamation-sign"></span>
                    </button>
                    <button type="button" onclick="action('<?php echo site_url('nucleo/usuario/deletar'); ?>', '<?php echo $row[model_usuario::ID]; ?>', '<?php echo site_url('nucleo/usuario'); ?>', 'deletar', 'deletado');" class="btn btn-danger tooltips" title="Deletar">
                      <span class="glyphicon glyphicon-trash"></span>
                    </button>
                  </div>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>