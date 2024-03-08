<?php
    require '../Includes/funciones.php';
    $auth = estaAutenticado();
    if(!$auth) {
        header('Location: /');
    }
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
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id) {
            //Eliminar el archivo
            $query = "SELECT imagen FROM propiedades WHERE id = '$id'";
            $resultado = mysqli_query($db, $query);
            $propiedades = mysqli_fetch_assoc($resultado);
            unlink('../imagenes/' . $propiedades['imagen']);
            
            //Eliminar la propiedad
            $query = "DELETE FROM propiedades WHERE id = {$id}";
            $resultado = mysqli_query($db, $query);
            if($resultado) {
                header('Location: /admin?resultado=3');
            }
        }
        
    }
    // Incluye un template
    
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <?php if(intval($resultado) === 1):?>
            <p class="alerta exito">Anuncio Creado Correctamente</p>
        <?php elseif(intval($resultado) === 2): ?>
            <p class="alerta exito">Anuncio Actualizar Correctamente</p>
            <?php elseif(intval($resultado) === 3): ?>
                <p class="alerta exito">Anuncio Eliminado Correctamente</p>
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
                            <form method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo $propiedades['id']; ?>">
                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                            <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedades['id']; ?>" class="boton-amarillo">Actualizar</a>
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