<?php

$method = $_server['REQUEST_METHOD'];

if ($method == "POST"){
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $text = $json->result->parameters->text;

    switch ($text) {
        case 'Bonjour':
            $speech = "Bonjour, comment vas tu ?";
        break;

        case 'Salut':
            $speech = "hey man!";
        break;

        default:
            $speech = "Désolé je n'ai pas compris.";
        break;
    }

    $response = new \stdClass();
    $response->speech = "";
    $response->displayText = "";
    $response->source = "webhook";
    echo json_encode($response);
}
else
{
    echo "method not";
}
