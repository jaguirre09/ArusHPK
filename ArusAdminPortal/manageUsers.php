<?php
require_once "includes/header.php";
require_once "api/classes/ListUsers.php";
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
            <th scope="col">Habilitado</th>
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
                <td><a href="#"><i class="fas fa-pen"></i></a></td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
    <button onclick="window.location = '/agregar-usuario';">Agregar Usuario</button>
</div>
<?php require_once "includes/footer.php" ?>
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
</script>
