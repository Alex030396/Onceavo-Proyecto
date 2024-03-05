<?php 
    require 'Includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img src="build/img/destacada2.jpg" alt=" propiedad" loading="lazy">
            <div class="resumen-propiedad texto-entrada">
                <p>Escrito el: <span>20/10/24</span> por: <span>Admin</span> </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio consectetur quas a, numquam quae amet molestias exercitationem vel assumenda impedit nesciunt cupiditate minus voluptatum earum. Tempora placeat ex hic dignissimos. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum laboriosam possimus, necessitatibus aperiam impedit placeat nesciunt libero debitis distinctio maiores eos alias fugit quam rerum vel voluptates autem officia porro? Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis tempora aperiam non hic ipsam eos maxime labore esse laudantium vel dolorum totam iure fugit, velit doloremque nam natus corporis nemo!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias laborum, tempore error ratione neque debitis ipsa saepe modi consectetur, consequatur autem illo optio! Voluptate aliquam perferendis aliquid quis nam non. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis accusantium aspernatur voluptatibus</p>
            </div>
        </picture>
    </main>
    <?php 
   incluirTemplate('footer');
   ?>