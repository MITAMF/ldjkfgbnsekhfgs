<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Administración de Productos</title>
    <link rel="stylesheet" href="styles2.css">
    <script>
    // Función para mostrar un popup con un mensaje
    function mostrarPopup(mensaje) {
        alert(mensaje);
    }
</script>

</head>
<body>
    <div class="container">
        <h2>Formulario de Administración de Productos</h2>
        <form action="proceso_productos.php" method="post">
            <div>
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div>
                <label for="precio">Precio del Producto:</label>
                <input type="number" id="precio" name="precio" required>
            </div>
            <div>
                <button type="submit" name="agregar_articulo">Agregar Producto</button>
            </div>
        </form>

        <h2>Modificar Producto</h2>
        <form action="proceso_productos.php" method="post">
            <div>
                <label for="id_modificar">ID del Producto a Modificar:</label>
                <input type="number" id="id_modificar" name="id_producto" required>
            </div>
            <div>
                <label for="nombre_modificar">Nuevo Nombre del Producto:</label>
                <input type="text" id="nombre_modificar" name="nombre" required>
            </div>
            <div>
                <label for="precio_modificar">Nuevo Precio del Producto:</label>
                <input type="number" id="precio_modificar" name="precio" required>
            </div>
            <div>
                <button type="submit" name="modificar_articulo">Modificar Producto</button>
            </div>
        </form>

        <h2>Eliminar Producto</h2>
        <form action="proceso_productos.php" method="post">
            <div>
                <label for="id_eliminar">ID del Producto a Eliminar:</label>
                <input type="number" id="id_eliminar" name="id_producto" required>
            </div>
            <div>
                <button type="submit" name="eliminar_articulo">Eliminar Producto</button>
            </div>
        </form>
    </div>
    <?php
        include("proceso_productos.php");
     ?>
</body>
</html>
