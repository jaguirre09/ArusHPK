<?php
header("Content-Type: application/json");
require_once "classes/login.php";

$login = new login(1032500358, true);
$userObject = $login->getUser();

echo json_encode([
    "id" => $userObject->getId(),
    "name" => $userObject->getName(),
    "enabled" => $userObject->isEnabled(),
    "user_type" => $userObject->getUserType(),
    "error" => $userObject->isError(),
    "err_desc" => $userObject->getErrDesc()
], JSON_PRETTY_PRINT);
