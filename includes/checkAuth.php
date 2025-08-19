<?php
require __DIR__ . '/auth.php';

$user = authenticate($conn, $jwt_token);

echo json_encode([
    "status" => "success",
    "message" => "User authenticated successfully",
    "user" => $user
]);