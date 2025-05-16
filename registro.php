<?php
$conexion = mysqli_connect("localhost", "root", "", "curso_php_mysql");

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, correo, clave) VALUES ('$nombre', '$correo', '$clave')";

if (mysqli_query($conexion, $sql)) {
    echo "Usuario registrado con éxito. <a href='login.html'>Iniciar sesión</a>";
} else {
    echo "Error al registrar: " . mysqli_error($conexion);
}
?>
