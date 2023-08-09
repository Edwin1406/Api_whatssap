<?php

const token = "EAALpQRxyXkgBO3YoOO2cygTzWJv8wf5nMW9RA3LSEy2ZCZAOASmgRNS46OSZBJcGiFmpLfdo0Yi3Xb1nWAJYfegnGJ6G5VvML2pHpFMdZCxOdtNfk8qYx1xWqo8vWHMinKj3953K5mVsIvFtTpdUyxWrMmQvWcMVd8baUqCQMR5IDWYJ5MZAoyFPTeqIvakW8";
const webhook = "https://serviacril.000webhostapp.com/api.php";

function verificarTOKEN($req, $res)
{
    try {
        $token_url = $req['hub_verify_token'];
        $challenge = $req['hub_challenge'];

        if (isset($challenge) && isset($token_url) && $token_url === token) {
            $res->send($challenge);
        } else {
            $res->status(400)->send();
        }
    } catch (Exception $e) {
        $res->status(400)->send();
    }
}

function recibirMensajes($req, $res)
{
    try {
        $archivo =fopen("log.txt","a");
        $texto = json_encode($req);
        fwrite($archivo,$texto);
        fclose($archivo);
        // text
        

        

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
