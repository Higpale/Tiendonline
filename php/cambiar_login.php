<?php
    require_once '../include/conexion.php'; // Incluimos la conexión. Si falla, el script se detiene (por el die() en conexion.php)
    require_once '../include/start.php'; // Activa la sesión (configurada y con caducidad en start.php*)

    // Comprobamos que llegaron los datos por POST y los limpiamos
    if (isset($_SESSION['usesion']) && $_SERVER['REQUEST_METHOD']==="POST" && !empty($_POST)) { // También funcionaría de cambiañadir: && isset($_POST['salirlg'])
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

		$rol = "administrador";
        $sqlc = "SELECT * FROM logueo WHERE rol=?"; // Leemos nuestra fila del rol administrador, que es unica
	    $stmtc = $conexion->prepare($sqlc);
        $stmtc->execute([$rol]);
        $campo = $stmtc->fetch(PDO::FETCH_ASSOC);

        // Comprobamos que la sesion activa es la del rol administrador
		if (isset($_SESSION['usesion']) && isset($_SESSION['usarea']) && $_SESSION['usarea']=="administrador" && password_verify($PosTeo['contra_adm'],$campo['pass'])) {

            // Actualizamos el usuario y/o la contraseña
            try {
                $sqlu = "UPDATE logueo SET usu=:usu_neo,pass=:pass_neo WHERE usu=:usu_chg"; // Al haber comprobado un pseudoinicio de sesion, no hace falta el AND pass=:pass_act
                $stmtu = $conexion->prepare($sqlu);
                $PosTeoContraNeoHash = password_hash($PosTeo['contra_neo'], PASSWORD_DEFAULT);
                $stmtu->execute([
                    ":usu_chg" => $PosTeo['usuario_chg'],
                    ":usu_neo" => $PosTeo['usuario_neo'],
                    ":pass_neo" => $PosTeoContraNeoHash
                ]);

                $cambios = $stmtu->rowCount();
                if ($cambios > 0) {
                    // Cerrar sesion
                    $_SESSION = []; // Vacío los datos de las variables de sesion del servidor (=v)
                    session_unset(); // Vacío los datos de las variables de sesion del servidor (=^)
                    session_destroy(); // Vacío mi sesión local, es decir, la información registrada de una sesión
                    setcookie(session_name(),"",0,"/"); // Crea cookie y la expira
                    // ^ Cerramos session solo cuando pulsamos el botón de cambiar login y se realiza tal cambio (este envia 1 post)
                }

            } catch(PDOException $e) {
                error_log($e->getMessage()); // echo $e->getMessage();
                // ^ Sin cerrar session ni cambiar datos al fallar el cambio, como por ejemplo, poner nombre igual al de otro usuario
            }

        }
    }

    // ^ Tanto si si, como si no, vuelve a la web principal  
    header("location: ../index.php"); exit(); // Comandos siempre juntos

?>
