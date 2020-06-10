<?php
require_once "includes/header.php";
require_once "api/classes/surveyManagement/ListSurveys.php";
head("Gestionar impresora");
?>
    <section class="printers">
        <div class="printers-add">
            <div class="form-group col-12">
                <label for="printer-name">Nombre impresora</label>
                <input class="form-control" id="printer-name" type="text">
            </div>
            <button class="btn-blue" id="updateButton">Guardar</button>
        </div>

        <div class="table-printers">
            <table class="table table-sm">
                <thead style="background: #004284; color: white">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre impresora</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Eliminar</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <th scope="row">001</th>
                        <td>Contabilidad</td>
                        <td>Habilitado</td>
                        <td>
                            <i style="cursor: pointer;"
                               class="fas fa-trash-alt">
                            </i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>


<?php require_once "includes/footer.php"; ?>