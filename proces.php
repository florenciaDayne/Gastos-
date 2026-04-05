<?php
/*conexion a la base de datos*/
$conexion = mysqli_connect("localhost","Florencia","1808","Gastos");
/* localhost=> servidor
   Florencia=> usuario
   1808=> contraseña
   Gastos=> base de datos
*/
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
    /* detiene el programa si falla la conexión y muestra el mensaje de error */
}

/*Recibir los datos del formulario*/
$nombre = $_POST['nombre'] ?? '';
/* Recibe el nombre del gasto */

$categoria = $_POST['categoria'] ?? '';
/* Recibe la categoría del gasto */

$monto = $_POST['monto'] ?? '';
/* Recibe el monto del gasto */

$fecha = $_POST['fecha'] ?? '';
/* Recibe la fecha del gasto */


/* Validar los datos recibidos */
if (empty($nombre) || empty($categoria) || empty($monto) || empty($fecha)) {
    die("Todos los campos son obligatorios.");
    /* Detiene el programa si algún campo está vacío y muestra un mensaje de error */
}

/*preparar la consulta SQL para insertar los datos en la tabla "gastos"*/
$stmt =$conexion->prepare("INSERT INTO gastos (nombre, categoria, monto, fecha) VALUES (?, ?, ?, ?)");
/* evita inteccion */
if(!$stmt) {
    die("Error en la consulta:. " . $conexion->error);
    /* Detiene el programa si falla la preparación de la consulta y muestra un mensaje de error */
}

/*Vincular datos */
$stmt->bind_param("ssds", $nombre, $categoria, $monto, $fecha);
/* s = string /* d = double (número con decimales) */
/* s = string */
/* = integer (numero)
/* = string */

/* Ejecutar la consulta */
if ($stmt->execute()) {
    /*Mostrar resultados */

    echo <h2>"Gasto registrado correctamente.</h2>";
    echo "<p>strong>Gastos:</strong> ". htmlspecialchars($nombre). "</p>";
    /* htmlspecialchars evita problemas de seguridad al mostrar el nombre del gasto */
    echo "<p><strong>Categoría:</strong> ". htmlspecialchars($categoria). "</p>";
    /* htmlspecialchars evita problemas de seguridad al mostrar la categoría del gasto */
    echo "<p><strong>Monto:</strong> $". htmlspecialchars($monto). "</p>";
    /* htmlspecialchars evita problemas de seguridad al mostrar el monto del gasto */
    echo "<p><strong>Fecha:</strong> ". htmlspecialchars($fecha). "</p>";
    /* htmlspecialchars evita problemas de seguridad al mostrar la fecha del gasto */
} else {
    echo "Error al registrar el gasto: " . $stmt->error;

    /* Muestra un mensaje de éxito si la consulta se ejecuta correctamente */
}
/* Cerrar la conexión */
$stmt->close();
$conexion->close();
?>
