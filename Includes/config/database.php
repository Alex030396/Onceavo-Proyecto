<?php
function conectarDB() : mysqli {
    $db = mysqli_connect('localhost','root','25706096','bienes_raices');
    // if($db) {
    //     echo "Se connecto";
    // } else {
    //     echo "No se pudo conectar";
    // }
    if(!$db) {
        echo "error no se pudo conectar";
        exit;
    }
    return $db;
}