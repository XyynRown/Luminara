<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
header('Content-Type: application/json');
require __DIR__ . "/mailer.php";
//temp
$jwt_token = 'gacor999';

function login($conn, $jwt_token) {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['email'], $data['password'])) {
        echo json_encode(["success" => false, "message" => "Email & password wajib diisi"]);
        return;
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$data['email']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($data['password'], $user['password'])) {
        $payload = [
            "iss" => "luminara-app",
            "iat" => time(),
            "exp" => time() + 3600 * 24 * 30 * 6,
            "user_id" => $user['id'],
            "email" => $user['email']
        ];

        $jwt = JWT::encode($payload, $jwt_token, 'HS256');

        echo json_encode([
            "status" => "success",
            "message" => "Login berhasil",
            "token" => $jwt
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Email atau password salah"]);
    }
}

function register($conn, $jwt_token) {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['email'], $data['password'])) {
        echo json_encode(["status" => "error", "message" => "Email & password wajib diisi"]);
        return;
    }

    $hash = password_hash($data['password'], PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->execute([$data['email'], $hash]);
        echo json_encode(["status" => "success", "message" => "Registrasi berhasil"]);
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Email sudah terdaftar"]);
    }
}

function verification(){
    $data = json_decode(file_get_contents("php://input"), true);
    $email = $data['email'] ?? null;

    if(!$email){
        echo json_encode(["success" => false, "message" => "Email tidak boleh kosong"]);
        exit;
    }

    $otp = rand(100000, 999999);
    $otpExpired = time() + (10 * 60);

    $subject = "Kode OTP Anda";
    $body = "<h2>Verifikasi OTP</h2>
            <p>Kode OTP Anda: <b>$otp</b></p>
            <p>Berlaku 5 menit.</p>";

    $send = sendEmail($email, $subject, $body);

    if($send === true){
        echo json_encode(["success" => true, "message" => "OTP berhasil dikirm"]);
    } else {
        echo json_encode(["success" => false, "message" => $send]);
    }
}