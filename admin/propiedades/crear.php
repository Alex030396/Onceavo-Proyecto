<?php 
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
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";
        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = $_POST['habitaciones'];
        $wc = $_POST['wc'];
        $estacionamiento = $_POST['estacionamiento'];
        $vendedorId = $_POST['vendedor'];
        $creado =date('Y/m/d');
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
        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";
        //Revisar que el array de errores este vacio
        if(empty($errores)) {
            // Insertar en la base de datos
            $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) VALUES ('$titulo', '$precio', '$descripcion','$habitaciones','$wc','$estacionamiento', '$creado', '$vendedorId')";
            // echo $query;
            $resultado = mysqli_query($db, $query);
                if ($resultado) {
                    // echo "Insertado Correctamente";
                    //Redireccionar el usuario.
                    header('Location: /admin');
                }
        }
    }
    require '../../Includes/funciones.php';
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
        <form class="formulario" method="POST" action="/admin/propiedades/crear.php">
            <fieldset>
                <legend>Informacion General</legend>
                <label for="titulo">Titulo :</label>
                <input type="text" id="titulo" name="titulo" placeholder="titulo propiedad" value="<?php echo $titulo;?>" >
                <label for="precio">Precio :</label>
                <input type="number" id="precio" name="precio" placeholder="precio propiedad" value="<?php echo $precio;?>">
                <label for="imagen">Imagen :</label>
                <input type="file" id="imagen" accept="image/jpg, image/jpg">
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
                        <option <?php echo $vendedor === $vendedor['id'] ? 'select' : ''; ?>value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
                    <?php endwhile;?>
                </select>
            </fieldset>
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>
<?php 
incluirTemplate('footer');
?>