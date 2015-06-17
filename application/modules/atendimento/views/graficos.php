<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<div class="clearfix">
  <div class="well clearfix">
    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('atendimento/graficos') ?>" onsubmit="overlay(true)">
      <fieldset class="col-sm-3 grupo1">
        <div class="form-group">
          <label for="grafico">Gráficos</label>
          <select class="form-control" id="grafico" name="grafico" autofocus>
            <option value="abertoAtendente">Abertos por Atendente</option>
            <option value="abertoDepartamento">Abertos por Depto. do Cliente</option>
            <option value="encerradoAtendente">Encerrados por Atendente</option>
            <option value="encerradoDepartamento">Encerrados por Depto. do Cliente</option>
          </select>
        </div>
        <div class="form-group">
          <label for="fila">Fila Nível 1</label>
          <select class="form-control multi_select" id="fila_grafico" name="fila">
            <option value="ALL">Todos</option>
            <?php foreach ($fila as $row) : ?>
              <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </fieldset>
      <fieldset class="col-sm-3 col-sm-offset-1 grupo2 none">
        <div class="form-group pergunta">
          <label for="datade">Data de</label>
          <input type="month" class="form-control" id="datade" name="datade" placeholder="Data de" />
        </div>
        <div class="form-group pergunta grupo2 none">
          <label for="dataate">Data até</label>
          <input type="month" class="form-control" id="dataate" name="dataate" placeholder="Data até" />
        </div>
      </fieldset>
      <fieldset class="col-sm-4 col-sm-offset-1 grupo1">
        <div class="form-group pergunta">
          <label for="responsavel">Responsável</label>
          <select class="form-control multi_select" id="responsavel" name="responsavel">
            <option value="ALL">Todos</option>
            <?php foreach ($responsavel as $row) : ?>
              <option value="<?php echo $row['Responsavel']; ?>"><?php echo $row['Responsavel']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group pergunta ">
          <label for="proprietario">Proprietário</label>
          <select class="form-control chosen" multiple="true" id="proprietario" name="proprietario[]">
            <?php foreach ($proprietario as $row) : ?>
              <option value="<?php echo $row['Proprietario']; ?>"><?php echo $row['Proprietario']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </fieldset>
      <fieldset class="col-sm-offset-11 col-sm-1">
        <div class="form-group">
          <button type="submit" class="btn btn-inverse btn-lg pull-right">Buscar</button>
        </div>
      </fieldset>
    </form>
    <?php if (isset($resultado)): ?>
      <br />
      <br />
      <br />
      <div class="col-sm-12">
        <p class="text-muted">Registros de busca por: <?php echo $resultado == '' ? 'ALL' : $resultado; ?></p>
      </div>
    <?php endif; ?>
  </div>
  <div class="row">
    <!-- GRAFICO ABERTOS POR ATENDENTE -->
    <?php if (isset($abertoAtendente)): ?>
      <div class="col-sm-12">
        <script type="text/javascript">
          google.load("visualization", "1", {packages: ["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {

            var data = google.visualization.arrayToDataTable([<?php echo $abertoAtendente; ?>]);
            var options = {
              title: 'Abertos por Atendente',
              altura: 500,
              Legenda: {position: 'top', maxLines: 3},
              bar: {groupWidth: '75% '},
              selectionMode: 'multiple',
              aggregationTarget: 'category',
              animation: {
                duration: 2000,
                easing: 'inAndOut'
              },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_atendente_aberto'));
            chart.draw(data, options);
          }
        </script>
        <div class="well" id="chart_atendente_aberto" style="height: 500px;"></div>
        <div class="table-responsive">
          <table class="table table-bordered table-condensed table-hover table-striped">
            <?php echo str_replace(',', '</td><td style="text-align:center">', str_replace('],', '', str_replace('[', '<tr><td>', str_replace('],[', '</td></tr><tr><td>', str_replace('"', '', str_replace('  ', '', $abertoAtendente)))))); ?>
          </table>

        </div>
      </div>
    <?php endif; ?>
    <!-- GRAFICO ABERTOS POR DEPARTAMENTO -->
    <?php if (isset($abertoDepartamento)): ?>
      <div class="col-sm-12">
        <script type="text/javascript">
          google.load("visualization", "1", {packages: ["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {

            var data = google.visualization.arrayToDataTable([<?php echo $abertoDepartamento; ?>]);
            var options = {
              title: 'Abertos por Departamento',
              altura: 500,
              Legenda: {position: 'top', maxLines: 3},
              bar: {groupWidth: '75% '},
              selectionMode: 'multiple',
              aggregationTarget: 'category',
              animation: {
                duration: 2000,
                easing: 'inAndOut'
              },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_departamento_aberto'));
            chart.draw(data, options);
          }
        </script>
        <div class="well" id="chart_departamento_aberto" style="height: 500px;"></div>
        <div class="table-responsive">
          <table class="table table-bordered table-condensed table-hover table-striped">
            <?php echo str_replace(',', '</td><td style="text-align:center">', str_replace('],', '', str_replace('[', '<tr><td>', str_replace('],[', '</td></tr><tr><td>', str_replace('"', '', str_replace('  ', '', $abertoDepartamento)))))); ?>
          </table>

        </div>
      </div>
    <?php endif; ?>
    <!-- GRAFICO ENCERRADOS POR ATENDENTE -->
    <?php if (isset($encerradoAtendente)): ?>
      <div class="col-sm-12">
        <script type="text/javascript">
          google.load("visualization", "1", {packages: ["corechart"]});
          google.setOnLoadCallback(drawVisualization);

          function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([<?php echo $encerradoAtendente; ?>]);

            var options = {
              title: 'Encerrados por Atendente',
              vAxis: {title: "Total de Chamados"},
              hAxis: {title: "Meses"},
              seriesType: "bars",
              selectionMode: 'multiple',
              aggregationTarget: 'category',
              animation: {
                duration: 2000,
                easing: 'inAndOut'
              },
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_atendente_encerrado'));
            chart.draw(data, options);
          }
        </script>
        <div class="well" id="chart_atendente_encerrado" style="height: 500px;"></div>
        <div class="table-responsive">
          <table class="table table-bordered table-condensed table-hover table-striped">
            <?php echo str_replace(']', '', str_replace(',', '</td><td style="text-align:center">', str_replace('],', '', str_replace('[', '<tr><td>', str_replace(', ]', '</td></tr>', str_replace(', ], [', '</td></tr><tr><td>', str_replace('"', '', str_replace('  ', '', $encerradoAtendente)))))))); ?>
          </table>

        </div> 
      </div>
    <?php endif; ?>
    <!-- GRAFICO ENCERRADOS POR DEPARTAMENTO -->
    <?php if (isset($encerradoDepartamento)): ?>
      <div class="col-sm-12">
        <script type="text/javascript">
          google.load("visualization", "1", {packages: ["corechart"]});
          google.setOnLoadCallback(drawVisualization);

          function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([<?php echo $encerradoDepartamento; ?>]);

            var options = {
              title: 'Encerrados por Departamento',
              vAxis: {title: "Total de Chamados"},
              hAxis: {title: "Meses"},
              seriesType: "bars",
              selectionMode: 'multiple',
              aggregationTarget: 'category',
              animation: {
                duration: 2000,
                easing: 'inAndOut'
              },
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_departamento_encerrado'));
            chart.draw(data, options);
          }
        </script>
        <div class="well" id="chart_departamento_encerrado" style="height: 500px;"></div>
        <div class="table-responsive">
          <table class="table table-bordered table-condensed table-hover table-striped">
            <?php echo str_replace(']', '', str_replace(',', '</td><td style="text-align:center">', str_replace('],', '', str_replace('[', '<tr><td>', str_replace(', ]', '</td></tr>', str_replace(', ], [', '</td></tr><tr><td>', str_replace('"', '', str_replace('  ', '', $encerradoDepartamento)))))))); ?>
          </table>

        </div> 
      </div>
    </div>
  <?php endif; ?>
</div>
<!-- /container -->
<div style="height: 50px;"></div>