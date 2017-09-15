<?php
require_once 'config.php';

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Databases with php - List Users</title>
    <!-- download css framework: http://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    <hr>
      <div class="container">
        <h1>List Users</h1>
        <a href="index.php">Home</a>
          <table class="table">
            <tr>
              <th>Nombre</th>
              <th>Email</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            <?php
            //no preparamos el statement porque no tenemos variables en nuestro query!!!!
            $resultSet = $pdo->query('SELECT * FROM users');
            // source:
            // http://php.net/manual/es/pdostatement.fetch.php
            while ($row = $resultSet->fetch(PDO::FETCH_ASSOC)) {
              // var_dump($row);
              // echo "<br /><br />";
              echo "<tr>";
                  echo "<td>".$row['nombre']."</td>";
                  echo "<td>".$row['email']."</td>";
                  echo '<td>
                            <a href="update.php?id='.$row['id'].'">Edit User</a>
                        </td>';
                  echo '<td>
                            <a href="delete.php?id='.$row['id'].'">Delete User</a>
                        </td>';
              echo "</tr>";
            }
             ?>
          </table>
      </div>
  </body>
</html>
