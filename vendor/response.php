<?php
require "autoload.php";
use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;
$data = json_decode(file_get_contents("php://input"));
$text = $data->text;
$client = new Client("AIzaSyDufX-3u7z3HsV7dBbbNIVbL8FsVWEOMF4");
$response = $client->geminiPro()->generateContent(
    new TextPart($text),
);
echo $response->text();
