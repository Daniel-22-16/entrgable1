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
    $idProducto = isset($_POST['id_producto']) ? $_POST['id_producto'] : '';
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : '';
    $direccionEnvio = isset($_POST['direccion']) ? $_POST['direccion'] : '';

    // Insertar datos en la base de datos
    $sql = "INSERT INTO compras (id_producto, cantidad, direccion_envio) VALUES ('$producto', $cantidad, '$direccionEnvio')";

    if ($conn->query($sql) === TRUE) {
        echo "Compra realizada con éxito";
    } else {
        echo "Error al realizar la compra: " . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
}
?>