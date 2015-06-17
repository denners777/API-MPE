<form id="formulario" class="form-horizontal" role="form" method="post" action="<?php echo base_url('nucleo/usuario/cadastrar'); ?>" onsubmit="overlay(true)">
  <fieldset class="col-sm-6 col-sm-offset-3 well">
    <div class="header">Novo Usuário</div>
    <div class="form-group">
      <label for="empresa" class="col-sm-3 control-label">Empresa</label>
      <div class="col-sm-9">
        <select class="form-control" id="empresa_usu" name="<?php echo model_funcionario::EMPRESA; ?>" required>
          <option value="">Escolha uma opção</option>
          <?php foreach ($empresa as $row) : ?>
            <option value="<?php echo $row[model_empresa::ID]; ?>"><?php echo $row[model_empresa::DESCRICAO]; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="chapa_usu" class="col-sm-3 control-label">Chapa</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="chapa_usu" name="<?php echo model_funcionario::CHAPA; ?>" placeholder="Chapa do usuário" required />
      </div>
    </div>
    <div class="form-group">
      <label for="senha" class="col-sm-3 control-label">Senha</label>
      <div class="col-sm-9">
        <input type="password" class="form-control" id="senha" name="<?php echo model_usuario::SENHA; ?>" placeholder="Senha para a entrada no sistema" required />
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-sm-3 control-label">E-mail</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="email" name="<?php echo model_funcionario::EMAIL; ?>" placeholder="E-mail do usuário" required />
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-default btn-lg" onclick="javascript:history.back()">Cancelar</button>
          <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
        </div>
      </div>
    </div>
    <div id="info_not_found">
      <p class="text-danger text-center">Dados do funcionário não encontrados.</p>
    </div>
    <div class="panel panel-default" id="info_usuario">
      <div class="panel-heading">
        <h3 class="panel-title">Informações do Usuário</h3>
      </div>
      <div class="panel-body">
        <div class="row content">
          <dl class="col-sm-6">
            <dt>NOME:</dt>
            <dd id="nome"></dd>
            <dt>ADMISSÃO:</dt>
            <dd id="admissao"></dd>
            <dt>FUNÇÃO:</dt>
            <dd id="funcao"></dd>
            <dt>SEÇÃO:</dt>
            <dd id="secao"></dd>
          </dl>
          <dl class="col-sm-6">
            <dt>CPF:</dt>
            <dd id="cpf"></dd>
            <dt>DESCRIÇÃO SEÇÃO:</dt>
            <dd id="descricao"></dd>
            <dt>SITUAÇÃO:</dt>
            <dd id="situacao"></dd>
            <dt>TIPO:</dt>
            <dd id="tipo"></dd>
          </dl>
        </div>
      </div>
    </div>

  </fieldset>
</form>