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
    die(json_encode(["error" => "Conexión fallida: " . $conn->connect_error]));
}

// Consulta para obtener todas las opiniones
$sql = "SELECT nombre, email, titulo, opinion, fecha FROM opiniones ORDER BY fecha DESC";
$result = $conn->query($sql);

$opiniones = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $opiniones[] = [
            "nombre" => $row["nombre"],
            "email" => $row["email"],
            "titulo" => $row["titulo"],
            "opinion" => $row["opinion"],
            "fecha" => $row["fecha"]
        ];
    }
}

// Retornar los datos en formato JSON
echo json_encode($opiniones);

$conn->close();
?>
