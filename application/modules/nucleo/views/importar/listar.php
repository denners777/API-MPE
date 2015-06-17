<div class="well clearfix">
  <form class="form-inline pull-left" role="form" method="post" action="<?php echo base_url('nucleo/importacao_funcionarios'); ?>">
    <div class="form-group">
      <label class="sr-only" for="busca">Pesquisa</label>
      <input type="text" class="form-control" id="busca" placeholder="Digite sua pesquisa" name="busca" />
      <button type="submit" class="btn btn-inverse btn-lg">Buscar</button>
    </div>
  </form>
  <div class="pull-right">
    <a href="<?php echo base_url('nucleo/importacao_funcionarios/novo'); ?>" class="btn btn-success btn-lg rnd tooltips" title="Importar Funcionários">
      <i class="glyphicon glyphicon-import"></i> Importar Funcionários
    </a>
  </div>
  <br />
  <br />
  <br />
  <?php if (isset($funcionarios)): ?>
    <p class="text-muted">Registro da busca por: <?php echo $resultado == '' ? 'ALL' : $resultado; ?></p>
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover table-condensed datatable">
        <thead>
          <tr>
            <th>ID</th>
            <th>CHAPA</th>
            <th>NOME</th>
            <th>CPF</th>
            <th>SEÇÃO</th>
            <th>SITUAÇÃO</th>
            <th>ADMISSÂO</th>
            <th>CARGO</th>
            <th>EMPRESA</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($funcionarios as $row): ?>
            <tr>
              <td><?php echo str_pad($row[model_importacao_funcionarios::ID], 5, '0', STR_PAD_LEFT); ?></td>
              <td><?php echo $row[model_importacao_funcionarios::CHAPA]; ?></td>
              <td><?php echo $row[model_importacao_funcionarios::NOME]; ?></td>
              <td><?php echo $row[model_importacao_funcionarios::CPF]; ?></td>
              <td><?php echo $row[model_importacao_funcionarios::SECAO]; ?></td>
              <td><?php echo $row[model_importacao_funcionarios::SITUACAO]; ?></td>
              <td><?php echo $row[model_importacao_funcionarios::ADMISSAO]; ?></td>
              <td><?php echo $row[model_importacao_funcionarios::CARGO]; ?></td>
              <td><?php echo $row[model_empresa::DESCRICAO]; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>