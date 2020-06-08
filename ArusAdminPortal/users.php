<?php
require_once "includes/header.php";
head("Gestionar Usuarios");
?>
<div class="margin">
    <form action="login.php" method="post" class="management-user">
        <div class="styl"><b>Nombre</b></div>
        <div class="styl"><b>Usuario</b></div>
        <div class="styl"><b>Departamento</b></div>
        <div class="styl"><b>Correo</b></div>
        <div class="styl"><input type="text" name="n-name"></div>
        <div class="styl"><input type="text" name="u-user"></div>
        <div class="styl"><input type="text" name="b-bureau"></div>
        <div class="styl"><input type="email" name="e-email"></div>
        <div class="button"><input type="button" value="Nuevo" class="button"></div>
    </form>
</div>
<?php require_once "includes/footer.php" ?>
