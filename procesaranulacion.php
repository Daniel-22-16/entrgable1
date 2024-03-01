<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ferreteria";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario solo si están definidos
    $direccionEnvio = isset($_POST['direccion']) ? $_POST['direccion'] : '';

    // Insertar datos en la tabla 'anulaciones'
    $sql = "INSERT INTO anulaciones (direccion_envio) VALUES ('$direccionEnvio')";

    if ($conn->query($sql) === TRUE) {
        echo "Compra anulada con éxito";
    } else {
        echo "Error al anular la compra: " . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
}
?>
