$(document).ready(function () {
  $("#toggle-password").on("click", function () {
    var passwordField = $("#password");
    var toggleButton = $("#toggle-password");
    if (passwordField.attr("type") === "password") {
      passwordField.attr("type", "text");
      toggleButton.html('<i class="fas fa-eye-slash"></i>');
    } else {
      passwordField.attr("type", "password");
      toggleButton.html('<i class="fas fa-eye"></i>');
    }
  });

  $("#c-toggle-password").on("click", function () {
    var passwordField = $("#confirm_password");
    var toggleButton = $("#c-toggle-password");
    if (passwordField.attr("type") === "password") {
      passwordField.attr("type", "text");
      toggleButton.html('<i class="fas fa-eye-slash"></i>');
    } else {
      passwordField.attr("type", "password");
      toggleButton.html('<i class="fas fa-eye"></i>');
    }
  });

  $("#confirm_password").on("input", function () {
    const password = $("#password").val();
    const confirmPassword = $("#confirm_password").val();
    const message = $("#message");

    if (confirmPassword === password) {
      message.text("Passwords match").css("color", "green");
    } else {
      message.text("Passwords do not match").css("color", "red");
    }
  });
});
