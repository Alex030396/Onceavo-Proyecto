<?php 
    require '../../Includes/funciones.php';
    $auth = estaAutenticado();
    if(!$auth) {
        header('Location: /');
    }    
    //Base de datos
    require '../../Includes/config/database.php';
    $db = conectarDB();
    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);
    //Arreglo con mensaje de errores
    $errores = [];
    
    $titulo = '' ;
    $precio = '' ;
    $descripcion = '' ;
    $habitaciones = '' ;
    $wc = '' ;
    $vendedorId = '' ;
    $estacionamiento = '';
    // Ejecutar el codigo despues de que el usuario envia el formulario.
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        /** Prueba de como sanitizar un proyecto.**/
        // $numero ="albr@corroe.com/'¿";  
        // $numero1 =1;
        // $resultado = filter_var($numero, FILTER_SANITIZE_EMAIL);
        // $resultado = filter_var($numero1, FILTER_VALIDATE_INT );
        // var_dump($resultado);
        // exit;
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";
        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";
        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado =date('Y/m/d');
        // Asignar files hacia una variable
        $imagen = $_FILES['imagen'];
        // echo "<pre>";
        // var_dump($imagen);
        // echo "</pre>";
        // exit;
        if (!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }
        if (!$precio) {
            $errores[] = "Debes añadir un precio";
        }
        if (strlen($descripcion) < 50) {
            $errores[] = "Debes añadir una descripcion de max de 50 caracteres";
        }
        if (!$habitaciones) {
            $errores[] = "Debes añadir un habitaciones";
        }
        if (!$wc) {
            $errores[] = "Debes añadir un wc";
        }
        if (!$estacionamiento) {
            $errores[] = "Debes añadir un estacionamiento";
        }
        if (!$vendedorId) {
            $errores[] = "Elije un vendedor";
        }
        if (!$imagen['name'] || $imagen['error']) {
            $errores[] = "La imagen es obligatoria";
        }
        // Validar por tamaño (100 Kb maximo)
        $medida = 1000 * 100;
        if ($imagen['size'] > $medida) {
            $errores[] = 'La imagen es muy pesada';
        }
        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";
        //Revisar que el array de errores este vacio
        if(empty($errores)) {

            /** SUBIDAS DE ARCHIVOS**/
            // Crear carpeta.
            $carpetaImagenes = '../../imagenes/';
            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }
            //Generar un nombre unico
            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg";
            
            // var_dump($nombreImagen);
            // Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );
            
            // Insertar en la base de datos
            $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion','$habitaciones','$wc','$estacionamiento', '$creado', '$vendedorId')";
            // echo $query;
            $resultado = mysqli_query($db, $query);
                if ($resultado) {
                    // echo "Insertado Correctamente";
                    //Redireccionar el usuario.
                    header('Location: /admin?resultado=1');
                }
        }
    }
    
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach;?>
        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>
                <label for="titulo">Titulo :</label>
                <input type="text" id="titulo" name="titulo" placeholder="titulo propiedad" value="<?php echo $titulo;?>" >
                <label for="precio">Precio :</label>
                <input type="number" id="precio" name="precio" placeholder="precio propiedad" value="<?php echo $precio;?>">
                <label for="imagen">Imagen :</label>
                <input type="file" id="imagen" accept="image/jpg, image/jpg" name="imagen">
                <label for="descripcion"> Descripcion :</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion;?></textarea>
            </fieldset>
            <fieldset>
                <legend>Informacion de la Propiedad</legend>
                <label for="habitaciones">Habitaciones :</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones;?>">
                <label for="wc">Baños :</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc;?>">
                <label for="estacionamiento">Estacionamiento :</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento;?>">
            </fieldset>
            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedor">
                    <option value="">-- Seleccion --</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                        <option <?php echo $vendedorId === $vendedor['id'] ? 'select' : ''; ?>value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
                    <?php endwhile;?>
                </select>
            </fieldset>
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>
<?php 
incluirTemplate('footer');
?>