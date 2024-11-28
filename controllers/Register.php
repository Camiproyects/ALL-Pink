<?php
require_once "models/User.php";

class Register
{
    // Controlador Principal
    public function main() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (empty($_SESSION['session'])) {
                $message = "";
                require_once "views/company/register.view.php"; // Vista de registro
            } else {
                header("Location:?c=Dashboard");
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recibe los datos del formulario
            $user_email = $_POST['user_email'];
            $user_pass = $_POST['user_pass'];
            $confirm_pass = $_POST['confirm_pass'];

            // Verifica si las contraseñas coinciden
            if ($user_pass !== $confirm_pass) {
                $message = "Las contraseñas no coinciden.";
                require_once "views/company/register.view.php"; // Muestra mensaje de error
                return;
            }

            // Crea el objeto User para el registro
            $profile = new User($user_email, $user_pass);
            $result = $profile->register(); // Llama al método de registro del modelo User

            if ($result) {
                $message = "Usuario registrado con éxito. Puedes iniciar sesión ahora.";
                require_once "views/company/login.view.php"; // Redirige al login
            } else {
                $message = "Hubo un error al registrar el usuario.";
                require_once "views/company/register.view.php"; // Muestra mensaje de error
            }
        }
    }
}
