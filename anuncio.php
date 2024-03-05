<?php 
    require 'Includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img src="build/img/destacada.jpg" alt=" propiedad" loading="lazy">
            <div class="resumen-propiedad">
                <p class="precio">$3,000,000</p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img src="build/img/icono_wc.svg" alt="icono wc" lang="lazy">
                        <p>3</p>
                    </li>
                    <li>
                        <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" lang="lazy">
                        <p>3</p>
                    </li>
                    <li>
                        <img src="build/img/icono_dormitorio.svg" alt="icono habitaciones" lang="lazy">
                        <p>4</p>
                    </li>
                </ul>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio consectetur quas a, numquam quae amet molestias exercitationem vel assumenda impedit nesciunt cupiditate minus voluptatum earum. Tempora placeat ex hic dignissimos. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum laboriosam possimus, necessitatibus aperiam impedit placeat nesciunt libero debitis distinctio maiores eos alias fugit quam rerum vel voluptates autem officia porro? Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis tempora aperiam non hic ipsam eos maxime labore esse laudantium vel dolorum totam iure fugit, velit doloremque nam natus corporis nemo!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias laborum, tempore error ratione neque debitis ipsa saepe modi consectetur, consequatur autem illo optio! Voluptate aliquam perferendis aliquid quis nam non. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis accusantium aspernatur voluptatibus</p>
            </div>
        </picture>
    </main>
<?php 
incluirTemplate('footer');
?>