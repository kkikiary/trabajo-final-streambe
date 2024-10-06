document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("#loginForm");
    const usernameField = document.querySelector("#nombre");
    const passwordField = document.querySelector("#contraseña");
    const errorMessage = document.querySelector("#error-message");

    form.addEventListener("submit", function(event) {
        let errors = [];

        // Validar campo de nombre de usuario
        if (usernameField.value.trim() === "") {
            errors.push("El campo de nombre de usuario no puede estar vacío.");
        }

        // Validar campo de contraseña
        if (passwordField.value.trim() === "") {
            errors.push("El campo de contraseña no puede estar vacío.");
        }

        // Mostrar errores si hay
        if (errors.length > 0) {
            event.preventDefault();
            errorMessage.innerHTML = errors.join("<br>");
        }
    });
});
