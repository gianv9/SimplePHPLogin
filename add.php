<?php
//llamamos el archivo de config para tener la conexion a la bd
require_once 'config.php';
$result = false;
// var_dump($_GET);
// var_dump($_POST);
// Recojo los valores de la variable global $_POST
  if (!empty($_POST)) {//si no esta vacia (osea recibi algo...)
    $name = $_POST['name'];
    $email = $_POST['email'];
    //no utilizar md5 por razones de seguridad!!!
    $password = md5($_POST['password']);

    // insertamos nuestros valores utilizando pdo
    //sentencia (utilizando tags genericos):
    $sql = "INSERT INTO users (nombre, email, password) VALUES (:name, :email, :password)";

    // Aca guardamos la sentencia! (la preparamos para ser ejecutada...)
    $query = $pdo->prepare($sql);
    // como los tags dentro del $sql no estan definidos
    // se le pasa un arreglo relacional a excecute para darle valores a las etiquetas
    $result = $query->execute([
      'name' => $name,
      'email' => $email,
      'password' => $password
    ]);
  }
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

            <?php
                if ($result) {
                    echo '<div class="alert alert-success">Usuario Agregado Exitosamente!</div>';
                }
           ?>

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
