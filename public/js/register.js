const passwordInput = document.getElementById("password");
const togglePassword = document.getElementById("togglePassword");

togglePassword.addEventListener("click", function () {
  const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
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
  const type = vpasswordInput.getAttribute("type") === "password" ? "text" : "password";
  vpasswordInput.setAttribute("type", type);

  // ganti ikon
  this.innerHTML =
    type === "password"
      ? '<i class="bi bi-eye"></i>'
      : '<i class="bi bi-eye-slash"></i>';
});


document
    .getElementById('registerForm')
    .addEventListener('submit', async(e) => {
        e.preventDefault();

        const username = document.getElementById('firstName').value + " " + document.getElementById('lastName').value;
        const email = document.getElementById('email').value;
         
    })