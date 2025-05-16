<?php
session_start();
$conexion = mysqli_connect("localhost", "root", "", "curso_php_mysql");

$correo = $_POST['correo'];
$clave = $_POST['clave'];

$sql = "SELECT * FROM usuarios WHERE correo='$correo'";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) == 1) {
    $usuario = mysqli_fetch_assoc($resultado);

    if (password_verify($clave, $usuario['clave'])) {
        $_SESSION['usuario'] = $usuario['nombre'];
        header("Location: bienvenido.php");
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Correo no registrado.";
}
?>
