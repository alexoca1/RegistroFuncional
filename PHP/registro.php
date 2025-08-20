<?php
include_once('conection.php');

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extracción datos del formulario
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Comprobar si el usuario ya está registrado
    $userExists = "SELECT Names FROM users WHERE email='$email'";
    $validateEmail = mysqli_query($connection, $userExists);

  
    ob_start();
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>       
        <link rel="stylesheet" href="../css/index.css">
    </head>
    <body>
        <div class="container">
            <header class="header">
                <h1>Registro</h1>
            </header>
            <div class="main-content">
                <?php
                if(mysqli_num_rows($validateEmail) > 0){
                    // Mensaje de error: usuario ya existe
                    echo "<div class='error-message'>Ya existe el usuario. <a href='javascript:history.back()'>Volver</a></div>";
                }
                else{
                    // Enviar datos a la base de datos
                    $data = "INSERT INTO users (Names, Surname, Email, Pass) VALUES ('$name', '$surname', '$email', '$pass')";
                    $validate = mysqli_query($connection, $data);

                    if($validate != false){
                        // Redirigir a la página de inicio si el registro es exitoso
                        header('Location:../public/inicio.html');
                        exit;
                    }
                    else{
                        // Mensaje de error: datos no ingresados
                        echo "<div class='error-message'>No se pudieron ingresar los datos. <a href='javascript:history.back()'>Volver</a></div>";
                    }
                }
                ?>
            </div>
            <footer class="footer">
                <h2>Contacta con nosotros para más información</h2>
            </footer>
        </div>
    </body>
    </html>
    <?php
    echo ob_get_clean(); 
    exit; 
}
?>

