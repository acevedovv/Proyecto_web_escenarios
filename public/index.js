// Función para validar el formulario de cliente
function validateClienteForm(event) {
    event.preventDefault(); // Prevenir el envío del formulario

    // Obtener los valores de los campos del formulario
    var nombre = document.getElementById('nombre_cli').value;
    var numero = document.getElementById('num_cli').value;
    var usuario = document.getElementById('id_usu').value;
    var errorMessage = "";

    // Validar nombre (no debe estar vacío)
    if (nombre === "") {
        errorMessage += "El nombre es obligatorio.\n";
    }

    // Validar número (debe ser un número de 9 dígitos)
    if (numero === "" || !/^\d{9}$/.test(numero)) {
        errorMessage += "El número debe tener 9 dígitos.\n";
    }

    // Validar usuario (debe estar seleccionado)
    if (usuario === "") {
        errorMessage += "Debe seleccionar un usuario.\n";
    }

    // Mostrar mensaje de error si hay errores
    if (errorMessage !== "") {
        alert(errorMessage);
    } else {
        // Si no hay errores, se envía el formulario
        document.getElementById('clienteForm').submit();
    }
}

// Función para validar el formulario de rol
function validateRolForm(event) {
    event.preventDefault(); // Prevenir el envío del formulario

    // Obtener los valores de los campos del formulario
    var nombre = document.getElementById('nombre_rol').value;
    var descripcion = document.getElementById('desc_rol').value;
    var errorMessage = "";

    // Validar nombre (no debe estar vacío)
    if (nombre === "") {
        errorMessage += "El nombre del rol es obligatorio.\n";
    }

    // Validar descripción (no debe estar vacío)
    if (descripcion === "") {
        errorMessage += "La descripción del rol es obligatoria.\n";
    }

    // Mostrar mensaje de error si hay errores
    if (errorMessage !== "") {
        alert(errorMessage);
    } else {
        // Si no hay errores, se envía el formulario
        document.getElementById('rolForm').submit();
    }
}

// Función para validar el formulario de usuario
function validateUsuarioForm(event) {
    event.preventDefault(); // Prevenir el envío del formulario

    // Obtener los valores de los campos del formulario
    var nombre = document.getElementById('nombre_usu').value;
    var numero = document.getElementById('num_usu').value;
    var rol = document.getElementById('id_rol').value;
    var errorMessage = "";

    // Validar nombre (no debe estar vacío)
    if (nombre === "") {
        errorMessage += "El nombre es obligatorio.\n";
    }

    // Validar número (debe ser único y no vacío)
    if (numero === "") {
        errorMessage += "El número es obligatorio.\n";
    }

    // Validar rol (debe estar seleccionado)
    if (rol === "") {
        errorMessage += "Debe seleccionar un rol.\n";
    }

    // Mostrar mensaje de error si hay errores
    if (errorMessage !== "") {
        alert(errorMessage);
    } else {
        // Si no hay errores, se envía el formulario
        document.getElementById('usuarioForm').submit();
    }
}

// Asignar la función de validación al evento submit del formulario
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('clienteForm');
    if (form) {
        form.addEventListener('submit', validateClienteForm);
    }
});
