<?php include_once 'header.php'; ?>
<body>
  <div class="container">
    <div class="container">
      <div class="jumbotron clearfix">
        <h1><?php echo $heading; ?></h1>
        <img src="<?php echo FILE_PUBLIC; ?>assets/img/404.jpg" />
        <div class="lead"><?php echo $message; ?></div
        <p><a class="btn btn-lg btn-success" onclick="javascript:history.back()" role="button">Voltar</a></p>
      </div>
    </div>
  </div>
</body>
</html>
