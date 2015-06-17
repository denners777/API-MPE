<div class="well clearfix">
  <form class="form-inline pull-left" role="form" method="post" action="<?php echo base_url('consulta/home/fornecedores') ?>" onsubmit="overlay(true)">
    <div class="form-group">
      <label class="sr-only" for="fornecedor">Fornecedor</label>
      <input type="text" class="form-control" id="fornecedor" name="fornecedor" placeholder="Pesquisar Fornecedor" autofocus />
      <button type="submit" class="btn btn-inverse btn-lg">Buscar</button>
    </div>
  </form>
  <?php if (isset($qtdFornecedor)) : ?>
    <div class="pull-right">
      <p class="text-center">
        Nº de fornecedores cadastrados: 
        <span class="text-info">
          <?php echo number_format($qtdFornecedor, 0, ',', '.'); ?>
        </span>
      </p>
    </div>
  <?php endif; ?>
  <br />
  <br />
  <br />
  <?php if (isset($fornecedores)): ?>
    <p class="text-muted">Registros de busca por: <?php echo $resultado == '' ? 'ALL' : $resultado; ?></p>
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover table-condensed datatable">
        <thead>
          <tr>
            <th>CÓDIGO</th>
            <th>LOJA</th>
            <th>RAZÃO SOCIAL</th>
            <th>CPF/CNPJ</th>
            <th>ESTADO</th>
            <th>MUNICÍPIO</th>
            <th>BLOQUEADO?</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($fornecedores as $row): ?>
            <tr>
              <td align="center"><?php echo $row['A2_COD']; ?></td>
              <td align="center"><?php echo $row['A2_LOJA']; ?></td>
              <td><?php echo $row['A2_NOME']; ?></td>
              <td align="center"><?php echo $row['A2_CGC']; ?></td>
              <td align="center"><?php echo $row['A2_EST']; ?></td>
              <td><?php echo $row['A2_MUN']; ?></td>
              <td align="center"><?php echo $row['BLOQ']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="6"></th>
            <th>
        <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('consulta/home/writeXls/'); ?>" target="_blank">
          <input type="hidden" value='<?php echo $resultado; ?>' name="busca" />
          <input type="hidden" value='fornecedor' name="tipo" />
          <button type="submit" class="btn btn-link green btn-xs tooltips" title="Download">
            <i class="fa fa-download"></i> Exportar
          </button>
        </form>
        </th>
        </tr>
        </tfoot>
      </table>
    </div>
  <?php endif; ?>
</div>
