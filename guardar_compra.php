<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Conecta a la base de datos usando PDO
        $servername = "localhost";
        $dbname = "registro";
        $username = "root";
        $password = "";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Establece el modo de error de PDO a excepción
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obtiene los datos del formulario
        $montoTotal = $_POST["monto_total"];
        $formaEntrega = $_POST["forma_entrega"];

        // Inserta los datos en la tabla "compras"
        $sql = "INSERT INTO compras (monto_total, forma_entrega) VALUES (:monto_total, :forma_entrega)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':monto_total', $montoTotal);
        $stmt->bindParam(':forma_entrega', $formaEntrega);
        $stmt->execute();

        echo "Compra guardada exitosamente";
    } catch(PDOException $e) {
        echo "Error al guardar la compra: " . $e->getMessage();
    }

    // Cierra la conexión
    $conn = null;
} else {
    echo "Acceso no autorizado";
}
?>


