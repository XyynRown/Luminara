<?php
$request = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

require __DIR__ . '/../includes/config.php';

if (str_starts_with($request, "api/")) {
    header("Content-Type: application/json");

    require __DIR__ . "/../includes/auth.php";

    switch ($request) {
        case "api/login":
            login($conn, $jwt_token);
            break;

        case "api/register":
            register($conn, $jwt_token);
            break;

        case "api/verification":
            verification();
            break;

        case "api/logout":
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