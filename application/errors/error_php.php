<?php include_once 'header.php'; ?>
<body>
  <div class="container">
    <div class="container">
      <div class="jumbotron clearfix">
        <h1>Um erro foi encontrado</h1>
        <p class="lead">Severity: <?php echo $severity; ?></p>
        <p>Message:  <?php echo $message; ?></p>
        <p>Filename: <?php echo $filepath; ?></p>
        <p>Line Number: <?php echo $line; ?></p>
        <p><a class="btn btn-lg btn-success" onclick="javascript:history.back()" role="button">Voltar</a></p>
      </div>
    </div>
  </div>
</body>
</html>