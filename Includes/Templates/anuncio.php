<?php 
// Importar la conexion
require __DIR__ . '/../config/database.php';
$db = conectarDB();
//Consultar
$query = "SELECT * FROM propiedades LIMIT {$limite}";
//Leer los resultados
$resultado = mysqli_query($db, $query);
?>
<div class="contenedor-anuncios">
    <?php while($propiedades = mysqli_fetch_assoc($resultado)): ?>
<div class="anuncio">
    <img loading="lazy" src="imagenes/<?php echo $propiedades['imagen'];?>" alt="Anuncios 1">
    <div class="contenido-anuncio">
        <h3><?php echo $propiedades['titulo'];?></h3>
        <p><?php echo $propiedades['descripcion'];?></p>
        <p class="precio">$<?php echo $propiedades['precio'];?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img src="build/img/icono_wc.svg" class="icono" alt="icono wc" lang="lazy">
                <p><?php echo $propiedades['wc'];?></p>
            </li>
            <li>
                <img src="build/img/icono_estacionamiento.svg" class="icono" alt="icono estacionamiento" lang="lazy">
                <p><?php echo $propiedades['estacionamiento'];?></p>
            </li>
            <li>
                <img src="build/img/icono_dormitorio.svg" class="icono" alt="icono habitaciones" lang="lazy">
                <p><?php echo $propiedades['habitaciones'];?></p>
            </li>
        </ul>
        <a href="anuncio.php?id=<?php echo $propiedades['id'];?>" class="boton boton-amarillo"> Ver propiedad</a>
    </div>
</div>
<?php endwhile; ?>
</div>
<?php 
    //Cerrar la conexion
    mysqli_close($db);
?>
