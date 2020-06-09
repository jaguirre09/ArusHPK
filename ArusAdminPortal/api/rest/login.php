<?php
header("Content-Type: application/json");
require_once "../classes/Login.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SERVER["CONTENT_TYPE"]) && $_SERVER["CONTENT_TYPE"] === "application/x-www-form-urlencoded") {
    if (isset($_POST["pin"]) && isset($_POST["isAdmin"])) {
        $isAdmin = $_POST["isAdmin"] == "true";
        $login = new login($_POST["pin"], $isAdmin);
        $userObject = $login->getUser();
    } else {
        $userObject = new user(0, "", false, 0, true, "No se pasaron correctamente las variables pin y/o isAdmin");
    }
} else {
    $userObject = new user(0, "", false, 0, true, "Solo habilidado para post request y application/x-www-form-urlencoded.");
}

echo json_encode([
    "id" => $userObject->getId(),
    "name" => $userObject->getName(),
    "enabled" => $userObject->isEnabled(),
    "user_type" => $userObject->getUserType(),
    "error" => $userObject->isError(),
    "err_desc" => $userObject->getErrDesc()
], JSON_PRETTY_PRINT);
