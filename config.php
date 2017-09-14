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
