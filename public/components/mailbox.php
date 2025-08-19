<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Email Verifikasi</title>
</head>
<body style="margin:0; padding:0; font-family: Arial, sans-serif; background:#f4f4f4;">
  <div style="max-width:600px; margin:auto; background:#fff; border-radius:8px; overflow:hidden;">

    <!-- Header -->
    <div style="background: linear-gradient(90deg, #f8c471, #e49920, #f8c471); padding:20px; text-align:center;">
      <h1 style="color:#fff; margin:0;">Luminara</h1>
    </div>

    <!-- Body -->
    <div
      style="
        background-image: url('https://i.pinimg.com/736x/5a/45/ee/5a45ee923ca074084df3e7a0cf5185c3.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        padding: 40px 20px;
        text-align: center;
        font-family: Arial, sans-serif;
        color: #181a18;
      "
    >
      <div
        style="
          background: rgba(211, 211, 211, 0.9);
          padding: 20px;
          border-radius: 8px;
          display: inline-block;
          max-width: 500px;
        "
      >
        <h2 style="margin: 0;">Verifikasi Email Anda</h2>
        <p style="margin: 10px 0;">
          Gunakan kode berikut untuk menyelesaikan pendaftaran:
        </p>

        <div
          style="
            font-size: 32px;
            font-weight: bold;
            letter-spacing: 5px;
            margin: 20px 0;
          "
        >
          {{OTP}}
        </div>

        <p style="font-size: 12px; margin: 0;">
          Kode berlaku {{EXPIRED}} menit. Jangan bagikan kode ini ke siapapun 💢
        </p>
      </div>
    </div>

    <!-- Footer -->
    <div style="background: linear-gradient(90deg, #f8c471, #e49920, #f8c471); padding:15px; text-align:center; font-size:12px; color:white;">
      <p>Jika Anda tidak merasa mendaftar, abaikan email ini.</p>
      <p>© 2025 Luminara. All rights reserved.</p>
    </div>
  </div>
</body>
</html>
