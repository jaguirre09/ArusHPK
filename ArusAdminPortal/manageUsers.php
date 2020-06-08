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
                <td><? echo $x->isEnabled() ? "Habilitado" : "Deshabilitado"; ?></td>
                <td><? echo $x->getUserType() == User::ADMIN ? "Administrador" : ($x->getUserType() == User::USER ? "Usuario" : "ErrorBD"); ?></td>
                <td><a href="#"><i class="fas fa-pen"></i></a></td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
    <button onclick="window.location = '/agregar-usuario';">Agregar Usuario</button>
</div>
<?php require_once "includes/footer.php" ?>
