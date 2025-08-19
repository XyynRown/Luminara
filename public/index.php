<?php
$request = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

require __DIR__ . '/../includes/config.php';

if (str_starts_with($request, "api/")) {
    header("Content-Type: application/json");

    switch ($request) {
        case "api/login":
            require __DIR__ . '/../includes/auth.php';
            login($conn, $jwt_token);
            break;

        case "api/register":
            require __DIR__ . '/../includes/auth.php';
            register($conn, $jwt_token);
            break;

        case "api/sendOTP":
            require __DIR__ . '/../includes/auth.php';
            sendOTP($conn);
            break;

        case "api/logout":
            require __DIR__ . '/../includes/logout.php';
            break;

        default:
            http_response_code(404);
            echo json_encode(["error" => "API route not found"]);
            break;
    }

    exit;
}

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
        require __DIR__ . '/pages/not_found.php';
        break;
}