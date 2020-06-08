<?php
require_once "includes/header.php";
require_once "api/classes/constants.php";
head("Configuraciones");
?>
<div class="management-settings">
    <div class="form-group">
        <label for="support">Correo de soporte (Emisor)</label>
        <input class="form-control" id="support" type="email" name="e-email" value="<? echo SMTP_USERNAME; ?>" disabled>
        <small id="emailHelp" class="form-text text-muted">Para cambiar el correo de soporte debe actualzarse el archivo
            constants.php ubicado en <? echo $_SERVER["DOCUMENT_ROOT"]; ?>/api/classes</small>
    </div>
</div>
<?php require_once "includes/footer.php" ?>
