<?php
// Conexión a la base de datos (suponiendo que ya tienes un archivo de conexión incluido)
include("conexion.php");

// Consulta SQL para obtener todos los productos
$sql = "SELECT * FROM productos";
$resultado = mysqli_query($conex, $sql);

// Array para almacenar los datos de los productos
$productos = [];

// Verificar si se obtuvieron resultados
if (mysqli_num_rows($resultado) > 0) {
    // Iterar sobre cada fila de resultados y guardar los datos en el array de productos
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $producto = [
            'id' => $fila['id_producto'],
            'titulo' => $fila['nombre_producto'],
            'precio' => $fila['precio_producto'],
            'imagen' => $fila['imagen_producto']
            // Agrega más campos si es necesario
        ];
        // Agregar el producto al array de productos
        $productos[] = $producto;
    }
}

// Convertir el array de productos a formato JSON y enviarlo al cliente
echo json_encode($productos);

// Cerrar la conexión a la base de datos
mysqli_close($conex);
?>
