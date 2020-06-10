<?php
require_once "includes/header.php";
require_once "api/classes/surveyManagement/ListSurveys.php";
head("Añadir encuesta");

$obj = new ListSurveys();
$surveys = $obj->getSurveys();
?>
<section class="main-dashboard">
    <div class="card">
        <i class="fas fa-plus"></i>
    </div>
    <? foreach ($surveys as $survey) : ?>
        <div class="card">
            <p><b><? echo $survey["title"]; ?></b></p>
            <p>publicada el:<br><? echo $survey["creationDate"]; ?></p>
            ID: <? echo $survey["id"]; ?>
        </div>
    <? endforeach; ?>
</section>
<?php require_once "includes/footer.php"; ?>
