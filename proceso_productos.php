<script>
    // Función para mostrar un popup con un mensaje
    function mostrarPopup(mensaje) {
        alert(mensaje);
    }
</script>


<?php
include("conexion.php");

// Función para agregar un nuevo artículo
if(isset($_POST['agregar_articulo'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    // Insertar el nuevo artículo en la base de datos
    $sql = "INSERT INTO productos (nombre_producto, precio) VALUES ('$nombre', $precio)";
    if(mysqli_query($conex, $sql)) {
        echo '<script>mostrarPopup("El producto ha sido creado.");</script>';
    } else {
        echo '<script>mostrarPopup("Error al crear producto.");</script>'. mysqli_error($conex);
    }
}

// Función para modificar un artículo
if(isset($_POST['modificar_articulo'])) {
    $id_producto = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    // Actualizar el artículo en la base de datos
    $sql = "UPDATE productos SET nombre_producto='$nombre', precio=$precio WHERE id_producto=$id_producto";
    if(mysqli_query($conex, $sql)) {
        echo '<script>mostrarPopup("El producto ha sido modificado.");</script>';
    } else {
        echo '<script>mostrarPopup("Error al actualizar producto.");</script>'. mysqli_error($conex);
    }
}

// Función para eliminar un artículo
if(isset($_POST['eliminar_articulo'])) {
    $id_producto = $_POST['id_producto'];

    // Eliminar el artículo de la base de datos
    $sql = "DELETE FROM productos WHERE id_producto=$id_producto";
    if(mysqli_query($conex, $sql)) {
        echo '<script>mostrarPopup("El producto ha sido eliminado.");</script>';
    } else {
        echo '<script>mostrarPopup("Error al eliminar producto.");</script>'. mysqli_error($conex);
    }
}
?>


