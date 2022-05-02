<?php

    session_start();

    if (isset($_SESSION['user_id'])) {
        header("Location: /loginphp");
    }

    require 'database.php';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $recordar = $conect->prepare('SELECT id, email, password FROM users WHERE email=:email');
        $recordar->bindParam(':email', $_POST['email']);
        $recordar->execute();
        $resultado = $recordar->fetch(PDO::FETCH_ASSOC);

        $mensaje = '';

        if (count($resultado) > 0 && password_verify($_POST['password'], $resultado['password'])) {
            $_SESSION['user_id'] = $resultado['id'];
            header('Location: /loginphp');
        } else {
            $mensaje = 'Ups ha ocurrido un error con tus credenciales';
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

    <?php if(!empty($mensaje)) : ?>
    <p><?= $mensaje ?></p>
    <?php endif; ?>

    <h1 class="esau" style="color: #3B3F5C">Inicia sesión <i class="fas fa-laptop-code fa-1x"></i> o <a
            class="btn btn-outline-success" href="signup.php"> Registrate <i class="fas fa-sign-in-alt"></i></a></h1>

    <main class="login-design">
        <div class="waves">
            <img src="assets/img/img4.png" alt="" />
        </div>
        <div class="login">
            <div class="login-data">
                <img src="assets/img/img9.png" alt="" />
                <b>><h1>Inicio de Sesión</h1></b>
                <form action="login.php" method="post">
                    <div class="input-group">
                        <label class="input-fill">
                            <input type="text" name="email" placeholder="Ingresa tu Email porfavor" required>
                            <i class="fas fa-envelope"></i>
                            <br>
                        </label>
                    </div>
                    <div class="input-group">
                        <label class="input-fill">
                            <input type="password" name="password" placeholder="Ingresa tu clave porfavor"required>
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