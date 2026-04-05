Proyecto Sistema de Gastos (PHP + MySQL + HTML/CSS/JS)
Repositorio: https://github.com/florenciaDayne/Gastos-.git
1. Objetivo del Proyecto
Desarrollar una aplicación web simple para registrar gastos, validarlos desde el cliente (JavaScript), enviarlos al
servidor (PHP) y almacenarlos en una base de datos MySQL. El sistema permite capturar: nombre del gasto,
categoría/entidad, monto y fecha.
2. Tecnologías Utilizadas
• HTML5: estructura del formulario y la página.
• CSS3: estilos visuales (diseño, colores, responsividad).
• JavaScript: validación del formulario antes de enviar.
• PHP: procesamiento del formulario y comunicación con la base de datos.
• MySQL: almacenamiento de los datos de gastos.
• XAMPP: entorno local con Apache (servidor web) y MySQL (base de datos).
• Git/GitHub: control de versiones y publicación del proyecto.
3. Estructura del Proyecto
Carpeta principal: C:\xampp\htdocs\Gastos
Archivos principales:
- index.html (formulario)
- style.css (estilos)
- validar.js (validación del formulario)
- proces.php (procesamiento y conexión a la base de datos)
4. Base de Datos (MySQL)
Nombre de la base de datos: gastos
Tabla: gastos
Estructura sugerida:
CREATE DATABASE gastos;
USE gastos;
CREATE TABLE gastos (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(100),
 categoria VARCHAR(100),
 monto INT,
 fecha DATE
);
5. Archivo index.html (Formulario)
Este archivo contiene la interfaz del usuario. Permite ingresar los datos del gasto y enviarlos al servidor.
<form action="proces.php" method="post" onsubmit="return validarFormulario()">
 <label>Nombre del gasto</label>
 <input type="text" name="nombre" required>
 <label>Categoría</label>
 <input type="text" name="categoria" required>
 <label>Monto</label>
 <input type="number" name="monto" required>
 <label>Fecha</label>
 <input type="date" name="fecha" required>
 <input type="submit" value="Guardar gasto">
</form>
Explicación:
• action="proces.php": envía los datos al archivo PHP.
• method="post": envía los datos de forma segura.
• onsubmit="return validarFormulario()": ejecuta validación antes de enviar.
• Los inputs capturan la información del gasto.
6. Archivo validar.js (Validación)
Valida que los datos sean correctos antes de enviarlos al servidor.
function validarFormulario() {
 let nombre = document.getElementById("nombre").value.trim();
 let categoria = document.getElementById("categoria").value.trim();
 let monto = document.getElementById("monto").value.trim();
 let fecha = document.getElementById("fecha").value.trim();
 if (nombre === "" || categoria === "" || monto === "" || fecha === "") {
 alert("Todos los campos son obligatorios");
 return false;
 }
 if (nombre.length < 3) {
 alert("El nombre debe tener al menos 3 caracteres");
 return false;
 }
 if (isNaN(monto) || Number(monto) <= 0) {
 alert("El monto debe ser mayor a 0");
 return false;
 }
 return true;
}
7. Archivo proces.php (Backend)
Recibe los datos y los guarda en MySQL.
<?php
$conexion = new mysqli("localhost", "root", "", "gastos");
if ($conexion->connect_error) {
 die("Error de conexión: " . $conexion->connect_error);
}
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$monto = $_POST['monto'];
$fecha = $_POST['fecha'];
$sql = "INSERT INTO gastos (nombre, categoria, monto, fecha) VALUES (?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssis", $nombre, $categoria, $monto, $fecha);
if ($stmt->execute()) {
 echo "Gasto guardado correctamente";
} else {
 echo "Error: " . $stmt->error;
}
$stmt->close();
$conexion->close();
?>
8. Flujo del Sistema
• Usuario completa el formulario.
• JavaScript valida los datos.
• Se envían a proces.php.
• PHP conecta con MySQL.
• Se ejecuta INSERT.
• Se guarda el gasto en la base de datos.
9. Uso de Git (Subir proyecto)
git init
git add .
git commit -m "Primer commit"
git remote add origin https://github.com/florenciaDayne/Gastos-.git
git push -u origin master
10. Conclusión
El proyecto permite comprender la integración completa de un sistema web: frontend (HTML/CSS/JS) + backend
(PHP) + base de datos (MySQL). Además, introduce buenas prácticas como validación de datos y consultas
preparadas.
