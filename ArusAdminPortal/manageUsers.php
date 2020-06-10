<?php
require_once "includes/header.php";
require_once "api/classes/userManagement/ListUsers.php";
head("Gestionar Usuarios");
$users = new ListUsers();
?>
<div class="margin">
    <table class="table table-sm">
        <thead style="background: #004284; color: white">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Pin</th>
            <th scope="col">Inicio de Sesión</th>
            <th scope="col">Tipo de usuario</th>
            <th scope="col">Editar</th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($users->getUsers() as $x) : ?>
            <tr>
                <th scope="row"><? echo $x->getId(); ?></th>
                <td><? echo $x->getName(); ?></td>
                <td><? echo $x->getPin(); ?></td>
                <td onclick="switchState(<? echo $x->getId(); ?>, <? echo $x->isEnabled() ? 1 : 0; ?>)"
                    style="cursor: pointer; color: <? echo $x->isEnabled() ? "green" : "red"; ?>">
                    <b><? echo $x->isEnabled() ? "Habilitado" : "Deshabilitado"; ?></b></td>
                <td><? echo $x->getUserType() == User::ADMIN ? "Administrador" : ($x->getUserType() == User::USER ? "Usuario" : "ErrorBD"); ?></td>
                <td>
                    <i style="cursor: pointer;"
                       onclick="updateUser(<? echo $x->getId(); ?>, '<? echo $x->getName(); ?>', <? echo $x->getPin(); ?>);"
                       class="fas fa-pen">
                    </i>
                </td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
    <button class="btn-blue" onclick="window.location = '/agregar-usuario';">Agregar Usuario</button>
</div>
<?php require_once "includes/footer.php" ?>
<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span id="close">&times;</span>
        <div class="form-group">
            <label for="updateId">ID de usuario</label>
            <input type="number" class="form-control" id="updateId" disabled>
        </div>
        <div class="form-group">
            <label for="updateName">Nombre del Usuario</label>
            <input type="text" class="form-control" id="updateName" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="updatePin">Pin</label>
            <input type="number" class="form-control" id="updatePin" autocomplete="off">
        </div>
        <button class="btn-blue center" id="updateButton">Actualizar</button>
    </div>
</div>
<script>
    function switchState(id, actualState) {
        let url = window.location.origin + "/api/rest/switch_enable_state.php"
        let data = "id=" + id + "&state=" + actualState
        $.ajax({
            type: 'POST',
            url: url,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            contentType: 'application/x-www-form-urlencoded; charset=utf-8',
            data: data,
            success: function (response) {
                console.log(response);
                window.location.reload()
            },
            error: function (request, status, error) {
                alert(request.responseText + "\nStatus: " + status + "\nError: " + error);
                window.location.reload()
            }
        })
    }

    function updateUser(id, name, pin) {
        let modal = document.getElementById("myModal");
        let span = document.getElementById("close");
        let btn = document.getElementById("updateButton");

        let upID = document.getElementById("updateId");
        let upName = document.getElementById("updateName");
        let upPin = document.getElementById("updatePin");

        upID.value = id;
        upName.value = name;
        upPin.value = pin;

        modal.style.display = "block";

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        btn.onclick = function () {
            let url = window.location.origin + "/api/rest/update_user_data.php"
            let data = "id=" + id + "&name=" + upName.value + "&pin=" + upPin.value
            $.ajax({
                type: 'POST',
                url: url,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                contentType: 'application/x-www-form-urlencoded; charset=utf-8',
                data: data,
                success: function (response) {
                    console.log(response);
                    window.location.reload()
                },
                error: function (request, status, error) {
                    alert(request.responseText + "\nStatus: " + status + "\nError: " + error);
                    window.location.reload()
                }
            })
        }
    }
</script>
