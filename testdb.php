<?php
$mysqli = new mysqli('localhost', 'root', '1452', 'listatareas');

if ($mysqli->connect_error) {
    die('Error de conexión: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

echo "✅ Conexión exitosa a la base de datos.";
?>