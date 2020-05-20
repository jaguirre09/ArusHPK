<?php
header("Content-Type: application/json");
require_once "../classes/SendEmail.php";

$content = file_get_contents('php://input');
if ($content == "") {
    $emailStatus = ["sent" => false, "errdesc" => "No se ha pasado ningún texto JSON"];
} elseif ($_SERVER["REQUEST_METHOD"] === "POST" && $_SERVER["CONTENT_TYPE"] === "application/json") {
    $decode = json_decode($content, true);
    $object = new SendEmail($decode["name"], $decode["phone"], $decode["location"], $decode["message"], $decode["printer"]);
    $status = $object->sendMail();
    if ($status === true) {
        $emailStatus = ["sent" => true, "errdesc" => ""];
    } else {
        $emailStatus = ["sent" => false, "errdesc" => "Error enviando mensaje -> $status"];
    }
} else {
    $emailStatus = ["sent" => false, "errdesc" => "Solo habilidado para post request y application/json."];
}

echo json_encode($emailStatus, JSON_PRETTY_PRINT);