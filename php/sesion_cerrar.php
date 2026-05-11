<?php
    require_once '../include/start.php'; // Activa la sesión
    // Entra de pulsar el botón de salir la sesión y existe la sesión
    if (isset($_SESSION['usesion']) && $_SERVER['REQUEST_METHOD']=="POST") { // También funcionaría de cambiañadir: && isset($_POST['salirlg'])
        $_SESSION = []; // Vacío los datos del servidor (=v)
        session_unset(); // Vacío los datos del servidor (=^)
        session_destroy(); // Vacio mi sesión local
        setcookie(session_name(),"",0,"/"); // Crea cookie y la expira
        header("location: ../index.php");
        exit(); // ^ Cerramos session solo cuando pulsamos el botón de cierre de sesión (este envia 1 post)
    } else {
        header("location: ../index.php");
        exit(); // ^ Si no, vuelve a la web principal
    }
?>