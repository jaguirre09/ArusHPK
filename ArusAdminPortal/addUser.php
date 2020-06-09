<?php
require_once "includes/header.php";
require_once "api/classes/CreateUser.php";
head("Crear usuario");
if (isset($_POST["name"]) && isset($_POST["pin"])) {
    if (!isset($_POST["role"])) {
        $message = "No se seleccionó rol";
    } else if ($_POST["role"] > 2) {
        $message = "Rol no v[alido";
    } else {
        $creator = new CreateUser($_POST["name"], $_POST["pin"], $_POST["role"] == User::ADMIN ? true : ($_POST["role"] == false ? User::USER : ""));
        $message = $creator->create();
        if ($message === true) {
            $message = ($_POST["role"] == User::ADMIN ? "Administrador" : "Usuario") . " " . $_POST["name"] . " creado correctamente";
        } else if (strpos($message, "Duplicate entry") == 0) {
            $message = "El pin " . $_POST["pin"] . " ya es " . ($_POST["role"] == User::ADMIN ? "Administrador" : "Usuario");
        }
    }
}
?>
<form method="POST">
    <? if (isset($message)) : ?>
        <h3><? echo $message; ?></h3>
    <? endif; ?>
    <div class="form-group col-md-5">
        <label for="inputName">Nombre</label>
        <input name="name" type="text" class="form-control" id="inputName" required>
    </div>
    <div class="form-group col-md-5">
        <label for="inputPin">Pin</label>
        <input name="pin" type="text" class="form-control" id="inputPin" required autocomplete="off">
    </div>
    <div class="form-group col-md-5">
        <label for="role">Rol</label>
        <select name="role" id="role" class="form-control" required>
            <option value="0" selected disabled>Seleccionar rol</option>
            <option value="<? echo User::ADMIN; ?>">Administrador</option>
            <option value="<? echo User::USER; ?>">Usuario</option>
        </select>
    </div>
    <button type="submit">Agregar</button>
</form>
<?php require_once "includes/footer.php" ?>
