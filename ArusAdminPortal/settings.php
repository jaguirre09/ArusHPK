<?php
require_once "includes/header.php";
require_once "api/classes/constants.php";
head("Configuraciones");
?>
<div class="management-settings m-3">
    <div class="form-group col-12">
        <label for="support">Servidor SMTP</label>
        <input class="form-control" id="support" type="email" name="e-email" value="<? echo SMTP_HOST; ?>" disabled>
        <small id="emailHelp" class="form-text text-muted">Para cambiar el servidor SMTP debe actualzarse el archivo
            constants.php ubicado en <? echo $_SERVER["DOCUMENT_ROOT"]; ?>/api/classes</small>
    </div>
    <div class="form-group col-12">
        <label for="support">Puerto SMTP</label>
        <input class="form-control" id="support" type="email" name="e-email" value="<? echo SMTP_PORT; ?>" disabled>
        <small id="emailHelp" class="form-text text-muted">Para cambiar el puerto SMTP debe actualzarse el archivo
            constants.php ubicado en <? echo $_SERVER["DOCUMENT_ROOT"]; ?>/api/classes</small>
    </div>
    <div class="form-group col-12">
        <label for="support">Protocolo SMTP</label>
        <input class="form-control" id="support" type="email" name="e-email" value="<? echo SMTP_SECURE; ?>" disabled>
        <small id="emailHelp" class="form-text text-muted">Para cambiar el protocolo SMTP debe actualzarse el archivo
            constants.php ubicado en <? echo $_SERVER["DOCUMENT_ROOT"]; ?>/api/classes</small>
    </div>
    <div class="form-group col-12">
        <label for="support">Correo de soporte (Emisor)</label>
        <input class="form-control" id="support" type="email" name="e-email" value="<? echo SMTP_USERNAME; ?>" disabled>
        <small id="emailHelp" class="form-text text-muted">Para cambiar el correo de soporte debe actualzarse el archivo
            constants.php ubicado en <? echo $_SERVER["DOCUMENT_ROOT"]; ?>/api/classes</small>
    </div>
    <div class="form-group col-12">
        <label for="support">Correo de soporte (Receptor)</label>
        <input class="form-control" id="support" type="email" name="e-email" value="<? echo EMAIL_RECIPIENT; ?>"
               disabled>
        <small id="emailHelp" class="form-text text-muted">Para cambiar el correo de soporte debe actualzarse el archivo
            constants.php ubicado en <? echo $_SERVER["DOCUMENT_ROOT"]; ?>/api/classes</small>
    </div>
</div>
<?php require_once "includes/footer.php" ?>
