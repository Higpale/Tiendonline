<?php
    require_once '../include/conexion.php'; // Incluimos la conexión. Si falla, el script se detiene (por el die() en conexion.php)
    require_once '../include/start.php'; // Activa la sesión (configurada y con caducidad en start.php*)

    // Comprobamos que llegaron los datos por POST y los limpiamos
    if ($_SERVER['REQUEST_METHOD']==='POST' && !empty($_POST)) {
        $PosTeo = [];
        foreach ($_POST as $campo => $valor) {
            if (!isset($_POST[$campo])) {
                header("location: ../index.php"); exit(); // Comandos siempre juntos 
            } 
            $PosTeo[$campo] = trim(htmlspecialchars($valor));
            if (empty($PosTeo[$campo])) {
                header("location: ../index.php"); exit(); // Comandos siempre juntos 
            } 
        }
    } else {
        header("location: ../index.php"); exit(); // Comandos siempre juntos
    }

    $InterMedio = array();
	$sql = "SELECT * FROM logueo"; // Leemos nuestra tabla
	$result = $conexion->query($sql);
	while ($campo = $result->fetch(PDO::FETCH_ASSOC)) { // Recorremos nuestros valores
            // Entra de existir la sesión (y se puede incluir que pulsamos el botón entrar)
        if (isset($_SESSION['usesion'])) { // También funcionaría de añadir: && isset($_POST['entrarlg'])
            // ^ 2º o más veces que entramos, con la session iniciada correctamente                                                                        
        } else if (isset($PosTeo['usuario']) && isset($PosTeo['contra']) && $PosTeo['usuario']==$campo['usu'] && password_verify($PosTeo['contra'],$campo['pass'])) { // También funcionaría de añadir: && isset($_POST['entrarlg'])
            $_SESSION['usesion'] = $_POST['usuario']; // Entró aquí si existe usuario/contra y son las requeridas
            $_SESSION['usarea'] = $campo['rol'];
             session_regenerate_id(true); // *Regeneramos el ID de sesión actual por uno nuevo y borra el antiguo. Ideal tras el login.
             $_SESSION['hora_login'] = time(); // *Guardamos el momento exacto del login
            // ^ 1º vez que entramos, que hay que iniciar la session con los datos de post
        } else { 
            // ^ Cuando llegamos aquí sin un user/pass correcto
        }
        $InterMedio[] = $campo['usu'];
    }
    // Volcamos el array InterMedio a el array multidimensional 'acceden' cuando accede el administrador
    if (isset($_SESSION['usesion']) && isset($_SESSION['usarea']) && $_SESSION['usarea']=="administrador") {
        $_SESSION['acceden'] = array();
        $_SESSION['acceden'] = $InterMedio;
        $_SESSION['num'] = count($_SESSION['acceden']);
    }

    header("location: ../index.php"); exit(); // Comandos siempre juntos
?>