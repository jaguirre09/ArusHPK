<?php
header("Content-Type: application/json");
require_once "../classes/surveyManagement/GetSurvey.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $myFile = fopen("survey.arus", "r") or die("No se puede abrir el archivo survey.arus");
    $id = fread($myFile, filesize("survey.arus"));
    fclose($myFile);

    $questions = new GetSurvey($id);
    $response = $questions->getSurveyId();
} else {
    $response = ["title" => "Error en el servidor", "desc" => "Solo habilidado para get", "questions" => []];
}

echo json_encode($response, JSON_PRETTY_PRINT);
