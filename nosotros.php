<?php 
    require 'Includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="Sobre nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque consequatur repellendus reiciendis eius cumque odit libero nihil illum voluptas, ut numquam. Totam impedit esse debitis vero quisquam maxime architecto illo. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta inventore quidem in. Sapiente itaque ea sit velit quas molestias optio voluptatem aut est minus? Maxime ullam sint magni quidem ut! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero sunt, debitis aut dolorem voluptatum eveniet sint laudantium. At ut dolorum quasi ipsa ratione, error praesentium, labore quisquam iusto id iure?</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias vel fugiat cupiditate deleniti, cumque molestiae praesentium veritatis itaque, nemo mollitia eius error autem explicabo maiores? Nemo consequatur eius dolor tempora. Lorem ipsum, dolor sit amet consectetur adipisicing elit. </p>
            </div>
        </div>
    </main>
    <section class="contenedor seccion">
        <h1>Mas sobre nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img  src="build/img/iconos1.svg" alt="Icono A tiempo" loading="lazy">
                <h3>A tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae eius itaque ipsam ad nihil molestias suscipit ab. Eligendi quisquam dolores esse laboriosam temporibus impedit voluptatibus, odio pariatur ratione, beatae quidem!</p>
            </div>
            <div class="icono">
                <img  src="build/img/iconos2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae eius itaque ipsam ad nihil molestias suscipit ab. Eligendi quisquam dolores esse laboriosam temporibus impedit voluptatibus, odio pariatur ratione, beatae quidem!</p>
            </div>
            <div class="icono">
                <img  src="build/img/iconos3.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae eius itaque ipsam ad nihil molestias suscipit ab. Eligendi quisquam dolores esse laboriosam temporibus impedit voluptatibus, odio pariatur ratione, beatae quidem!</p>
            </div>
        </div>
    </section>
    <?php 
   incluirTemplate('footer');
   ?>