<form id="formulario" class="form-horizontal" role="form" method="post" action="<?php echo base_url('importacoes/layout/atualizar'); ?>" onsubmit="overlay(true)">
  <fieldset class="well well-lg">
    <legend><h1>Editar Layout</h1></legend>
    <div class="form-group col-sm-7">
      <label for="item" class="col-sm-3 control-label">Item</label>
      <div class="col-sm-9">
        <input type="hidden" name="<?php echo model_item::ID; ?>" value="<?php echo $item[model_item::ID]; ?>" />
        <input type="hidden" name="<?php echo model_layout::ITEM; ?>" value="<?php echo $item[model_item::ID]; ?>" />
        <input class="form-control" id="item_layout" name="<?php echo model_item::NOME; ?>" readonly value="<?php echo $item[model_item::NOME]; ?>" />
      </div>
    </div>
    <div class="form-group col-sm-5">
      <div class="col-sm-9">
        <input type="text" class="form-control" id="versao" placeholder="Versão" disabled value="<?php echo $item[model_item::VERSAO]; ?>" />
      </div>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="delimitador" placeholder="Delim." disabled value="<?php echo $item[model_item::DELIMITADOR]; ?>" />
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
            <?php foreach ($layout as $row) : ?>

              <tr>
                <td>
                  <input type="hidden" name="<?php echo model_layout::ID; ?>[]" value="<?php echo $row[model_layout::ID]; ?>" />
                  <input type="text" class="form-control posicao" name="<?php echo model_layout::POSICAO; ?>[]" placeholder="Pos." required readonly value="<?php echo $row[model_layout::POSICAO]; ?>" />
                </td>
                <td>
                  <input type="text" class="form-control" name="<?php echo model_layout::DESCRICAO; ?>[]" placeholder="Descrição" required value="<?php echo $row[model_layout::DESCRICAO]; ?>" />
                </td>
                <td>
                  <input type="text" class="form-control" name="<?php echo model_layout::TAMANHO; ?>[]" placeholder="Tam." required value="<?php echo $row[model_layout::TAMANHO]; ?>" />
                </td>
                <td>
                  <select class="form-control" name="<?php echo model_layout::TIPO; ?>[]" required>
                    <option value=""> - </option>
                    <option value="DATA" <?php echo $row[model_layout::TIPO] == 'DATA' ? 'selected' : ''; ?>>
                      Data
                    </option>
                    <option value="MEMO" <?php echo $row[model_layout::TIPO] == 'MEMO' ? 'selected' : ''; ?>>
                      Memo
                    </option>
                    <option value="INTEGER" <?php echo $row[model_layout::TIPO] == 'INTEGER' ? 'selected' : ''; ?>>
                      Inteiro
                    </option>
                    <option value="REAL" <?php echo $row[model_layout::TIPO] == 'REAL' ? 'selected' : ''; ?>>
                      Real
                    </option>
                    <option value="VARCHAR" <?php echo $row[model_layout::TIPO] == 'VARCHAR' ? 'selected' : ''; ?>>
                      String
                    </option>
                  </select>
                </td>
                <td>
                  <select class="form-control" name="<?php echo model_layout::DEPARA; ?>[]">
                    <option value=""> - </option>
                    <?php foreach ($tipo_de_para as $row2) : ?>
                      <option value="<?php echo $row2[model_tipo_de_para::ID]; ?>" <?php echo $row[model_layout::DEPARA] == $row2[model_tipo_de_para::ID] ? 'selected' : ''; ?>>
                        <?php echo $row2[model_tipo_de_para::DESCRICAO]; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-lg" onclick="addLinha(this);">
                      <span class="glyphicon glyphicon-plus"></span>
                    </button>
                    <button type="button" class="btn btn-danger btn-lg" onclick="removeLinha(this);">
                      <span class="glyphicon glyphicon-minus"></span>
                    </button>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
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