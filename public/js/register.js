function load() {
  var element = document.getElementById("btnSpinner");
  element.classList.remove("d-none");
  var element = document.getElementById("btnText");
  element.classList.add("d-none");
}

const passwordInput = document.getElementById("password");
const togglePassword = document.getElementById("togglePassword");

togglePassword.addEventListener("click", function () {
  const type =
    passwordInput.getAttribute("type") === "password" ? "text" : "password";
  passwordInput.setAttribute("type", type);

  // ganti ikon
  this.innerHTML =
    type === "password"
      ? '<i class="bi bi-eye"></i>'
      : '<i class="bi bi-eye-slash"></i>';
});

const vpasswordInput = document.getElementById("verificationPassword");
const toggleVPassword = document.getElementById("toggleVerificationPassword");

toggleVPassword.addEventListener("click", function () {
  const type =
    vpasswordInput.getAttribute("type") === "password" ? "text" : "password";
  vpasswordInput.setAttribute("type", type);

  // ganti ikon
  this.innerHTML =
    type === "password"
      ? '<i class="bi bi-eye"></i>'
      : '<i class="bi bi-eye-slash"></i>';
});

document
  .getElementById("registerForm")
  .addEventListener("submit", async (e) => {
    e.preventDefault();

    const username =
      document.getElementById("firstName").value +
      " " +
      document.getElementById("lastName").value;
    const email = document.getElementById("email").value;

    if (
      document.getElementById("password").value ===
      document.getElementById("verificationPassword").value
    ) {
      document.getElementById("warningText").textContent = "";

      const formData = {
        username: username,
        email: email,
        password: document.getElementById("password").value,
      };
      
      load()

      try{
        const res = await fetch("/api/verification", {
          method: "POST",
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify(formData)
        });

        const result = await res.json();

        if(result.success){
          // alert("OTP terkirim!");
          window.location.href = window.location.origin + "/verification";
        } else {
          // alert("Gagal: " + result.message);
          return;
        }
      } catch (err){
        console.error("Error: ", err);
      }
      // try{const res = await fetch("/index.php?route=register", {
      //         method: "POST",
      //         headers: {'Content-Type': 'application/json'},
      //         body: JSON.stringify(formData)
      //     });
      //     const data = await res.json();

      //     if(data.success){

      //     }
      // } catch(err){
      //     console.error("Error: ", err);
      // }
      
      // window.location.href = window.location.origin + "/verification";
    } else {
      document.getElementById("warningText").textContent =
        "Password tidak sama";
    }
  });
