<?
session_start();
if (isset($_SESSION["arusAdminId"])) {
    session_regenerate_id(true);
    header("location: /dashboard");
}
if (isset($_POST["pin"])) {
    require_once "api/classes/Login.php";
    $obj = new login($_POST["pin"], true);
    $user = $obj->getUser();
    if ($user->isError()) {
        $message = $user->getErrDesc();
    } else if (!$user->isEnabled()) {
        $message = "El usuario " . $user->getName() . " no se encuentra habilitado";
    } else {
        $_SESSION["arusAdminId"] = $user->getId();
        $_SESSION["arusAdminName"] = $user->getName();
        header("location: /dashboard");
    }
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="assets/icon.png"/>
    <meta name="robots" content="noindex, nofollow, nosnippet, noimageindex">
    <title>Iniciar sesión</title>
</head>
<body>
<main class="login">
    <img class="bg-login" src="assets/bg-login.jpg" alt="">
    <div class="login-section">
        <div class="container">
            <div class="row">
                <div class="header-login col-md-6 col-12">
                    <h1 class="header-text-login">
                        Bienvenido al sistema de administración
                    </h1>
                </div>
            </div>
            <div class="form-login row">
                <form method="POST" class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="pin">Pin</label>
                        <input type="password" name="pin"
                               class="form-control <? echo isset($message) ? "is-invalid" : ""; ?>" id="pin"
                               value="<? echo isset($_POST["pin"]) ? $_POST["pin"] : ""; ?>">
                        <div class="invalid-feedback">
                            <? echo isset($message) ? $message : "¡Todo Correcto!"; ?>
                        </div>
                    </div>
                    <button type="submit" class="btn-light">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>
