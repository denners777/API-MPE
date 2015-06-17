<div class="well clearfix">
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed datatable">
      <thead>
        <tr>
          <th>LINHA</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($linha as $row): ?>
          <tr>
            <td><xmp><?php echo $row[model_linha::LINHA]->load(); ?></xmp></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
