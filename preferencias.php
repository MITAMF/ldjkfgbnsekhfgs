<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona tus preferencias</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .option {
            margin-bottom: 10px;
        }

        label {
            margin-left: 5px;
        }

        /* Estilo para las imágenes */
        .category-image {
            width: 170px; /* Ajusta el tamaño según sea necesario */
            vertical-align: middle;
            margin-right: 10px;
        }

        /* Estilo para los botones */
        input[type="submit"] {
            background-color: black;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            transition: background-color 0.3s ease;
            display: block; /* Hacer que los botones sean un bloque */
            margin: 0 auto 10px; /* Centrar horizontalmente y agregar espacio inferior */
            text-align: center; /* Alinear el texto al centro */
            text-decoration: none; /* Quitar la subrayado del enlace */
        }

        input[type="submit"]:hover {
            background-color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>SELECCIONA TUS PREFERENCIAS</h1>
        <form id="preferenceForm" action="#" method="post" onsubmit="return validateForm()">
            <div class="option">
                <img src="img/formal.jpg" alt="Formal" class="category-image">
                <input type="checkbox" name="preferencias[]" id="formal" value="formal">
                <label for="formal">Ropa Formal</label>
            </div>
            <div class="option">
                <img src="img/informal.jpg" alt="Informal" class="category-image">
                <input type="checkbox" name="preferencias[]" id="informal" value="informal">
                <label for="informal">Ropa Informal</label>
            </div>
            <div class="option">
                <img src="img/deportiva.jpg" alt="Deportiva" class="category-image">
                <input type="checkbox" name="preferencias[]" id="deportivo" value="deportivo">
                <label for="deportivo">Ropa Deportiva</label>
            </div>
            <input type="submit" value="Enviar">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST['preferencias']) && !empty($_POST['preferencias'])) {
                $preferencias = $_POST['preferencias'];
                echo "<script>alert('Tus preferencias seleccionadas son: " . implode(', ', $preferencias) . "');</script>";
                // Redirigir al usuario a la página principal después de mostrar las preferencias
                echo "<script>window.location.href = 'indexP.php';</script>";
            } else {
                echo "<script>alert('Por favor, selecciona al menos una preferencia.');</script>";
            }
        }
        ?>
    </div>

    <script>
    function validateForm() {
        var checkboxes = document.querySelectorAll('input[name="preferencias[]"]:checked');
        if (checkboxes.length === 0) {
            alert("Por favor, selecciona al menos una preferencia.");
            return false;
        }
        return true;
    }
    </script>
</body>
</html>

