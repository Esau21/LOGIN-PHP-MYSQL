<?php

    require 'database.php';

    $mensaje = '';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO users (email, password, comfirm_password) VALUES (:email, :password, :comfirm_password)";
        $stp =  $conect->prepare($sql);
        $stp->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $password1 = password_hash($_POST['comfirm_password'], PASSWORD_BCRYPT);
        $stp->bindParam(':password', $password);
        $stp->bindParam(':comfirm_password', $password1);

        if ($stp->execute()) {
            $mensaje = 'Usuario creado con exito';
        }else {
            $mensaje = 'Ups ha ocurriodo un error al momento de crear el usuario';
        }
    }

?>
<!doctype html>
<html lang="es">

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

    <?php if(!empty($mensaje)): ?>
    <p><?= $mensaje ?></p>
    <?php endif; ?>

    <h1 class="dev1" style="color: #3B3F5C">Registrate en mi aplicación o <a class="btn btn-outline-primary" href="login.php">Login
            <i class="fas fa-sign-in-alt"></i></a></h1>

    <main class="login-design">
      <div class="waves">
        <img src="assets/img/img1.png" alt="" />
      </div>
      <div class="login">
        <div class="login-data">
          <img src="assets/img/img2.png" alt="" />
          <h1>Registrate</h1>
          <form action="signup.php" method="post">
            <div class="input-group">
              <label class="input-fill">
              <input type="text" name="email" placeholder="Ingresa tu Email porfavor" required>
                <i class="fas fa-envelope"></i>
              </label>
            </div>
            <div class="input-group">
              <label class="input-fill">
              <input type="password" name="password" placeholder="Ingresa tu clave porfavor" required>
                <i class="fas fa-lock"></i>
              </label>
            </div>
            <div class="input-group">
              <label class="input-fill">
              <input type="password" name="comfirm_password" placeholder="Confirma tu clave porfavor" required>
                <i class="fas fa-lock"></i>
              </label>
            </div>
            <input class="snd" type="submit" value="Send">
          </form>
        </div>
      </div>
    </main>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>


</body>

</html>