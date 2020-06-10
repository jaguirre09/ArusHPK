<?php
header("Content-Type: application/json");
require_once "../classes/GetPrinters.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $printers = new GetPrinters();
    $response = $printers->getPrinters();
} else {
    $response = [["id" => 0, "name" => "", "error" => true, "err_desc" => "Solo habilidado para get request"]];
}

echo json_encode($response, JSON_PRETTY_PRINT);