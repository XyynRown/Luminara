const params = new URLSearchParams(window.location.search);
const token = params.get("token");

//Check token
document.addEventListener("DOMContentLoaded", async () => {
    if (!token) {
        document.getElementById("message").textContent = "Token tidak valid.";
        document.getElementById("changePasswordForm").style.display = "none";
        return;
    } else {
        try {
            const res = await fetch(`/api/verifyToken`, 
            {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ token: token }),
            }
            );
            const result = await res.json();
            if (!result.valid) {
                document.getElementById("message").textContent = "Token tidak valid atau sudah kedaluwarsa.";
                document.getElementById("changePasswordForm").style.display = "none";
            }
        } catch (error) {
            console.error("Error:", error);
            document.getElementById("message").textContent = "Terjadi kesalahan saat memverifikasi token.";
            document.getElementById("changePasswordForm").style.display = "none";
        }
    }
});

document.getElementById("changePasswordForm").addEventListener("submit", async (e) => {
    e.preventDefault();
    const newPassword = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (newPassword !== confirmPassword) {
        document.getElementById("warningMessage").textContent = "Password dan konfirmasi password tidak sesuai.";
        return;
    } else {
        document.getElementById("warningMessage").textContent = "";
    }

    try {
        const res = await fetch("/api/changePassword", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ token: token, newPassword: newPassword }),
        });
        const result = await res.json();

        if (result.success) {
            alert("Password berhasil diubah! Silakan login dengan password baru Anda.");
            window.location.href = "/login";
        } else {
            document.getElementById("message").textContent = "Gagal mengubah password: " + result.error;
        }
    } catch (error) {
        console.error("Error:", error);
        document.getElementById("message").textContent = "Terjadi kesalahan saat mengubah password.";
    }
});