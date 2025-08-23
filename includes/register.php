<?php 
header('Content-Type: application/json');
require __DIR__ . "/mailer.php";

function checkEmail($conn) {
    $data = json_decode(file_get_contents("php://input"), true);
    $email = $data['email'] ?? null;

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $existing = $stmt->fetch(PDO::FETCH_ASSOC);

    if($existing) {
        echo json_encode(["success" => false, "message" => "Email sudah terdaftar"]);
    } else {
        echo json_encode(["success" => true, "message" => "Email tersedia"]);
    }
}

function sendOTP($conn, $mailconfig) {
    $data = json_decode(file_get_contents("php://input"), true);
    $email = $data['email'] ?? null;

    if(!$email){
        echo json_encode(["success" => false, "message" => "Email tidak boleh kosong"]);
        exit;
    }

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $existing = $stmt->fetch(PDO::FETCH_ASSOC);

    if($existing) {
        echo json_encode(["success" => false, "message" => "Email sudah terdaftar"]);
        exit;
    } else {
        $otp = rand(100000, 999999);
        $otpExpired = date("Y-m-d H:i:s", time() + (5 * 60)); // 5 menit

        $template = file_get_contents("../public/components/mailbox.php");
        $subject = "Kode OTP Anda";
        $body = str_replace(
            ["{{TITLE}}" ,"{{HEADER}}", "{{CONTENTS}}"],
            ["Verifikasi Email Anda" ,"Gunakan kode berikut untuk menyelesaikan pendaftaran:", $otp],
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

        $send = sendEmail($email, $subject, $body, $mailconfig);

        if($send === true){
            echo json_encode(["success" => true, "message" => "OTP berhasil dikirm"]);
        } else {
            echo json_encode(["success" => false, "message" => "Gagal mengirim OTP: $send"]);
        }
    }
}

function verifyOTP($conn) {
    $data = json_decode(file_get_contents("php://input"), true);
    $username = $data['username'] ?? null;
    $email = $data['email'] ?? null;
    $password = $data['password'] ?? null;
    $otp = $data['otp'] ?? null;

    $stmt = $conn->prepare("SELECT * FROM pending_users WHERE email = ? AND otp_code = ?");
    $stmt->execute([$email, $otp]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && time() < strtotime($user['otp_expired_at'])) {
        // OTP valid, buat user baru
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, password_hash($password, PASSWORD_DEFAULT)]);

        // Hapus dari pending_users
        $stmt = $conn->prepare("DELETE FROM pending_users WHERE email = ?");
        $stmt->execute([$email]);

        echo json_encode(["success" => true, "message" => "Verifikasi berhasil"]);
    } else {
        echo json_encode(["success" => false, "message" => "OTP tidak valid atau sudah kadaluarsa"]);
    }
}