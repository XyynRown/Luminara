document.getElementById('resetPasswordForm').addEventListener('submit', async (event) => {
    event.preventDefault(); // Prevent the default form submission

    const email = document.getElementById('email').value;

    try {
        const res = await fetch('/api/resetPassword', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email: email })
        });
        const result = await res.json();
        if (result.success) {
            document.getElementById('message').textContent = 'Email reset password telah dikirim.';
        } else {
            document.getElementById('message').textContent = 'Gagal mengirim email: ' + result.error;
        }
    } catch (error) {
        console.error('Error:', error);
        document.getElementById('message').textContent = 'Terjadi kesalahan saat mengirim email.';
    }
});