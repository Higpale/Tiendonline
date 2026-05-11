<?php 

    session_start([
        'cookie_lifetime' => 0,         // La cookie expira al cerrar el navegador
        'cookie_httponly' => true,      // Evita que JavaScript lea la cookie (Mitiga XSS)
        // 'cookie_secure' => true,     // Solo envía la cookie sobre HTTPS (Mitiga intercepción); Solo con certificado
        'cookie_samesite' => 'Strict',  // Evita enviar la cookie en peticiones cruzadas (Mitiga CSRF); Solo en la web
        'use_strict_mode' => true,      // Evita que PHP acepte IDs de sesión no generados por el servidor
        'use_only_cookies' => true      // Obliga a usar cookies, rechaza IDs pasados por URL (?PHPSESSID=...); No GET
    ]);

    // Definir el tiempo máximo absoluto de sesión (ej. 1 hora = 3600 segundos, 15 minutos = 900 segundos)
    $vida_maxima_sesion = 900;

    if (isset($_SESSION['hora_login']) && isset($_SESSION['usesion'])) { // Ambos por seguridad
        $tiempo_en_sesion = time() - $_SESSION['hora_login'];
        if ($tiempo_en_sesion > $vida_maxima_sesion) {
            // El tiempo absoluto ha expirado, procedemos a sesion_cerrar habitual
            $_SESSION = [];
            session_unset();
            session_destroy();
            setcookie(session_name(),"",time() - $vida_maxima_sesion,"/");
            header("Location: #");
            exit();
        }
    } // Obviamos el else porque ya se pseudocontrola trás el require de este

?>