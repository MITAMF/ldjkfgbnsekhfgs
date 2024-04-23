<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <!-- Llamado a hoja de estilos css -->
    <link rel="stylesheet" href="hojaEstilos.css"> 
</head>
<body>
    <!-- el formulario será enviado por metodo post -->
    <form method="post" class="formulario"> 
        <h2>¡Bienvenid@ a EncantoTextil!</h2>
        <p>Por favor, inicia tu registro</p>
        <!-- Campo para ingresar el nombre -->
        <div class="input-wrapper">
            <input type="text" id="name" name="name" placeholder="Nombre">
        </div>
        <!-- Campo para ingresar el correo -->
        <div class="input-wrapper">
            <input type="text" id="email" name="email" placeholder="E-mail">
        </div>
        <!-- Campo para ingresar la contraseña -->
        <div class="input-wrapper">
            <input type="password" id="password" name="password" placeholder="Contraseña">
        </div>
    
        <!-- Campo para seleccionar el sexo -->
        <div class="input-wrapper">
        <input type="text" id="sexo" name="sexo" placeholder="Ingrese su sexo (Masculino/Femenino)">
        </div>

        <div class="input-wrapper">
        <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Ingrese fecha de nacimiento (dd-mm-aaaa)">
        </div>

        <!-- boton para enviar el formulario -->
        <input class="btn" type="submit" name="register" value="Crear tu cuenta">
    </form>
    <!-- Inclusión del archivo PHP para procesar el formulario -->
    <?php include("registrar.php"); ?>
</body>
</html>
