<?php 
    require 'Includes/funciones.php';
    incluirTemplate('header',$inicio = true );
?>
    <main class="contenedor seccion">
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
    </main>
    <section class="seccion contenedor">
        <h2>Casas y depas en venta</h2>
        <?php 
            $limite = 3;
            include'Includes/Templates/anuncio.php';
        ?>
        <div class="derecha">
            <a class="boton-verde" href="anuncios.php">Ver todas</a>
        </div>
    </section>
    <section class="imagen-contacto">
        <h2>Encuentra la casa de tu sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo-inline">Contactanos</a>
    </section>
    <div class="contenedor seccion seccion-inferior">
        <section class="blog"> 
            <h3>Nuestro blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="blog de entrada">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el: <span>20/10/24</span> por: <span>Admin</span> </p>
                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="blog de entrada">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p>Escrito el: <span>20/10/24</span> por: <span>Admin</span> </p>
                        <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div>
            </article>
        </section>
        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma, muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas
                </blockquote>
                <p>- Alex Briceño</p>
            </div>
        </section>
    </div>
   <?php 
   incluirTemplate('footer');
   ?>