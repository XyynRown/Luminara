<?php
$request = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$route = $_GET['route'] ?? '';

require __DIR__ . '/../includes/config.php';

switch ($request) {
    case '':
        require __DIR__ . '/pages/dashboard.php';
        break;
    case 'login':
        require __DIR__ . '/pages/login.php';
        break;
    case 'register':
        require __DIR__ . '/pages/register.php';
        break;
    case 'verification':
        require __DIR__ . '/pages/email_verification.php';
        break;
    default:
        $file = __DIR__ . "/public/$request.php";
        if (file_exists($file)) {
            require $file;
        } else {
            http_response_code(404);
            require __DIR__ . '/pages/not_found.php';
        }
        break;
}

switch ($route) {
    case "login":
        require __DIR__ . "/../includes/auth.php";
        login($conn, $jwt_token);
        break;

    case "register":
        require __DIR__ . "/../includes/auth.php";
        register($conn, $jwt_token);
        break;

    default:
        break;
}
