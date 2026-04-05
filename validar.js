// =====================================================
// FUNCIÓN PRINCIPAL DE VALIDACIÓN DEL FORMULARIO
// =====================================================

function validarFormulario() {
    // Esta función se ejecuta cuando el usuario presiona "Guardar"

    // =====================================================
    // 1. OBTENER VALORES DEL FORMULARIO
    // =====================================================

    let nombre = document.getElementById("nombre").value.trim();
    // document = representa la página web
    // getElementById = busca un elemento por su ID
    // value = obtiene el contenido ingresado por el usuario
    // trim() = elimina espacios en blanco al inicio y final

    let categoria = document.getElementById("categoria").value.trim();
    // obtiene el valor del campo categoría

    let monto = document.getElementById("monto").value.trim();
    // obtiene el valor del campo monto

    let fecha = document.getElementById("fecha").value.trim();
    // obtiene el valor del campo fecha


    // =====================================================
    // 2. VALIDAR CAMPOS VACÍOS
    // =====================================================

    if (nombre === "" || categoria === "" || monto === "" || fecha === "") {
        alert("Todos los campos son obligatorios");
        // alert = muestra un mensaje emergente al usuario

        return false;
        // return false evita que el formulario se envíe
    }


    // =====================================================
    // 3. VALIDAR LONGITUD DEL TEXTO
    // =====================================================

    if (nombre.length < 3) {
        // length = cuenta la cantidad de caracteres
        alert("El nombre debe tener al menos 3 caracteres");
        return false;
    }

    if (categoria.length < 3) {
        alert("La categoría debe tener al menos 3 caracteres");
        return false;
    }


    // =====================================================
    // 4. VALIDAR QUE EL MONTO SEA NUMÉRICO
    // =====================================================

    if (isNaN(monto) || Number(monto) <= 0) {
        // isNaN = verifica si NO es un número
        // Number() = convierte el valor a número

        alert("El monto debe ser un número mayor a 0");
        return false;
    }


    // =====================================================
    // 5. VALIDACIÓN FINAL
    // =====================================================

    return true;
    // Si todas las validaciones son correctas, se envía el formulario
}