<?php
header("Content-Type: application/json");
require_once "../classes/AnswerSurvey.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SERVER["CONTENT_TYPE"]) && $_SERVER["CONTENT_TYPE"] === "application/json") {
    $request = json_decode(file_get_contents('php://input'), true);
    $send = new AnswerSurvey($request["survey_id"], $request["user_id"], json_encode($request["answers"]));
    if ($send->send() === true) {
        $response = ["sent" => true, "errdesc" => ""];
    } else {
        $response = ["sent" => false, "errdesc" => $send->send()];
    }
} else {
    $response = ["sent" => false, "errdesc" => "Solo habilidado para post request y application/json."];
}

echo json_encode($response, JSON_PRETTY_PRINT);
