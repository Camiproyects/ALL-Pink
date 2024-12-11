<?php
    // Incluimos el archivo de configuración
    include "config.php";

    // Configuración de la conexión a la base de datos
    $host_mysql = "localhost";
    $user_mysql = "root";
    $pass_mysql = "";
    $db_mysql = "tiendaonline";
    $mysqli = mysqli_connect($host_mysql, $user_mysql, $pass_mysql, $db_mysql);

    // Función para limpiar una variable para evitar inyecciones de código
    function clear($var) {
        // Convierte caracteres especiales a su representación HTML
        htmlspecialchars($var);
        return $var;
    }

    // Función para verificar si el administrador está autenticado
    function check_admin(){
        // Si no hay sesión iniciada como administrador, redirige a la página principal
        if(!isset($_SESSION['id'])){
            redir("./");
        }
    }

    // Función para redirigir a una URL específica
    function redir($var){
        ?>
	        <script>
		        window.location="<?=$var?>";
	        </script>
	    <?php
	    die(); // Termina la ejecución del script
    }

    // Función para mostrar alertas al usuario
    // Recibe el texto del mensaje, el tipo de alerta y la URL de redirección
    function alert($txt, $type, $url){
        // Determina el tipo de alerta basado en el parámetro $type
        if($type == 0){
            $t = "error";
        } elseif($type == 1){
            $t = "success";
        } elseif($type == 2){
            $t = "info";
        } else {
            $t = "info";
        }

        // Genera un script de JavaScript con el mensaje y redirección
        echo '<script>swal({ title: "Alerta", text: "'.$txt.'", icon: "'.$t.'"});';
        echo '$(".swal-button").click(function(){ window.location="?p='.$url.'"; });';
        echo '</script>';
    }

    // Función para verificar si un cliente está autenticado
    function check_user($url){
        // Si no hay sesión iniciada como cliente, redirige al inicio de sesión
        if(!isset($_SESSION['id_cliente'])){
            redir("?p=login&return=$url");
        }
    }

    // Función para obtener el nombre de un cliente según su ID
    function nombre_cliente($id_cliente){
        $mysqli = connect(); // Conexión a la base de datos

        $q = $mysqli->query("SELECT * FROM clientes WHERE id='$id_cliente'");
        $r = mysqli_fetch_array($q);

        return $r['name']; // Retorna el nombre del cliente
    }

    // Función para establecer una conexión a la base de datos
    function connect(){
        $host_mysql = "localhost";
        $user_mysql = "root";
        $pass_mysql = "";
        $db_mysql = "TiendaOnline";
        $mysqli = mysqli_connect($host_mysql, $user_mysql, $pass_mysql, $db_mysql);

        return $mysqli; // Retorna el objeto de conexión
    }

    // Función para formatear una fecha en un formato más legible
    function fecha($fecha){
        // Divide la fecha en partes usando delimitadores
        $e = explode("-", $fecha);
	    $year = $e[0];
	    $month = $e[1];
	    $e2 = explode(" ", $e[2]);
	    $day = $e2[0];
	    $time = $e2[1];
	    $e3 = explode(":", $time);
	    $hour = $e3[0];
	    $mins = $e3[1];

        // Retorna la fecha en formato "día/mes/año hora:minutos"
	    return $day."/".$month."/".$year." ".$hour.":".$mins;
    }

    // Función para determinar el estado de un pedido
    function estado($id_estado){
		if($id_estado == 0){
			$status = "Iniciando";
		} elseif($id_estado == 1){
			$status = "Preparando";
		} elseif($id_estado == 2){
			$status = "Despachando";
		} elseif($id_estado == 3){
			$status = "Finalizado";
		} else {
			$status = "Indefinido";
		}

        // Retorna el estado del pedido
		return $status;
    }

    // Función para obtener el nombre del administrador conectado
    function admin_name_connected(){
        include "config.php"; // Incluye la configuración
        $id = $_SESSION['id']; // ID del administrador en sesión
        $mysqli = connect(); // Conexión a la base de datos

        $q = $mysqli->query("SELECT * FROM admin WHERE id = '$id'");
        $r = mysqli_fetch_array($q);

        return $r['name']; // Retorna el nombre del administrador
    }

    // Función para determinar el estado de pago
    function estado_pago($estado){
        if($estado == 0){
            $estado = "Sin Verificar";
        } elseif($estado == 1){
            $estado = "Verificado y Aprobado";
        } elseif($estado == 2){
            $estado = "Reembolsado";
        } else {
            $estado = "Sin Verificar";
        }

        // Retorna el estado del pago
        return $estado;
    }
?>
