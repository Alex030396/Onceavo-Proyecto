<?php 
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id) {
        header('Location: /');
    }
    require 'Includes/funciones.php';
    incluirTemplate('header');
    // Importar la conexion
    require 'Includes/config/database.php';
    $db = conectarDB();
    //Consultar
    $query = "SELECT * FROM propiedades WHERE id = {$id}";
    //Obtener resultados
    //Leer los resultados
    $resultado = mysqli_query($db, $query);
    if(!$resultado->num_rows ) {
        header('Location: /');
    }
    // echo "<pre>";
    // var_dump($resultado->num_rows);
    // echo "</pre>";
    $propiedades = mysqli_fetch_assoc($resultado);
?>
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedades['titulo'];?></h1>
            <img src="imagenes/<?php echo $propiedades['imagen'];?>" alt=" propiedad" loading="lazy">
            <div class="resumen-propiedad">
                <p class="precio">$<?php echo $propiedades['precio'];?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img src="build/img/icono_wc.svg" alt="icono wc" lang="lazy">
                        <p><?php echo $propiedades['wc'];?></p>
                    </li>
                    <li>
                        <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" lang="lazy">
                        <p><?php echo $propiedades['estacionamiento'];?></p>
                    </li>
                    <li>
                        <img src="build/img/icono_dormitorio.svg" alt="icono habitaciones" lang="lazy">
                        <p><?php echo $propiedades['habitaciones'];?></p>
                    </li>
                </ul>
                <p><?php echo $propiedades['descripcion'];?></p>
                <p><?php echo $propiedades['descripcion'];?></p>
            </div>
        </main>
<?php 
incluirTemplate('footer');
?>