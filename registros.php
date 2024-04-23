<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Tabla de Datos</title> <!-- Título de la página -->
    <!--Llamado a hoja de estilos css-->
    <link rel="stylesheet" href="hojaEstilos.css"> <!-- Enlace a la hoja de estilos CSS -->
</head>
<body>

    <!-- Mostrar los datos en una tabla HTML -->
    <table id="tablaDatos"> <!-- Inicio de la tabla con un identificador único -->
        <thead> 
            <tr> <!-- Fila de encabezados -->
                <th data-columna="id">ID ⇅</th> <!-- Encabezado para ID con atributo de datos -->
                <th data-columna="nombre">Nombre ⇅</th> <!-- Encabezado para Nombre con atributo de datos -->
                <th data-columna="email">Email ⇅</th> <!-- Encabezado para Email con atributo de datos -->
                <th data-columna="rut">RUT ⇅</th> <!-- Encabezado para RUT con atributo de datos -->
                <th data-columna="fecha">Fecha ⇅</th> <!-- Encabezado para Fecha con atributo de datos -->
            </tr>
        </thead>
        <tbody> 
            <?php
                // Incluye el archivo de conexión
                include("conexion.php");

                // Consulta SQL para obtener los datos de la tabla
                $consulta = "SELECT * FROM datos";
                $resultado = mysqli_query($conex, $consulta);

                // Iterar sobre los resultados y mostrar cada fila en la tabla
                while ($fila = mysqli_fetch_assoc($resultado)) { // Recorrer cada fila de resultados
                    echo "<tr>"; // Inicio de una fila de la tabla
                    echo "<td>" . $fila['id'] . "</td>"; // Celda para ID
                    echo "<td>" . $fila['nombre'] . "</td>"; // Celda para Nombre
                    echo "<td>" . $fila['email'] . "</td>"; // Celda para Email
                    echo "<td>" . $fila['rut'] . "</td>"; // Celda para RUT
                    echo "<td>" . $fila['fecha'] . "</td>"; // Celda para Fecha
                    echo "</tr>"; // Fin de la fila
                }
            ?>
        </tbody>
    </table>

    <!-- Inclusión de jQuery para funcionalidades JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Enlace al archivo jQuery -->
    <!-- Inclusión del archivo de funcionalidades JavaScript -->
    <script src="funcionalidades.js"></script> <!-- Enlace al archivo de funcionalidades JavaScript -->
</body>
</html>
