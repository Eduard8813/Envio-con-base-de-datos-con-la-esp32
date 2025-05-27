<?php
$servername = "localhost";
$username = "root";  // Ajusta si tienes otro usuario
$password = ""; // Si XAMPP usa contraseña, añádela aquí
$dbname = "esp32_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el mensaje enviado por la ESP32
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["mensaje"])) {
    $mensaje = $_GET["mensaje"];
    $sql = "INSERT INTO mensajes (mensaje) VALUES ('$mensaje')";

    if ($conn->query($sql) === TRUE) {
        echo "Mensaje guardado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
