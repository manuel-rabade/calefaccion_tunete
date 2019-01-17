<!-- -*- mode: html; -*- -->

<?php

define('_ROOT_', dirname(dirname(dirname(__FILE__))));
require(_ROOT_.'/software/lib/config.php');
require(_ROOT_.'/software/lib/secrets.php');
require(_ROOT_.'/software/lib/particle.php');
require(_ROOT_.'/software/lib/openweathermap.php');

$particle = particleTemperature();
$owm = owmTemperature();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="css/tunete.css" rel="stylesheet">
    <title>Calefacción Tunete</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-12 col-xl-8">
          <h1>Sensores</h1>
          <div class="row">
            <div class="col-6 col-md-3">
              <h2>Temperatura superior</h2>
              <p class="sensor"><?php echo $particle['temperature']; ?> &deg;C</p>
            </div>
            <div class="col-6 col-md-3">
              <h2>Temperatura inferior</h2>
              <p class="sensor">-- &deg;C</p>
            </div>
            <div class="col-6 col-md-3">
              <h2>Temperatura ambiente</h2>
              <p class="sensor"><?php echo $owm['temperature']; ?> &deg;C</p>
            </div>
            <div class="col-6 col-md-3">
              <h2>Potencia eléctrica</h2>
              <p class="sensor">-- W</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-4">
          <h1>Relevadores</h1>
          <div class="row">
            <div class="col-6 col-md-6">
              <h2>Calentador de cerámica</h2>
              <p class="sensor">--</p>
            </div>
            <div class="col-6 col-md-6">
              <h2>Placa térmica</h2>
              <p class="sensor">--</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div class="container">
        <span class="text-muted"><a href="https://github.com/manuel-rabade/calefaccion_tunete">github.com/manuel-rabade/calefaccion_tunete</a></span>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
