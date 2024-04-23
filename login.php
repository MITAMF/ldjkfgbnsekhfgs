<?php
include("conexion.php");

// Verificar si se ha enviado el formulario de inicio de sesión
if (isset($_POST['login'])) {
    // Obtener el correo electrónico y la contraseña del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Consulta SQL para verificar las credenciales del usuario
    $consulta = "SELECT * FROM datos WHERE email = '$email' AND contraseña = '$password'";
    $resultado = mysqli_query($conex, $consulta);
    
    // Verificar si se encontró un registro coincidente
    if (mysqli_num_rows($resultado) == 1) {
        // Iniciar sesión y redirigir al usuario a otra página
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header('Location: indexPI.php');
        exit;
    } else {
        // Mostrar un mensaje de error si las credenciales son incorrectas
        echo "El correo electrónico o la contraseña son incorrectos.";
    }
}
?>
