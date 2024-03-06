<?php
    // Importa la  conexion.
    require '../Includes/config/database.php';
    $db = conectarDB();  
    //Escribir el Query
    $query = "SELECT * FROM propiedades";
    //Consultar la BD
    $resultadoConsulta = mysqli_query($db, $query);
    // echo "<pre>";
    // var_dump($_GET);
    // echo "</pre>";
    // exit;
    // $mensaje = $_GET['mensaje'];
    //Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;
    // Incluye un template
    require '../Includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <?php if(intval($resultado) === 1):?>
            <p class="alerta exito">Anuncio creado correctamente</p>
        <?php endif; ?>
        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!--Mostrar los resultados-->
                <?php while($propiedades = mysqli_fetch_assoc($resultadoConsulta)): ?>
                    <tr>
                        <td><?php echo $propiedades['id']; ?></td> 
                        <td><?php echo $propiedades['titulo']; ?></td>
                        <td><img class="imagen-tablas" src="/imagenes/<?php echo $propiedades['imagen']; ?>"></td>
                        <td><?php echo '$', $propiedades['precio']; ?></td>
                        <td>
                            <a href="#" class="boton-rojo-block">Eliminar</a>
                            <a href="#" class="boton-amarillo">Actualizar</a>
                        </td>
                    </tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </main>
<?php 
//cerrar la conexion
mysqli_close($db);
incluirTemplate('footer');
?>