<?php
session_start();
require_once 'conexion.php';

// ======================
// REGISTRO
// ======================
if (isset($_POST['registrar'])) {
    $nombre = $_POST['nombre'];  // nombre del input en el formulario
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $tipo_usuario = $_POST['tipo'];

    // Verificar si el email ya existe
    $checkEmail = $enlace->query("SELECT email FROM usuarios WHERE email = '$email'");

    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = '¡El email ya está registrado!';
        header("Location: ../registro.php");
        exit();
    }

// Insertar usuario
    $insertUsuario = $enlace->query("INSERT INTO usuarios(nombre, email, contraseña, tipo_usuario) 
                                     VALUES ('$nombre', '$email', '$password', '$tipo_usuario')");

    if ($insertUsuario) {

        // 🔥 NUEVO: Obtener ID del usuario creado
        $id_usuario = $enlace->insert_id;

        // 🔥 NUEVO: Si es negocio, guardar en tabla negocios
        if ($tipo_usuario == "negocio") {

            $nombre_negocio = $_POST['nombre_negocio'];
            $descripcion = $_POST['descripcion'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];

            $enlace->query("INSERT INTO negocios(id_usuario, nombre_negocio, descripcion, telefono, direccion)
                            VALUES ('$id_usuario', '$nombre_negocio', '$descripcion', '$telefono', '$direccion')");
        }


}
    $_SESSION['register_success'] = '¡Registro exitoso! Ahora inicia sesión.';
    header("Location: ../login.php");
    exit();
}

// ======================
// LOGIN
// ======================
if (isset($_POST['entrar'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Buscar usuario en la base de datos
    $result = $enlace->query("SELECT * FROM usuarios WHERE email = '$email'");

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verificar contraseña
        if (password_verify($password, $user['contraseña'])) {
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['email']  = $user['email'];
            $_SESSION['tipo_usuario'] = $user['tipo_usuario'];

  // Login exitoso → ir a principal.php
if ($user['tipo_usuario'] == "negocio") {
    header("Location: ../dashboard.php");
} else {
    header("Location: ../principal.php");
}
exit();
        }
    }

    // Login fallido → volver al login con mensaje
    $_SESSION['login_error'] = "Email o contraseña incorrectos";
    header("Location: ../login.php");
    exit();
}
?>