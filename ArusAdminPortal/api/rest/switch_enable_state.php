<?php
require_once "../classes/SwitchEnabledState.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SERVER["CONTENT_TYPE"]) && $_SERVER["CONTENT_TYPE"] === "application/x-www-form-urlencoded") {
    if (isset($_POST["id"]) && isset($_POST["state"])) {
        $obj = new SwitchEnabledState($_POST["id"], $_POST["state"]);
        $msg = $obj->switchState();
    } else {
        $msg = "No se inicializó correctamente las variables";
    }
} else {
    $msg = "Solo habilidado para post request y application/x-www-form-urlencoded.";
}

echo $msg;
