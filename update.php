<?php
require_once 'config.php';
$result = "";
//llenamos los campos input:
if (!empty($_POST)) {
  // var_dump($_POST);
  //recibo los valores a traves del formulario utilizando el metodo post
  $id = $_POST['id'];
  $nameValue = $_POST['name'];
  $emailValue = $_POST['email'];
  //armamos en string sql con los placholders
  // update syntax:
  // https://www.w3schools.com/sql/sql_update.asp
  $sql = "UPDATE users SET nombre = :nombre, email = :email WHERE id = :id";
  //preparamos el statement
  $query = $pdo->prepare($sql);
  //ejecutamos el query y guardamos el resultado!
  $result = $query->execute([
    'nombre' => $nameValue,
    'email' => $emailValue,
    'id' => $id
  ]);

}
else {
  $nameValue = "";
  $emailValue = "";
  // var_dump($_GET['id']);
  $id = $_GET['id'];
  //armamos el string sql con los placeholders
  $sql = "SELECT nombre, email FROM users WHERE id = :id";
  // var_dump($sql);
  $query = $pdo->prepare($sql);
  $query->execute([
    //acca tenemos que enlazar los parametros
    'id' => $id
  ]);

  //luego del execute podemos vincular una variable a una columna:
  // http://php.net/manual/es/pdostatement.bindcolumn.php

  $query->bindcolumn('nombre',$nameValue);
  $query->bindcolumn('email',$emailValue);

  //con las columnas ya vinculadas solo tengo que hacer el fetch;
  $query->fetch(PDO::FETCH_ASSOC);
  //luego de hacer fetch tengo los valores disponibles en:
  // $nameValue
  // $emailValue
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Databases with php - Edit User</title>
    <!-- download css framework: http://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    <hr>
      <div class="container">
        <h1>Edit User</h1>
        <a href="index.php">Home</a>
        <br>
        <a href="list.php">List users</a>
        <?php
            if ($result) {
                echo '<div class="alert alert-success">Usuario Actualizado Exitosamente!</div>';
            }
       ?>
        <div class="container">
          <!-- El action es hacia donde voy a mandar los datos del formulario -->
          <!-- el method es el metodo que voy a utilizar para enviar esos datos -->
          <!-- get utiliza el url para enviar los datos -->
          <!-- post lo hace en el encabezado http -->
          <!-- En este caso el formulario envia los datos a la misma pagina -->
            <form class="" action="update.php" method="post">
              <input type="hidden" name="id" value="<?php echo $id;?>">
              <label for="name">Name: </label>
                <input type="text" name="name" id="name" value="<?php echo $nameValue;?>">
                <br>
                <label for="email">Email: </label>
                <input type="text" name="email" value="<?php echo $emailValue;?>" id="email">
                <br>
              <input type="submit" name="" value="Update user">
            </form>
        </div>
      </div>
  </body>
</html>
