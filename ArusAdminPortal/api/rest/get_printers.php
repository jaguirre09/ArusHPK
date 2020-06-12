<?php
header("Content-Type: application/json");
require_once __DIR__ . "/../classes/PrintersManager.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $response = [];
    $printers = PrintersManager::getPrinters();
    foreach ($printers as $printer) {
        array_push($response, ["id" => $printer->getId(), "name" => $printer->getName(), "error" => $printer->isError(), "err_desc" => $printer->getErrDesc()]);
    }
} else {
    $response = [["id" => 0, "name" => "", "error" => true, "err_desc" => "Solo habilidado para get request"]];
}

echo json_encode($response, JSON_PRETTY_PRINT);
