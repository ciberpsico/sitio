<?php
header('Content-Type: application/json');

$servername = "sql110.infinityfree.com";
$username = "if0_37095529";
$password = "ciberpsicologia";
$dbname = "if0_37095529_ciberpsicologia";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Conexión fallida: " . $conn->connect_error]));
}

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$titulo = $_POST['titulo'];
$opinion = $_POST['opinion'];

// Preparar y ejecutar la consulta
$stmt = $conn->prepare("INSERT INTO opiniones (nombre, email, titulo, opinion) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $email, $titulo, $opinion);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Error al guardar la opinión."]);
}

$stmt->close();
$conn->close();
?>
