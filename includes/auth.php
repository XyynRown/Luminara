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

function sendOTP($conn){
    $data = json_decode(file_get_contents("php://input"), true);
    $email = $data['email'] ?? null;

    if(!$email){
        echo json_encode(["success" => false, "message" => "Email tidak boleh kosong"]);
        exit;
    }

    $otp = rand(100000, 999999);
    $otpExpired = time() + (10 * 60);

    $template = file_get_contents("../public/components/mailbox.php");
    $subject = "Kode OTP Anda";
    $body = str_replace(
        ["{{OTP}}", "{{EXPIRED}}"],
        [$otp, 5],
        $template
    );

    // Simpan OTP dan expired ke database
    $stmt = $conn->prepare("SELECT * FROM pending_users WHERE email = ?");
    $stmt->execute([$email]);
    $existing = $stmt->fetch(PDO::FETCH_ASSOC);

    if($existing) {
        $stmt = $conn->prepare("UPDATE pending_users SET otp_code = ?, otp_expired_at = ? WHERE email = ?");
        $stmt->execute([$otp, $otpExpired, $email]);
    } else {
        $stmt = $conn->prepare("INSERT INTO pending_users (email, otp_code, otp_expired_at) VALUES (?, ?, ?)");
        $stmt->execute([$email, $otp, $otpExpired]);
    }

    $send = sendEmail($email, $subject, $body);

    if($send === true){
        echo json_encode(["success" => true, "message" => "OTP berhasil dikirm"]);
    } else {
        echo json_encode(["success" => false, "message" => $send]);
    }
}