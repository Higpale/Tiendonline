<?php
    require_once '../include/start.php'; // Activa la sesión (configurada y con caducidad en start.php)
    // Entra de pulsar el botón de salir la sesión y existe la sesión
    if (isset($_SESSION['usesion']) && $_SERVER['REQUEST_METHOD']==="POST" && !empty($_POST)) { // También funcionaría de cambiañadir: && isset($_POST['salirlg'])
        $_SESSION = []; // Vacío los datos de las variables de sesion del servidor (=v)
        session_unset(); // Vacío los datos de las variables de sesion del servidor (=^)
        session_destroy(); // Vacío mi sesión local, es decir, la información registrada de una sesión
        setcookie(session_name(),"",0,"/"); // Crea cookie y la expira
        // ^ Cerramos session solo cuando pulsamos el botón de cierre de sesión (este envia 1 post)
        // ^ Tanto si si, como si no, vuelve a la web principal        
    }
    header("location: ../index.php"); exit(); // Comandos siempre juntos
?>