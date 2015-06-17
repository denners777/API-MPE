<h3 class="text-center">Busca - Protheus</h3>
<p class="text-center">Selecione a opção para realizar a busca:</p>
<!--Fornecedor-->
<div class="col-sm-5 col-sm-offset-1">
  <div class="well">
    <form name="form" id="form" role="form" class="form-horizontal" method="POST" action="<?php echo base_url('consulta/home/fornecedores'); ?>" onsubmit="overlay(true)">

      <div class="form-group">
        <label for="fornecedor" class="control-label col-sm-3">Fornecedor</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="fornecedor" name="fornecedor" placeholder="Pesquisar" autofocus required />
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <input type="submit" value="Pesquisar Fornecedor" class="btn btn-success btn-lg tooltips" />
        </div>
      </div>
      <?php if (isset($qtdFornecedor)) : ?>
        <div class="form-group">
          <p class="text-center">
            Nº de fornecedores cadastrados: 
            <span class="text-info">
              <?php echo number_format($qtdFornecedor, 0, ',', '.'); ?>
            </span>
          </p>
          <p>&nbsp;</p>
        </div>
      <?php endif; ?>
    </form>
  </div>
</div>
<!--Fornecedor-->
<!--Produtos e Serviços-->
<div class="col-sm-5">
  <div class="well">
    <form name="form" id="form" role="form" class="form-horizontal" method="POST" action="<?php echo base_url('consulta/home/produtos'); ?>" onsubmit="overlay(true)">
      <div class="form-group">
        <label for="produtos" class="control-label col-sm-3">Produtos e Serviços</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="produtos" name="produto" placeholder="Pesquisar" required />
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <input type="submit" value="Pesquisar Produtos" class="btn btn-success btn-lg tooltips" />
        </div>
      </div>
      <?php if (isset($qtdProduto)) : ?>
        <div class="form-group">
          <p class="text-center">
            Nº de produtos cadastrados: 
            <span class="text-info">
              <?php echo number_format($qtdProduto, 0, ',', '.'); ?>
            </span>
          </p>
        <?php endif; ?>
        <?php if (isset($qtdServico)) : ?>
          <p class="text-center">
            Nº de serviços cadastrados: 
            <span class="text-info">
              <?php echo number_format($qtdServico, 0, ',', '.'); ?>
            </span>
          </p>
        </div>
      <?php endif; ?>
    </form>
  </div>
</div>
<!--Produtos e Serviços-->

