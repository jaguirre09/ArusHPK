<?php
require_once "includes/header.php";
require_once "api/classes/constants.php";
head("Configuraciones");
?>
<div class="m-3">
    <div class="form-group col-12">
        <label for="support1">Servidor SMTP</label>
        <input class="form-control" id="support1" type="text" value="<? echo SMTP_HOST; ?>" disabled>
        <small id="emailHelp" class="form-text text-muted">Para cambiar el servidor SMTP debe actualzarse el archivo
            constants.php ubicado en <? echo $_SERVER["DOCUMENT_ROOT"]; ?>/api/classes</small>
    </div>
    <div class="form-group col-12">
        <label for="support2">Puerto SMTP</label>
        <input class="form-control" id="support2" type="text" value="<? echo SMTP_PORT; ?>" disabled>
        <small id="emailHelp" class="form-text text-muted">Para cambiar el puerto SMTP debe actualzarse el archivo
            constants.php ubicado en <? echo $_SERVER["DOCUMENT_ROOT"]; ?>/api/classes</small>
    </div>
    <div class="form-group col-12">
        <label for="support3">Protocolo SMTP</label>
        <input class="form-control" id="support3" type="text" value="<? echo SMTP_SECURE; ?>" disabled>
        <small id="emailHelp" class="form-text text-muted">Para cambiar el protocolo SMTP debe actualzarse el archivo
            constants.php ubicado en <? echo $_SERVER["DOCUMENT_ROOT"]; ?>/api/classes</small>
    </div>
    <div class="form-group col-12">
        <label for="support4">Correo de soporte (Emisor)</label>
        <input class="form-control" id="support4" type="email" value="<? echo SMTP_USERNAME; ?>" disabled>
        <small id="emailHelp" class="form-text text-muted">Para cambiar el correo de soporte debe actualzarse el archivo
            constants.php ubicado en <? echo $_SERVER["DOCUMENT_ROOT"]; ?>/api/classes</small>
    </div>
    <div class="form-group col-12">
        <label for="support5">Correo de soporte (Receptor)</label>
        <input class="form-control" id="support5" type="email" value="<? echo EMAIL_RECIPIENT; ?>"
               disabled>
        <small id="emailHelp" class="form-text text-muted">Para cambiar el correo de soporte debe actualzarse el archivo
            constants.php ubicado en <? echo $_SERVER["DOCUMENT_ROOT"]; ?>/api/classes</small>
    </div>
</div>
<?php require_once "includes/footer.php" ?>
