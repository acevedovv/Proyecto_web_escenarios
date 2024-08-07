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

// Asignar la función de validación al evento submit del formulario
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('rolForm');
    if (form) {
        form.addEventListener('submit', validateRolForm);
    }
});

