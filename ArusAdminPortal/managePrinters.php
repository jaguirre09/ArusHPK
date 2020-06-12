<?php
require_once "includes/header.php";
require_once "api/classes/surveyManagement/ListSurveys.php";
require_once "api/classes/PrintersManager.php";
head("Gestionar impresora");

if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $description = isset($_POST["desc"]) ? $_POST["desc"] : "";

    $obj = PrintersManager::addPrinter($name, $description);
    if ($obj === true) {
        $message = "Impresora $name creada correctamente";
    } elseif ($obj === false) {
        $message = "Impresora $name no pudo crearse debido a un error desconocido";
    } else {
        $message = $obj;
    }
}
?>
<section class="printers">
    <div class="printers-add">
        <? if (isset($message)) : ?>
            <h4><? echo $message; ?></h4>
        <? endif; ?>
        <form method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="printer-name">Nombre impresora</label>
                    <input name="name" class="form-control" id="printer-name" type="text" autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="printer-desc">Descripción impresora</label>
                    <input name="desc" class="form-control" id="printer-desc" type="text" autocomplete="off">
                </div>
            </div>
            <button type="submit" class="btn-blue" id="updateButton">Guardar</button>
        </form>
    </div>

    <div class="table-printers">
        <table class="table table-sm">
            <thead style="background: #004284; color: white">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre impresora</th>
                <th scope="col">Descripción</th>
                <th scope="col">Eliminar</th>
            </tr>
            </thead>
            <tbody>
            <? foreach (PrintersManager::getPrinters() as $printer) : ?>
                <tr>
                    <th scope="row"><? echo $printer->getId(); ?></th>
                    <td><? echo $printer->getName(); ?></td>
                    <td><? echo $printer->getDescription(); ?></td>
                    <td><i onclick="deletePrinter(<? echo $printer->getId(); ?>);" style="cursor: pointer;"
                           class="fas fa-trash-alt"></i></td>
                </tr>
            <? endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<script>
    function deletePrinter(id) {
        let url = window.location.origin + "/api/rest/delete_printer.php";
        let data = "id=" + id;
        $.ajax({
            type: 'POST',
            url: url,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            contentType: 'application/x-www-form-urlencoded; charset=utf-8',
            data: data,
            success: function (response) {
                console.log(response);
                window.location.href = ""
            },
            error: function (request, status, error) {
                alert(request.responseText + "\nStatus: " + status + "\nError: " + error);
                window.location.href = ""
            }
        })
    }
</script>
<?php require_once "includes/footer.php"; ?>
