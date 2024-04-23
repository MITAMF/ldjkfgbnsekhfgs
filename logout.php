<?php
session_start();
session_destroy();
header('Location: indexP.php'); // Redirige al usuario a la página de inicio
exit;
?>
