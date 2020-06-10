<?php
header("Content-Type: application/json");
require_once "../classes/surveyManagement/GetSurvey.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $questions = new GetSurvey(1);
    $response = $questions->getSurveyId();
} else {
    $response = ["title" => "Error en el servidor", "desc" => "Solo habilidado para get", "questions" => []];
}

echo json_encode($response, JSON_PRETTY_PRINT);
