<div class="well clearfix">
  <form class="form-horizontal acerto" role="form" method="post" action="<?php echo base_url('atendimento/consulta') ?>" onsubmit="overlay(true)">
    <fieldset class="col-sm-3">
      <div class="form-group">
        <label for="tipo">Tipo</label>
        <select class="form-control" id="tipo" name="tipo" autofocus>
          <option value="aberto">Abertos</option>
          <option value="fechado">Fechados</option>
        </select>
      </div>
      <div class="form-group">
        <label for="fila">Fila Nível 1</label>
        <select class="form-control" id="fila_atendimento" name="fila">
          <option value="ALL">Todos</option>
          <?php foreach ($fila as $row) : ?>
            <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="departamento">Departamento</label>
        <select class="form-control" id="departamento" name="departamento">
          <option value="ALL">Todos</option>
          <?php foreach ($departamento as $row) : ?>
            <option value="<?php echo $row['Depto_Cliente']; ?>">
              <?php echo $row['Depto_Cliente']; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    </fieldset>
    <fieldset class="col-sm-4 col-sm-offset-1 grupo2 none">
      <div class="form-group pergunta">
        <label for="datade">Data de</label>
        <input type="month" class="form-control" id="datade" name="datade" placeholder="Data de" />
      </div>

      <div class="form-group pergunta">
        <label for="dataate">Data até</label>
        <input type="month" class="form-control" id="dataate" name="dataate" placeholder="Data até" />
      </div>
    </fieldset>
    <fieldset class="col-sm-3 col-sm-offset-1">

      <div class="form-group">
        <label for="responsavel">Responsável</label>
        <select class="form-control" id="responsavel" name="responsavel">
          <option value="ALL">Todos</option>
          <?php foreach ($responsavel as $row) : ?>
            <option value="<?php echo $row['Responsavel']; ?>">
              <?php echo $row['Responsavel']; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group pergunta">
        <label for="proprietario">Proprietário</label>
        <select class="form-control chosen" multiple="true" id="proprietario" name="proprietario[]">
          <?php foreach ($proprietario as $row) : ?>
            <option value="<?php echo $row['Proprietario']; ?>"><?php echo $row['Proprietario']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status">
          <option value="ALL">Todos</option>
          <?php foreach ($status as $row) : ?>
            <option value="<?php echo $row['Status']; ?>"><?php echo $row['Status']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </fieldset>
    <fieldset class="col-sm-offset-11 col-sm-1">
      <div class="form-group">
        <button type="submit" class="btn btn-inverse pull-right">Buscar</button>
      </div>
    </fieldset>
  </form>
</div>
<?php if (isset($resultado)): ?>
  <fieldset class="col-sm-12">
    <p class="text-muted">Registros de busca por: <?php echo $resultado == '' ? 'ALL' : $resultado; ?></p>
  </fieldset>
<?php endif; ?>
<?php if (isset($lista)): ?>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed datatable">
      <thead>
        <tr>
          <th>CHAMADO</th>
          <th>ASSUNTO</th>
          <th>FILA</th>
          <th>DATA ABERTURA</th>
          <th>STATUS</th>
          <th>TOTVS</th>
          <th>CLIENTE</th>
          <th>DEPTO. CLIENTE</th>
          <th>PROPRIETÁRIO</th>
          <th>FOLLOW UP</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($lista as $row): ?>
          <tr>
            <td><a href="http://otrs.grupompe.com.br/otrs/index.pl?Action=AgentTicketZoom;TicketID=<?php echo $row[model_listagem_geral::ID]; ?>"  target="_new"><?php echo $row[model_listagem_geral::CHAMADO]; ?></a></td>
            <td><?php echo $row[model_listagem_geral::ASSUNTO]; ?></td>
            <td><span title="Serviço <?php echo $row[model_listagem_geral::SERVICO]; ?>" class="tooltips"><?php echo $row[model_listagem_geral::FILA]; ?></span></td>
            <td><span title="<?php echo $row[model_listagem_geral::DIAS_ABERTO]; ?> dia(s) em aberto" class="tooltips"><?php echo date_format(date_create($row[model_listagem_geral::ABERTURA]), 'd/m/Y'); ?></span></td>
            <td><?php echo $row[model_listagem_geral::STATUS]; ?></td>
            <td><?php echo $row[model_listagem_geral::TOTVS]; ?></td>
            <td><?php echo explode('@', $row[model_listagem_geral::CLIENTE])[0]; ?></td>
            <td><?php echo $row[model_listagem_geral::DEPTO]; ?></td>
            <td><span class="tooltips" title="Responsável: <?php echo $row[model_listagem_geral::RESPONSAVEL]; ?>"><?php echo $row[model_listagem_geral::PROPRIETARIO]; ?></span></td>
            <td style="vertical-align: middle; text-align: center;">
              <button type="button" class="btn btn-primary tooltips" onclick="forModal(this);" data-toggle="modal" data-target="#myModal" data-value="<?php echo $row[model_listagem_geral::ID]; ?>" title="Enviar esta linha por e-mail"><i class="fa fa-envelope-o"></i></button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="9">
            <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('atendimento/consulta/exportaExcel') ?>" target="_blank">
              <input type="hidden" name="dados" value='<?php echo $excel; ?>' />
              <button type="submit" class="btn btn-success tooltips pull-right" title="Exportar">
                <i class="fa fa-download"></i> Excel
              </button>
            </form>
          </td>
          <td style="vertical-align: middle; text-align: center;">
            <button type="button" onclick="forModal(this);" class="btn btn-inverse tooltips" data-toggle="modal" data-target="#myModal" data-value='<?php echo $excel; ?>' title="Enviar todo relatório por e-mail"><i class="fa fa-envelope"></i></i></button>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Follow Up</h4>
        </div>
        <form class="" role="form" method="post" action="<?php echo base_url('atendimento/consulta/enviarEmail') ?>" onsubmit="overlay(true)">
          <div class="modal-body">
            <input type="hidden" id="emaildados" name="emaildados" value="" />
            <input type="hidden" id="emailfrom" name="emailfrom" value="<?php echo $funcionario[model_funcionario::EMAIL]; ?>">
            <div class="form-group">
              <label for="emailto">Email Destinatário</label>
              <input type="email" class="form-control" id="emailto" name="emailto" placeholder="E-mail do Destinatário" required>
            </div>
            <div class="form-group">
              <label for="emailcopy">CC - separados por ;</label>
              <input type="text" class="form-control" id="emailcopy" name="emailcopy" placeholder="Copiar para">
            </div>
            <div class="form-group">
              <label for="emailoculto">CO - separados por ;</label>
              <input type="text" class="form-control" id="emailoculto" name="emailoculto" placeholder="Copia oculta">
            </div>

            <div class="form-group">
              <label for="emailmsg">Mensagem</label>
              <textarea class="form-control" rows="3" id="emailmsg" name="emailmsg"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-lg btn-primary">Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php endif; ?>