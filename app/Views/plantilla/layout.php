<!DOCTYPE html>
  <html lang>
    <head>
        <title><?= $this->renderSection('titulo') ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        <link rel="stylesheet" href="<?=base_url()?>/css/index.css?id=<?php echo date('d-m-Y-h-i-s');?>">
        <link rel="stylesheet" href="<?=base_url()?>/css/media_queries.css?id=<?php echo date('d-m-Y-h-i-s');?>">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body>
        <?= $this->renderSection('contenido') ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="<?=base_url()?>/js/index.js?id=<?php echo date('d-m-Y-h-i-s');?>"></script>
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
<script type="text/javascript">
    </body>
  </html>