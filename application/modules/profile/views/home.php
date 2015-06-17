<div class="well clearfix">
  <span class="pull-left redondo">
    <i class="fi-torso-business large fa fa-5x fa-inverse"></i>
  </span>
  <h3 class="name pull-left clearfix"><?php echo $funcionario[model_funcionario::NOME]; ?></h3>
  <a href="javascript:;" class="btn btn-link pull-right" data-toggle="modal" data-target="#addDesc"><i class="fa fa-plus-circle"></i> Trocar senha</a>
  <div class="clearfix"></div>
</div>
<div class="profile">
  <div class="tab-content">
    <div class="tab-pane active" id="tab">
      <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 sales">
          <h5 class="sales text-muted">Módulos</h5>
          <ul class="list-group">
            <?php foreach ($menu_principal as $row): ?>
              <li class="list-group-item btn btn-link">
                <a href="<?php echo site_url($row[model_modulo::URL]); ?>" title="<?php echo $row[model_modulo::NOME]; ?>"class="btn btn-link">
                  <big style="font-size: 20px;"><i class="<?php echo $row[model_modulo::ICON]; ?>"></i></big> <?php echo $row[model_modulo::NOME]; ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 pull-right">
          <h5 class="sales text-muted">Descrição</h5>
          <p class="clearfix">
            <!--<a href="javascript:;" class="btn btn-link pull-right" data-toggle="modal" data-target="#addDesc"><i class="fa fa-plus-circle"></i> Editar Descrição</a>-->
            <?php echo $sobre = $funcionario[model_funcionario::SOBRE] == '' ? '' : $funcionario[model_funcionario::SOBRE]->read($funcionario[model_funcionario::SOBRE]->size()); ?>

          </p>
          <hr />
          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <dl class="list-inline">
              <dt><i class="fa fa-certificate"></i> Chapa</dt>
              <dd><?php echo $funcionario[model_funcionario::CHAPA]; ?></dd>
            </dl>
            <dl class="list-inline">
              <dt><i class="fa fa-star"></i> Função</dt>
              <dd><?php echo $funcionario[model_funcionario::FUNCAO]; ?></dd>
            </dl>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <dl class="list-inline">
              <dt><i class="fa fa-calendar"></i> Data Admissão</dt>
              <dd><?php echo $funcionario[model_funcionario::ADMISSAO]; ?></dd>
            </dl>
            <dl class="list-inline">
              <dt><i class="fa fa-briefcase"></i> Tipo Contratação</dt>
              <dd><?php echo $funcionario[model_funcionario::TIPO]; ?></dd>
            </dl>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <dl class="list-inline">
              <dt><i class="fa fa-map-marker"></i> Seção</dt>
              <dd><?php echo $funcionario[model_funcionario::SECAO]; ?> - <?php echo $funcionario[model_funcionario::DESCSECAO]; ?></dd>
            </dl>
          </div>
          <div class="clearfix"></div>
          <hr />
          <!--
          <ul class="list-group messages">
            <li class="list-group-item clearfix">
              <img src="assets/img/users/1.jpg" class="pull-left" alt="user" width="64">
              <div class="pull-left">
                <h5 class="text-muted">John Pill</h5>
                <p class="text-muted">Fusce in auctor diam. Praesent non tincidunt nisi.</p>
              </div>
            </li>
          </ul>
          -->
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addDesc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form role="form" action="<?php echo site_url('profile/home/atualizar'); ?>" method="POST">
    <input type="hidden" id="id" name="<?php echo model_funcionario::ID ?>" value="<?php echo $funcionario[model_funcionario::ID]; ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Atualizar Informações</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <div class="col-lg-6">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" id="senha" placeholder="Senha" name="<?php echo model_usuario::SENHA ?>">
              </div>
              <div class="col-lg-6">
                <label for="confirm">Confirmar Senha:</label>
                <input type="password" class="form-control" id="confirm" placeholder="Confirmar Senha" name="confirm">
              </div>
            </div>
          </div>
          <!--          <div class="form-group">
                      <label for="sobre">Mensagem:</label>
                      <textarea id="sobre" name="<?php echo model_funcionario::SOBRE; ?>" class="form-control">
          <?php echo $sobre; ?>
                      </textarea>
                    </div>
          -->
        </div>
        <div class="modal-footer">
          <div class="btn-group">
            <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
          </div>
        </div>
      </div>
    </div>
  </form>