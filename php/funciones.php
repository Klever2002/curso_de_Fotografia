<?php
include 'conexion.php'; // Incluye el archivo de conexión

// Función para registrar un usuario
function registrarUsuario($nombre, $email, $password) {
    global $conn;

    // Encriptar contraseña
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $email, $passwordHash);

    if ($stmt->execute()) {
        return "Usuario registrado exitosamente.";
    } else {
        return "Error: " . $stmt->error;
    }
}

// Función para iniciar sesión
function iniciarSesion($email, $password) {
    global $conn;

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        if (password_verify($password, $usuario['password'])) {
            return "Inicio de sesión exitoso.";
        } else {
            return "Contraseña incorrecta.";
        }
    } else {
        return "El usuario no existe.";
    }
}
?>
