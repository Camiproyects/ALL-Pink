	<?php
// Inicia la sesión
session_start();

// Incluye la conexión a la base de datos
include 'Configuracion/funciones.php'; 

// Función para limpiar los datos (se asume que tienes una función clear definida en otro lugar)
function clear($data) {
    global $mysqli;
    return mysqli_real_escape_string($mysqli, trim($data));
}

// Función para mostrar alertas
function alert($msg, $type, $url) {
    echo "<script>alert('$msg'); window.location.href = '$url';</script>";
}

// Si el usuario ya está logueado, redirige al inicio
if (isset($_SESSION['id_cliente'])) {
    header("Location: ./");
    exit;
}

// Verifica si se ha enviado el formulario
if (isset($_POST['enviar'])) {
    // Obtiene los valores del formulario
    $username = clear($_POST['username']);
    $password = clear($_POST['password']);
    $cpassword = clear($_POST['cpassword']);
    $nombre = clear($_POST['nombre']);

    // Verifica si el username ya está registrado en la base de datos
    $q = $mysqli->query("SELECT * FROM clientes WHERE username = '$username'");
    if (mysqli_num_rows($q) > 0) { // Si el username ya está en uso
        alert("El usuario ya está en uso", 0, 'principal');
        exit;
    }

    // Verifica si las contraseñas coinciden
    if ($password != $cpassword) {
        alert("Las contraseñas no coinciden", 0, 'principal');
        exit;
    }

    // Encripta la contraseña antes de almacenarla en la base de datos
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Inserta el nuevo usuario en la base de datos
    $result = $mysqli->query("INSERT INTO clientes (username, password, name) VALUES ('$username', '$hashed_password', '$nombre')");
    if (!$result) {
        die("Error en la consulta: " . $mysqli->error);
    }

    // Recupera el id del nuevo cliente
    $q2 = $mysqli->query("SELECT * FROM clientes WHERE username = '$username'");
    $r = mysqli_fetch_array($q2);
    $_SESSION['id_cliente'] = $r['id']; // Almacena el id del cliente en la sesión

    alert("Te has registrado satisfactoriamente", 1, 'principal');
    exit; // Termina la ejecución
}
?>

    <center>
        <!-- Formulario de registro -->
        <form method="post" action="">
            <div class="centrar_login">
                <label><h2><i class="fa fa-key"></i> Registrate</h2></label>
                
                <div class="form-group">
                    <input type="text" autocomplete="off" class="form-control" placeholder="Usuario" name="username" required/>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Contraseña" name="password" required/>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Confirmar Contraseña" name="cpassword" required/>
                </div>

                <div class="form-group">
                    <input type="text" autocomplete="off" class="form-control" placeholder="Nombre" name="nombre" required/>
                </div>

                <div class="form-group">
                    <button class="btn btn-submit" name="enviar" type="submit"><i class="fas fa-sign-in-alt"></i> Registrate</button>
                </div>
            </div>
        </form>
    </center>