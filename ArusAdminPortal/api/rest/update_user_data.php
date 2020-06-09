<?php
require_once "../classes/userManagement/UpdateUserData.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SERVER["CONTENT_TYPE"]) && $_SERVER["CONTENT_TYPE"] === "application/x-www-form-urlencoded") {
    if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["pin"])) {
        $obj = new UpdateUserData($_POST["id"], $_POST["name"], $_POST["pin"]);
        $msg = $obj->updateInfo();
    } else {
        $msg = "No se inicializó correctamente las variables";
    }
} else {
    $msg = "Solo habilidado para post request y application/x-www-form-urlencoded.";
}

echo $msg;
