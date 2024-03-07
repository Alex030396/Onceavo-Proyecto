<?php 
    require 'Includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h2>Casas y depas en venta</h2>
        <?php 
            $limite = 6;
            include'Includes/Templates/anuncio.php';
        ?>
    </main>
    <?php 
   incluirTemplate('footer');
   ?>