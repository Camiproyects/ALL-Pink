<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Incluye funciones necesarias
@include("../Configuracion/funciones.php");

if (isset($_POST['registrar'])) {
    $username = clear($_POST['username']);
    $password = password_hash(clear($_POST['password']), PASSWORD_DEFAULT); // Contraseña encriptada
    $nombre = clear($_POST['name']);

    // Lógica para insertar en la base de datos
    $mysqli = connect(); // Asegúrate de tener la conexión correctamente configurada
    $q = $mysqli->query("INSERT INTO clientes (username, password, name) VALUES ('$username', '$password', '$nombre')");

    if ($q) {
        echo "<script>alert('Registro exitoso');</script>";
        redir("?p=login");
    } else {
        echo "<script>alert('Error en el registro');</script>";
    }
}
?>

<center>
    <form method="post" action="" style="width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #f9f9f9; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h2 style="font-family: Arial, sans-serif; color: #333;"><i class="fa fa-key"></i> Regístrate</h2>
        <div class="form-group" style="margin-bottom: 15px;">
            <input type="text" class="form-control" placeholder="Usuario" name="username" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <input type="password" class="form-control" placeholder="Contraseña" name="password" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <input type="password" class="form-control" placeholder="Confirmar Contraseña" name="password_confirm" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <input type="text" class="form-control" placeholder="Nombre" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>

        <button class="btn btn-submit" type="submit" name="registrar" style="background-color: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-size: 16px;">
            <i class="fas fa-user-plus"></i> Registrarte
        </button>
    </form>
</center>
