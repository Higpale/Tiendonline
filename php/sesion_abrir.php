<?php
    require_once '../include/start.php'; // Activa la sesión
    // Entra de existe la sesión (y se puede incluir que pulsamos el botón entrar)
    if(isset($_SESSION['usesion'])) { // También funcionaría de añadir: && isset($_POST['entrarlg'])
        header("location: ../index.php");
        exit(); // ^ 2º o más veces que entramos, con la session iniciada correctamente
    } else if (isset($_POST['usuario']) && isset($_POST['contra']) && $_POST['usuario']=="admin" && $_POST['contra']=="1234") { // También funcionaría de añadir: && isset($_POST['entrarlg'])
        $_SESSION['usesion'] = $_POST['usuario']; // Entró aquí si existe usuario/contra y son las requeridas
         session_regenerate_id(true); // Regeneramos id
         $_SESSION['hora_login'] = time(); // Guardamos el momento exacto del login
        header("location: ../index.php");
        exit(); // ^ 1º vez que entramos, que hay que iniciar la session con los datos de post
    } else { 
        header("location: ../index.php");
        exit(); // ^ Cuando llegamos aquí sin un user/pass correcto
    }
?>