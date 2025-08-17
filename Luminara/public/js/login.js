document
  .getElementById("loginForm")
  .addEventListener("submit", async function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    try {
      const res = await fetch("/Luminara/inc/login.php", {
        method: "POST",
        body: formData,
      });
      const data = await res.json();

      if (data.success) {
        alert("Login berhasil!");
        window.location.href = "/Luminara/pages/dashboard.php";
      } else {
        alert("Login gagal: " + data.message);
      }
    } catch (err) {
      console.error("Error:", err);
    }
  });
