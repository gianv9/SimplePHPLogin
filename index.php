<?php

$dbHost = 'localhost';
$dbName = 'databasePhp';
$dbUser = 'root';
$dbPass = '';

//agregando la conexion con la base de datos
// pdo recibe 3 parametros:
// tipoDeBaseDeDatos:host=direccionIP;dbname=nombreDeLaBaseDeDatos
try
{
  $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", "$dbUser", "$dbPass");
  // por default no viene configurada para lanzar excepciones en los errores
  // vamos a setear el uso de excepciones:
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
  echo $e->getMessage();
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Databases with php</title>
    <!-- download css framework: http://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <h1>Databases</h1>
        <ul>
          <li><a href="">List users</a></li>
          <li><a href="">Add users</a></li>
        </ul>
      </div>
  </body>
</html>
