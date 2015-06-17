<form id="formulario" class="form-horizontal" role="form" method="post" action="<?php echo base_url('nucleo/usuario/atualizar'); ?>" onsubmit="overlay(true)">
  <fieldset class="col-sm-6 col-sm-offset-3 well">
    <div class="header">Editar Usuário</div>
    <input type="hidden" value="<?php echo $usuario[model_usuario::ID]; ?>" name="<?php echo model_usuario::ID; ?>" />
    <input type="hidden" value="<?php echo $usuario[model_funcionario::ID]; ?>" name="<?php echo model_funcionario::ID; ?>" />
    <input type="hidden" value="<?php echo $usuario[model_funcionario::CHAPA]; ?>" name="<?php echo model_funcionario::CHAPA; ?>" />
    <div class="form-group">
      <label for="chapa" class="col-sm-3 control-label">Chapa</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="chapa" name="" placeholder="Chapa do usuário" required value="<?php echo $usuario[model_funcionario::CHAPA]; ?>" disabled />
      </div>
    </div>
    <div class="form-group">
      <label for="senha" class="col-sm-3 control-label">Senha</label>
      <div class="col-sm-9">
        <input type="password" class="form-control" id="senha" name="<?php echo model_usuario::SENHA; ?>" placeholder="Digite uma nova senha" />
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-sm-3 control-label">E-mail</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="email" name="<?php echo model_funcionario::EMAIL; ?>" placeholder="E-mail do usuário" required value="<?php echo $usuario[model_funcionario::EMAIL]; ?>" />
      </div>
    </div>
    <div class="form-group">
      <label for="empresa" class="col-sm-3 control-label">Empresa</label>
      <div class="col-sm-9">
        <select class="form-control" id="empresa" name="<?php echo model_funcionario::EMPRESA; ?>" required>
          <option value="">Escolha uma opção</option>
          <?php foreach ($empresa as $row) : ?>
            <option value="<?php echo $row[model_empresa::ID]; ?>"
                    <?php echo $usuario[model_funcionario::EMPRESA] == $row[model_empresa::ID] ? 'selected' : ''; ?>>
              <?php echo $row[model_empresa::DESCRICAO]; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-default btn-lg" onclick="javascript:history.back()">Cancelar</button>
          <button type="submit" class="btn btn-primary btn-lg">Atualizar</button>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Outras Informações</h3>
      </div>
      <div class="panel-body">
        <div class="row">
          <dl class="col-sm-6">
            <dt>NOME:</dt>
            <dd><?php echo $usuario[model_funcionario::NOME]; ?></dd>
            <dt>ADMISSÃO:</dt>
            <dd><?php echo $usuario[model_funcionario::ADMISSAO]; ?></dd>
            <dt>FUNÇÃO:</dt>
            <dd><?php echo $usuario[model_funcionario::FUNCAO]; ?></dd>
            <dt>SEÇÃO:</dt>
            <dd><?php echo $usuario[model_funcionario::SECAO]; ?></dd>
          </dl>
          <dl class="col-sm-6">
            <dt>CPF:</dt>
            <dd><?php echo $usuario[model_funcionario::CPF]; ?></dd>
            <dt>DESCRIÇÃO SEÇÃO:</dt>
            <dd><?php echo $usuario[model_funcionario::DESCSECAO]; ?></dd>
            <dt>SITUAÇÃO:</dt>
            <dd><?php echo $usuario[model_funcionario::SITUACAO]; ?></dd>
            <dt>TIPO:</dt>
            <dd><?php echo $usuario[model_funcionario::TIPO]; ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </fieldset>
</form>