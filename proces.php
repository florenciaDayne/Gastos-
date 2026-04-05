<?php
/* =====================================================
   CONEXIÓN A LA BASE DE DATOS
   ===================================================== */

/* se crea la conexión con MySQL usando XAMPP */
$conexion = new mysqli("localhost", "root", "", "gastos");

/* verifica si hay error en la conexión */
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


/* =====================================================
   CAPTURAR DATOS DEL FORMULARIO
   ===================================================== */

/* $_POST permite recibir los datos enviados desde el formulario */
$nombre = $_POST['nombre'] ?? '';
$categoria = $_POST['categoria'] ?? '';
$monto = $_POST['monto'] ?? '';
$fecha = $_POST['fecha'] ?? '';

/* se valida que los campos no estén vacíos */
if (empty($nombre) || empty($categoria) || empty($monto) || empty($fecha)) {
    die("Todos los campos son obligatorios");
}


/* =====================================================
   PREPARAR CONSULTA SQL
   ===================================================== */

/* se crea una consulta preparada para evitar inyección SQL */
$sql = "INSERT INTO gastos (Entidad, categoria, monto, fecha) VALUES (?, ?, ?, ?)";

/* se prepara la consulta */
$stmt = $conexion->prepare($sql);

/* se verifica si hubo error */
if (!$stmt) {
    die("Error en la consulta: " . $conexion->error);
}


/* =====================================================
   VINCULAR DATOS
   ===================================================== */

/* se asignan los valores a la consulta */
/* s = string, s = string, i = entero, s = string */
$stmt->bind_param("ssis", $nombre, $categoria, $monto, $fecha);


/* =====================================================
   EJECUTAR CONSULTA
   ===================================================== */

/* se ejecuta la consulta */
if ($stmt->execute()) {

    /* mensaje de éxito */
    echo "<h2>Gasto registrado correctamente</h2>";

    /* se muestran los datos ingresados */
    echo "<p><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "</p>";
    echo "<p><strong>Categoría:</strong> " . htmlspecialchars($categoria) . "</p>";
    echo "<p><strong>Monto:</strong> $" . htmlspecialchars($monto) . "</p>";
    echo "<p><strong>Fecha:</strong> " . htmlspecialchars($fecha) . "</p>";

} else {

    /* mensaje de error */
    echo "Error al registrar el gasto: " . $stmt->error;
}


/* =====================================================
   CERRAR CONEXIÓN
   ===================================================== */

/* se cierran los recursos */
$stmt->close();
$conexion->close();
?>