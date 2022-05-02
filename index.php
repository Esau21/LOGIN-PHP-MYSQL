<?php 
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $resultado = $conect->prepare("SELECT id, email, password FROM users WHERE id = :id");
    $resultado->bindParam(':id', $_SESSION['user_id']);
    $resultado->execute();
    $result = $resultado->fetch(PDO::FETCH_ASSOC);


    $user= null;

    if (count($result) > 0) {
      $user = $result;
    }
  }

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="shortcut icon" href="assets/img/img1.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css"
    integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=Oswald:wght@200;300;400&family=Zen+Antique&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=Oswald:wght@200;300;400&family=Redressed&family=Rowdies:wght@300;400;700&family=Zen+Antique&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=Oswald:wght@200;300;400&family=Rowdies:wght@300;400;700&family=Zen+Antique&display=swap"
    rel="stylesheet">
  <!-- ESTILOS CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/main.css">

  <title>Esau Dev</title>
</head>

<body>

  <?php require'todo/header.php' ?>

  <?php if(!empty($user)): ?>
  <br>Welcomo to my aplication.<?= $user['email'] ?>
  <br>Tu estas satisfactoriamente logueado
  <a href="logout.php">Cierra Secion</a>

  <?php else: ?>
  <h1 class="esau style=" color: #3B3F5C">Please Login or Signup</h1>

  <header class="nav">
    <a style="text-align: center;" class="btn btn-outline-success" href="login.php"><i class="fas fa-sign-in-alt"></i>
      Inicia Sesion</a>
    <a class="btn btn-outline-primary" href="signup.php"><i class="fas fa-registered"></i> Registrate</a>
  </header>

  <?php endif; ?>



  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
  </script>

</body>

</html>