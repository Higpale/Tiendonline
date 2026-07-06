<?php 

    session_start([
        'cookie_lifetime' => 0,         // La cookie expira al cerrar el navegador
        'cookie_httponly' => true,      // Evita que JavaScript lea la cookie (Mitiga XSS)
        // 'cookie_secure' => true,     // Solo envía la cookie sobre HTTPS (Mitiga intercepción); Solo con certificado
        'cookie_samesite' => 'Strict',  // Evita enviar la cookie en peticiones cruzadas (Mitiga CSRF); Solo en la web
        'use_strict_mode' => true,      // Evita que PHP acepte IDs de sesión no generados por el servidor
        'use_only_cookies' => true      // Obliga a usar cookies, rechaza IDs pasados por URL (?PHPSESSID=...); No GET
    ]);

    // Definir el tiempo de inactividad de sesión (ej. 1 hora = 3600 segundos, 15 minutos = 900 segundos)
    $inactividad_maxima = 900;

    if (isset($_SESSION['ultimo_acceso']) && isset($_SESSION['usesion'])) { // Ambos por seguridad
        // Calcular cuánto tiempo ha pasado desde el último clic
        $tiempo_transcurrido = time() - $_SESSION['ultimo_acceso'];
        if ($tiempo_transcurrido > $inactividad_maxima) {
            // El tiempo absoluto ha expirado, procedemos a sesion_cerrar habitual
            $_SESSION = []; // Vacío los datos de las variables de sesion (=v)
            session_unset(); // Vacío los datos de las variables de sesion (=^)
            session_destroy(); // Vacío mi sesión local, es decir, la información registrada de una sesión en el servidor
            setcookie(session_name(),"",time() - (2*$inactividad_maxima),"/"); // Crea/expira la cookie trás el tiempo especificado
            header("Location: #"); exit(); // Siempre juntos
        }
    } // Obviamos el else porque ya se pseudocontrola trás el require de este

    // Si la sesión es válida o acaba de iniciar, actualizamos la marca de tiempo a ahora
    $_SESSION['ultimo_acceso'] = time();

?>