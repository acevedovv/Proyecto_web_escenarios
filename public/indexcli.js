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

// Asignar la función de validación al evento submit del formulario
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('clienteForm');
    if (form) {
        form.addEventListener('submit', validateClienteForm);
    }
});
