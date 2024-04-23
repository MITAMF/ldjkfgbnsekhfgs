<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito de Compras</title>
  <link rel="stylesheet" href="styles2.css">
</head>
<body>
  <header>
    <h1>CARRITO DE COMPRAS</h1>
  </header>
  
  <div class="container">
    <h2>Productos en el carrito</h2> <!-- Agregado -->
    <table id="lista-carrito">
      <thead>
        <tr>
          <th>Imagen</th>
          <th>Nombre</th>
          <th>Precio</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Verificar si hay datos enviados desde JavaScript
        if (isset($_GET['productos'])) {
          // Decodificar los datos JSON recibidos
          $productos = json_decode($_GET['productos'], true);

          // Iterar sobre cada producto y mostrarlos en la tabla
          foreach ($productos as $producto) {
            echo "<tr>";
            echo "<td><img src='{$producto['imagen']}' width='100' /></td>";
            echo "<td>{$producto['titulo']}</td>";
            echo "<td>{$producto['precio']}</td>";
            echo "</tr>";
          }
        }
        ?>
      </tbody>
    </table>

    <?php
    // Calcular el monto total de la compra
    if (isset($_GET['monto_total'])) {
      $monto_total = $_GET['monto_total'];
      echo "<p>Monto Total: $monto_total</p>";
    }
    ?>
      <form action="guardar_compra.php" method="post">
    <?php
    // Itera sobre cada producto y crea campos ocultos para el precio
    foreach ($productos as $producto) {
        echo "<input type='hidden' name='precios[]' value='{$producto['precio']}'>";
    }
    ?>
    <input type="hidden" name="monto_total" id="monto_total" value="<?php echo $monto_total; ?>">
    <label for="forma_entrega">Forma de entrega:</label>
    <select name="forma_entrega" id="forma_entrega">
        <option value="online">Entrega Online</option>
        <option value="presencial">Entrega Presencial</option>
    </select>
    <button type="submit">Confirmar Compra</button>
    <a href="indexP.php" class="btn-2">Volver a Página Principal</a>
</form>


    
  </div>
</body>
</html>
