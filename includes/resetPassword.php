<?php
header("Content-Type: application/json");
require __DIR__ . "/mailer.php";

function resetPassword($base_url ,$conn, $mailconfig) {
    $data = json_decode(file_get_contents("php://input"), true);
    $email = $data['email'] ?? null;

    if(!$email){
        echo json_encode(["success" => false, "message" => "Email tidak boleh kosong"]);
        exit;
    }

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $existing = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$existing) {
        echo json_encode(["success" => false, "message" => "Email tidak terdaftar"]);
        exit;
    } else {
        $token = bin2hex(random_bytes(32)); // Generate a random token
        $hash = password_hash($token, PASSWORD_DEFAULT); // Hash the token for security
        $tokenExpired = date("Y-m-d H:i:s", time() + (10 * 60)); // 10 menit dari sekarang

        $stmt = $conn->prepare("SELECT * FROM password_resets WHERE user_id = ?");
        $stmt->execute([$existing['id']]);
        $existingReset = $stmt->fetch(PDO::FETCH_ASSOC);

        if($existingReset) {
            $stmt = $conn->prepare("UPDATE password_resets SET token = ?, expired_at = ? WHERE user_id = ?");
            $stmt->execute([$hash, $tokenExpired, $existing['id']]);
        } else {
            $stmt = $conn->prepare("INSERT INTO password_resets (user_id, token, expired_at) VALUES (?, ?, ?)");
            $stmt->execute([$existing['id'], $hash, $tokenExpired]);
        }

        $template = file_get_contents("../public/components/mailbox.php");
        $link = "$base_url/resetPassword?token=$token"; // Link to reset password

        $subject = "Reset Password Anda";
        $body = str_replace(
            ["{{TITLE}}", "{{HEADER}}", "{{CONTENTS}}"],
            ["Permintaan Reset Password", "Gunakan link berikut untuk mengatur ulang password Anda:", "<a href='$link'>Klik di sini untuk reset password</a>"],
            $template
        );

        $send = sendEmail($email, $subject, $body, $mailconfig);
        if($send === true){
            echo json_encode(["success" => true, "message" => "Email reset password telah dikirim"]);
        } else {
            echo json_encode(["success" => false, "message" => "Gagal mengirim email: $send"]);
        }
    }
}