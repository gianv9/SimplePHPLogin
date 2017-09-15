<?php
include_once 'config.php';
//creating the sql sentence
$sql = "DELETE FROM users WHERE id = :id";
//lets prepare our statement
$query = $pdo->prepare($sql);
//execute the query
$query->execute([
  'id' => $_GET['id']
]);

//redireccionamos hacia la pagina list
// funcion header: http://php.net/manual/es/function.header.php
header('Location:list.php');

 ?>
