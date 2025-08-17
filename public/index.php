<?php
$request = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

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
    default:
        $file = __DIR__ . "/public/$request.php";
        if (file_exists($file)) {
            require $file;
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
        break;
}
