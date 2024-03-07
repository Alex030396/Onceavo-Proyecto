<?php 
//Importa la conexion.
require 'Includes/config/database.php';
$db = conectarDB();
//crear un email y clave
$email = "calex@correo.com";
$clave = "123456";
$passwordHasd = password_hash($clave, PASSWORD_BCRYPT);

// Query para crear el usuario
$query = "INSERT INTO usuarios (email, clave) VALUES ('{$email}', '{$passwordHasd}');";

//Agregarlo a la base de datos
mysqli_query($db, $query);




?>