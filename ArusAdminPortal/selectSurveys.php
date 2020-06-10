<?php
require_once "includes/header.php";
require_once "api/classes/surveyManagement/ListSurveys.php";
head("Seleccionar encuesta");

$obj = new ListSurveys();
$surveys = $obj->getSurveys();
?>
<section class="select-survey">
    <a href="seleccionar-encuestas">
        <div class="buttons"><b>Seleccionar encuesta</b><br><br>
            <input type="button" class="buttons-2" name="select-button-1" style="background: #004284">
        </div>
    </a>
    <a href="resultados-encuestas">
        <div class="buttons"><b>Resultados encuestas</b><br><br>
            <input type="button" class="buttons-1" name="select-button-2">
        </div>
    </a>
    <? foreach ($surveys as $survey) : ?>
        <div class="card-survey">
            <h3><? echo $survey["title"]; ?></h3>
            <p>publicada el:<br><? echo $survey["creationDate"]; ?></p>
            ID: <? echo $survey["id"]; ?>
            <button>Seleccionar</button>
        </div>
    <? endforeach; ?>
</section>
<?php require_once "includes/header.php"; ?>
