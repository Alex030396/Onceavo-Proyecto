<?php 
    require 'Includes/config/database.php';
    $db = conectarDB();
    //Autenticar el usuario
    $rerrores = [];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";
        $email = mysqli_real_escape_string ($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        var_dump($email);
        $clave = mysqli_real_escape_string ($db, $_POST['clave']);
        if(!$email) {
            $rerrores[] = "El email es obligatorio o no es valido.";
        }
        if(!$clave) {
            $rerrores[] = "La clave es obligatorio o no es valida.";
        }
        if(empty($errores)) {
            //revisar si el usuario existe.
            $query = "SELECT * FROM usuarios WHERE email = '{$email}'";
            $resultado = mysqli_query($db, $query);
            
            var_dump($resultado);

            if( $resultado->num_rows ) {
                //Revisar si el password es correcto
                
            } else {
                $errores[] = "El usuario no existe";
            }
        }
    }
    //incluye el header
    require 'Includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar sesión</h1>
        <?php foreach($errores as $error) : ?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach; ?>
        <form method="POST" class="formulario" novalidate>
            <fieldset>
                <legend>Email y clave</legend>
                <label for="email">E-mail</label>
                <input name="email" type="email" placeholder="Tu email" id="email">
                <label for="clave">Clave</label>
                <input name="clave" type="password" placeholder="Tu clave" id="clave">
            </fieldset>
            <input type="submit" class="boton boton-verde" value="Iniciar sesión">
        </form>
    </main>
<?php 
incluirTemplate('footer');
?>