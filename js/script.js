document
  .getElementById("toggle-password")
  .addEventListener("click", function () {
    var passwordField = document.getElementById("password");
    var toggleButton = document.getElementById("toggle-password");
    if (passwordField.type === "password") {
      passwordField.type = "text";
      toggleButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
      passwordField.type = "password";
      toggleButton.innerHTML = '<i class="fas fa-eye"></i>';
    }
  });
document
  .getElementById("c-toggle-password")
  .addEventListener("click", function () {
    var passwordField = document.getElementById("confirm_password");
    var toggleButton = document.getElementById("c-toggle-password");
    if (passwordField.type === "password") {
      passwordField.type = "text";
      toggleButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
      passwordField.type = "password";
      toggleButton.innerHTML = '<i class="fas fa-eye"></i>';
    }
  });

document
  .getElementById("confirm_password")
  .addEventListener("input", function () {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm_password").value;
    const message = document.getElementById("message");

    if (confirmPassword === password) {
      message.textContent = "Passwords match";
      message.style.color = "green";
    } else {
      message.textContent = "Passwords do not match";
      message.style.color = "red";
    }
  });
