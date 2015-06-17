<form id="formulario" class="form-horizontal" role="form" method="post" action="<?php echo base_url('importacoes/layout/cadastrar'); ?>" onsubmit="overlay(true)">
  <fieldset class="well well-lg">
    <legend><h1>Novo Layout</h1></legend>
    <div class="form-group col-sm-7">
      <label for="item" class="col-sm-3 control-label">Item</label>
      <div class="col-sm-9">
        <select class="form-control" id="item_layout" name="<?php echo model_layout::ITEM; ?>" required autofocus>
          <option value="">Escolha um Item</option>
          <?php foreach ($item as $row) : ?>
            <option value="<?php echo $row[model_item::ID]; ?>"><?php echo $row[model_item::NOME]; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="form-group col-sm-5">
      <div class="col-sm-9">
        <input type="text" class="form-control" id="versao" placeholder="Versão" disabled />
      </div>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="delimitador" placeholder="Delim." disabled />
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-1">
        <table class="table table-striped table-condensed">
          <thead>
            <tr>
              <th width="5%">POSIÇÃO</th>
              <th width="40%">DESCRIÇÃO</th>
              <th width="10%">TAM.</th>
              <th width="15%">TIPO</th>
              <th width="15%">DE/PARA</th>
              <th width="15%"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <input type="text" class="form-control posicao" name="<?php echo model_layout::POSICAO; ?>[]" placeholder="Pos." required readonly value="1" />
              </td>
              <td>
                <input type="text" class="form-control" name="<?php echo model_layout::DESCRICAO; ?>[]" placeholder="Descrição" required />
              </td>
              <td>
                <input type="text" class="form-control" name="<?php echo model_layout::TAMANHO; ?>[]" placeholder="Tam." required />
              </td>
              <td>
                <select class="form-control" name="<?php echo model_layout::TIPO; ?>[]" required>
                  <option value=""> - </option>
                  <option value="DATA">Data</option>
                  <option value="MEMO">Memo</option>
                  <option value="INTEGER">Inteiro</option>
                  <option value="REAL">Real</option>
                  <option value="VARCHAR">String</option>
                </select>
              </td>
              <td>
                <select class="form-control" name="<?php echo model_layout::DEPARA; ?>[]">
                  <option value=""> - </option>
                  <?php foreach ($tipo_de_para as $row) : ?>
                    <option value="<?php echo $row[model_tipo_de_para::ID]; ?>"><?php echo $row[model_tipo_de_para::DESCRICAO]; ?></option>
                  <?php endforeach; ?>
                </select>
              </td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-lg btn-success" onclick="addLinha(this);">
                    <span class="glyphicon glyphicon-plus"></span>
                  </button>
                  <button type="button" class="btn btn-lg btn-danger" onclick="removeLinha(this);">
                    <span class="glyphicon glyphicon-minus"></span>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-8">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-default btn-lg" onclick="javascript:history.back()">Cancelar</button>
          <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
        </div>
      </div>
    </div>
  </fieldset>
</form>