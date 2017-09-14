<?php
require_once 'config.php';
// var_dump($_GET);
// var_dump($_POST);

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Databases with php - Add</title>
    <!-- download css framework: http://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <h1>Add User</h1>
        <a href="index.php">Home</a>
        <div class="container">
          <!-- El action es hacia donde voy a mandar los datos del formulario -->
          <!-- el method es el metodo que voy a utilizar para enviar esos datos -->
          <!-- get utiliza el url para enviar los datos -->
          <!-- post lo hace en el encabezado http -->
          <!-- En este caso el formulario envia los datos a la misma pagina -->
            <form class="" action="add.php" method="post">
              <label for="name">Name: </label>
                <input type="text" name="name" value="" id="name">
                <br>
              <label for="email">Email: </label>
                <input type="text" name="email" value="" id="email">
                <br>
              <label for="password">Password: </label>
                <input type="password" name="password" value="" id="password">
                <br>
              <input type="submit" name="" value="Save User">
            </form>
        </div>
      </div>
  </body>
</html>
