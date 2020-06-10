<?php
require_once "../classes/surveyManagement/SelectSurvey.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SERVER["CONTENT_TYPE"]) && $_SERVER["CONTENT_TYPE"] === "application/x-www-form-urlencoded") {
    if (isset($_POST["id"])) {
        $obj = new SelectSurvey($_POST["id"]);
        $msg = "Operación realizada correctamente";
    } else {
        $msg = "No se inicializó correctamente las variables";
    }
} else {
    $msg = "Solo habilidado para post request y application/x-www-form-urlencoded.";
}

echo $msg;
