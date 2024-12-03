<?php
// Verifica si el usuario ya está logueado
if (isset($_SESSION['id_cliente'])) {
    redir("./");
}

// Procesa el formulario de inicio de sesión
if (isset($_POST['enviar'])) {
    $username = clear($_POST['username']);
    $password = clear($_POST['password']);

    // Conexión a la base de datos
    $mysqli = connect();

    // Consulta para obtener al usuario por su nombre de usuario
    $q = $mysqli->query("SELECT * FROM clientes WHERE username = '$username'");
    if (mysqli_num_rows($q) > 0) {
        $r = mysqli_fetch_array($q);

        // Verifica la contraseña
        if (password_verify($password, $r['password'])) {
            // Guarda el ID del cliente en la sesión
            $_SESSION['id_cliente'] = $r['id'];

            // Redirecciona al usuario dependiendo de si hay un valor de retorno
            if (isset($_POST['return'])) {
                redir("?p=" . $_POST['return']);
            } else {
                redir("./");
            }
        } else {
            alert("Contraseña incorrecta", 0, "login");
        }
    } else {
        alert("El usuario no existe", 0, "login");
    }
}
?>

<center>
    <form method="post" action="" style="width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #f9f9f9; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div class="centrar_login">
            <label><h2 style="margin-bottom: 20px; font-family: Arial, sans-serif; color: #333;"><i class="fa fa-key"></i> Iniciar Sesión</h2></label>
            <div class="form-group" style="margin-bottom: 15px;">
                <input type="text" class="form-control" placeholder="Usuario" name="username" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"/>
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <input type="password" class="form-control" placeholder="Contraseña" name="password" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"/>
            </div>

            <div class="form-group">
                <button class="btn btn-submit" type="submit" name="enviar" style="background-color: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-size: 16px;">
                    <i class="fas fa-sign-in-alt"></i> Ingresar
                </button>
            </div>

            <div style="margin-top: 15px; font-size: 14px;">
                ¿No tienes una cuenta? <a href="?p=registro" style="color: #007bff; text-decoration: none;">Regístrate aquí</a>
            </div>
        </div>
    </form>
</center>
