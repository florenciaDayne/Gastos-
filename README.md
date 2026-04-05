RESUMEN COMPLETO - TALLER DE APLICACIONES
HTML (Estructura de la web)
HTML es el lenguaje base que se usa para crear páginas web. Permite estructurar contenido como
textos, botones, tablas e imágenes.
Etiquetas importantes: <html>, <head>, <body>, <h1>, <p>, <button>
CSS (Diseño de la web)
CSS permite dar estilo a la página: colores, tamaños, posiciones y diseño.
Propiedades importantes:
- background-color: color de fondo
- color: color del texto
- padding: espacio interno
- margin: espacio externo
- border: borde
- border-radius: bordes redondeados
Clases en CSS:
Se definen con un punto. Ejemplo: .testbtn { }
:hover
Permite cambiar el estilo cuando el mouse pasa sobre un elemento.
Tablas en HTML y CSS
Las tablas permiten mostrar datos organizados en filas y columnas.
Etiquetas: table, tr, th, td
CSS importante:
- border-collapse: une bordes
- width: define ancho
- nth-child(even): colorea filas pares
JavaScript (Interacción)
Permite que la página sea dinámica.
Ejemplo: mostrar fecha con un botón usando onclick.
PHP (Backend)
Permite procesar datos del usuario y conectarse a bases de datos.
Funciones importantes:
- htmlspecialchars(): evita problemas de seguridad
- echo: muestra información
- execute(): ejecuta consultas
Base de Datos
Permite guardar información como gastos.
Se usa SQL con INSERT para guardar datos.
Flujo del sistema de gastos
1. Usuario ingresa datos en formulario HTML
2. JavaScript valida datos
3. PHP procesa información
4. Se guarda en base de datos
5. Se muestra resultado
Git y GitHub
Permite guardar y subir proyectos.
Comandos
//////////////////////////////////////////////////////////////////////////////////////////7
Introducción
Este proyecto consiste en un sistema web completo que permite registrar gastos utilizando HTML,
CSS, JavaScript, PHP y MySQL.
HTML (Estructura)
Se crea un formulario que permite ingresar datos.
<form action="proces.php" method="post">
<input type="text" name="nombre">
<input type="text" name="categoria">
<input type="number" name="monto">
<input type="date" name="fecha">
</form>
HTML define la estructura de la página.
CSS (Diseño)
CSS permite mejorar la apariencia del sistema.
body {
 background: linear-gradient(135deg,#667eea,#764ba2);
}
.contenedor {
 background:white;
 border-radius:12px;
}
JavaScript (Validación)
Valida datos antes de enviarlos.
if(nombre === ""){
 alert("Campo obligatorio");
 return false;
}
PHP (Backend)
PHP procesa los datos enviados.
$nombre = $_POST['nombre'];
$stmt = $conexion->prepare("INSERT INTO gastos (Entidad,categoria,monto,fecha) VALUES (?,?,?,?)");
Se usan consultas preparadas para seguridad.
Base de Datos
CREATE TABLE gastos(
 id INT AUTO_INCREMENT PRIMARY KEY,
 Entidad VARCHAR(100),
 categoria VARCHAR(100),
 monto INT,
 fecha DATE
);
Flujo del sistema
Usuario → HTML → JavaScript valida → PHP procesa → MySQL guarda

- git add .
- git commit -m 'mensaje'
- git push
