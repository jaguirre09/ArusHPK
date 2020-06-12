<?php
require_once __DIR__ . "/../classes/PrintersManager.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SERVER["CONTENT_TYPE"]) && $_SERVER["CONTENT_TYPE"] === "application/x-www-form-urlencoded") {
    if (isset($_POST["id"])) {
        $obj = PrintersManager::deletePrinter($_POST["id"]);
        if ($obj === true) {
            $msg = "Operación realizada correctamente";
        } else if ($obj === false) {
            $msg = "Ocurrió un error desconocido";
        } else {
            $msg = $obj;
        }
    } else {
        $msg = "No se inicializó correctamente las variable id";
    }
} else {
    $msg = "Solo habilidado para post request y application/x-www-form-urlencoded.";
}

echo $msg;
