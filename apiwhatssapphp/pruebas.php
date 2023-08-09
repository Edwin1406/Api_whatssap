<?php

const token = "EAALpQRxyXkgBO3YoOO2cygTzWJv8wf5nMW9RA3LSEy2ZCZAOASmgRNS46OSZBJcGiFmpLfdo0Yi3Xb1nWAJYfegnGJ6G5VvML2pHpFMdZCxOdtNfk8qYx1xWqo8vWHMinKj3953K5mVsIvFtTpdUyxWrMmQvWcMVd8baUqCQMR5IDWYJ5MZAoyFPTeqIvakW8";
const webhook = "https://serviacril.000webhostapp.com/api.php";

// Función para conectar a la base de datos
function conectarBaseDeDatos() {
    $host = "localhost";
    $usuario = "root";
    $contraseña = "";
    $baseDeDatos = "id20082440_comentarios";

    $conn = new mysqli($host, $usuario, $contraseña, $baseDeDatos);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    return $conn;
}

// Función para obtener los números desde la base de datos
function obtenerNumerosDesdeBaseDeDatos() {
    $conn = conectarBaseDeDatos();
    $query = "SELECT numeros FROM numero WHERE id = 1"; // Cambia 1 por el ID correcto
    $result = $conn->query($query);

    $numeros = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $numeros[] = $row["numero"];
        }
    }

    $conn->close();

    return $numeros;
}




function enviarMensajes($numero) {
    $data = json_encode([
        "messaging_product" => "whatsapp",    
        "recipient_type" => "individual",
        "to" => $numero,
        "type" => "text",
        "text" => [
            "preview_url" => false,
            "body" => "Mensaje de ejemplo"
        ]
    ]);

    $options = [
        'http' => [
            'method' => 'POST',
            'header' => "Content-type: application/json\r\nAuthorization: Bearer " . token . "\r\n",
            'content' => $data,
            'ignore_errors' => true
        ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents('https://graph.facebook.com/v17/113319844996763/messages', false, $context);

    if ($response === false) {
        echo "Error al enviar el mensaje\n";
    } else {
        echo "Mensaje enviado correctamente\n";
    }
}

function recibirMensajes($req, $res) {
    try {
        $archivo = fopen("log.txt", "a");
        $texto = json_encode($req);
        fwrite($archivo, $texto);
        fclose($archivo);

        // Obtener los números desde la base de datos
        $numeros = obtenerNumerosDesdeBaseDeDatos();

        // Enviar mensajes a los números obtenidos
        $mensaje = "Hola desde WhatsApp!";
        enviarMensajes($numeros[0], $mensaje); // Aquí se pasa solo el primer número

        $res->send("EVENT_RECEIVED");
    } catch (Exception $e) {
        $res->send("EVENT_RECEIVED");
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    recibirMensajes($data, http_response_code());
} else if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (
        isset($_GET['hub_mode']) &&
        isset($_GET["hub_verify_token"]) &&
        isset($_GET["hub_challenge"]) &&
        $_GET["hub_mode"] === 'subscribe' &&
        $_GET["hub_verify_token"] === token
    ) {
        echo $_GET["hub_challenge"];
    } else {
        http_response_code(403);
    }
}

?>
