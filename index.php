<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Contador de Visitas</title>
    <style type="text/css">
      body{
        background-color:#f9f9f9 !important;
      }
    </style>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #55468c !important;">
  <a class="navbar-brand" href="#">
   <strong style="color: #fff">WebDeveloper</strong>
  </a>
</nav>


<div class="container mt-5">
 <div class="row justify-content-md-center">
    <div class="col-md-12">
      <h1 class="text-center font-weight-bolder" style="font-size: 60px; font-weight:800;">
      Contador de Vistas Fácil y Rápido 2021 con 
      <strong style="color:orange">Txt </strong> & <span style="color:#4e42d4">MySql</span></h1>
    </div>
  </div>
</div>

<?php
  $usuario  = "root";
  $password = "";
  $servidor = "localhost";
  $basededatos = "demos";
  $con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
  $db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
  
  //Consultando el total de Visitas
  $sqlTotalVisitas  = ("SELECT totalVisit FROM  visitasusuarios");
  $sqlTotalVisitas  = mysqli_query($con, $sqlTotalVisitas);

  //Validando si existe alguna visita
  if(mysqli_num_rows($sqlTotalVisitas) == 0){
    //Actualizando el total de Visitas
    $queryVisitas = ("INSERT INTO visitasusuarios (totalVisit) VALUES ('1')");
    $ResultVisitas = mysqli_query($con, $queryVisitas);
    echo '<h1 style="color:green;text-align:center; font-size:80px">
            <strong> 1 Visita</strong>
          </h1>';
  }else{

  $RowData   = mysqli_fetch_array($sqlTotalVisitas); 
  $BDvisitas = (int) ($RowData['totalVisit'] + 1);
  echo '<h1 style="color:green;text-align:center; font-size:80px">
          <strong>'. $BDvisitas.' Visitas</strong>
        </h1>';

  //Actualizando el total de Visitas
  $UpdateVisitas = ("UPDATE visitasusuarios SET totalVisit='".$BDvisitas."'");
  $ResultVisitas = mysqli_query($con, $UpdateVisitas);

}


//include('mycountVisit.php');

?>


  </body>
</html>