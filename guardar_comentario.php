<?php
header("Content-Type: application/json");

$servername = "sql110.infinityfree.com";
$username = "if0_37095529";
$password = "ciberpsicologia";
$dbname = "if0_37095529_ciberpsicologia";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(["error" => "Conexión fallida: " . $conn->connect_error]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $mensaje = $conn->real_escape_string($_POST['mensaje']);

    $sql = "INSERT INTO comentarios (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";

    if ($conn->query($sql) === TRUE) {        
        header("Location: contacto.html");
        exit();
    } else {
        echo json_encode(["error" => "Error al guardar el comentario: " . $conn->error]);
    }
}

$conn->close();
?>
