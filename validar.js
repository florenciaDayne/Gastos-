// ==========================================
// FUNCIÓN PRINCIPAL DE VALIDACIÓN
// ==========================================

function validarFormulario() {
    // Esta función se ejecuta cuando se envía el formulario

    // ==========================================
    // 1. OBTENER VALORES DEL FORMULARIO
    // ==========================================

    let nombre = document.getElementById("nombre").value.trim();
    // document = página web
    // getElementById = busca un elemento por su ID
    // value = obtiene lo que el usuario escribió
    // trim() = elimina espacios en blanco

    let categoria = document.getElementById("categoria").value.trim();

    let monto = document.getElementById("monto").value.trim();

    let fecha = document.getElementById("fecha").value.trim();


    // ==========================================
    // 2. VALIDAR CAMPOS VACÍOS
    // ==========================================

    if (nombre === "" || categoria === "" || monto === "" || fecha === "") {
        alert("Todos los campos son obligatorios");
        // alert muestra un mensaje en pantalla
        return false;
        // return false evita que el formulario se envíe
    }


    // ==========================================
    // 3. VALIDAR LARGO DEL TEXTO
    // ==========================================

    if (nombre.length < 3) {
        // length cuenta caracteres
        alert("El nombre debe tener al menos 3 caracteres");
        return false;
    }

    if (categoria.length < 3) {
        alert("La categoría debe tener al menos 3 caracteres");
        return false;
    }


    // ==========================================
    // 4. VALIDAR NÚMEROS
    // ==========================================

    if (isNaN(monto) || Number(monto) <= 0) {
        // isNaN = verifica si NO es número
        // Number() convierte a número
        alert("El monto debe ser un número mayor a 0");
        return false;
    }


    // ==========================================
    // 5. VALIDACIÓN FINAL
    // ==========================================

    return true;
    // Si todo está correcto, el formulario se envía
}