<div class="well clearfix">
  <form class="form-inline pull-left" role="form" method="post" action="<?php echo base_url('consulta/home/produtos') ?>" onsubmit="overlay(true)">
    <div class="form-group">
      <label class="sr-only" for="produto">Produto ou Serviço</label>
      <input type="text" class="form-control" id="produto" name="produto" placeholder="Pesquisar Produto" autofocus required />
      <button type="submit" class="btn btn-inverse btn-lg">Buscar</button>
    </div>
  </form>
  <?php if (isset($qtdFornecedor)) : ?>
    <div class="pull-right">
      <p class="text-center">
        Nº de produtos cadastrados: 
        <span class="text-info">
          <?php echo number_format($qtdProduto, 0, ',', '.'); ?>
        </span>
      </p>
      <p class="text-center">
        Nº de serviços cadastrados: 
        <span class="text-info">
          <?php echo number_format($qtdServico, 0, ',', '.'); ?>
        </span>
      </p>
    </div>
  <?php endif; ?>
  <br />
  <br />
  <br />
  <?php if (isset($produtos)): ?>
    <p class="text-muted">Registros de busca por: <?php echo $resultado == '' ? 'ALL' : $resultado; ?></p>
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover table-condensed datatable">
        <thead>
          <tr>
            <th>CÓDIGO</th>
            <th>DESCRIÇÃO PRODUTO</th>
            <th>DESCRIÇÃO PRODUTO COMPLETA</th>
            <th>GRUPO</th>
            <th>UN.</th>
            <th>NCM</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($produtos as $row): ?>
            <tr>
              <td align="center"><?php echo $row['B1_COD']; ?></td>
              <td><?php echo $row['B1_DESC']; ?></td>
              <td><?php echo $row['B5_CEME']; ?></td>
              <td align="center"><?php echo $row['BM_DESC']; ?></td>
              <td><?php echo $row['B1_UM']; ?></td>
              <td><?php echo $row['B1_POSIPI']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="5"></th>
            <th>
        <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('consulta/home/writeXls/'); ?>" target="_blank">
          <input type="hidden" value='<?php echo $resultado; ?>' name="busca" />
          <input type="hidden" value='produto' name="tipo" />
          <button type="submit" class="btn btn-link btn-xs tooltips" title="Download">
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
