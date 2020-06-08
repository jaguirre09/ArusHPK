<?
session_start();
if (!isset($_SESSION["arusAdminId"])) {
    header("location: /");
}
session_regenerate_id(true);

function head(string $title)
{
    ?>
    <!doctype html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
              integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
              crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
        <link rel="stylesheet" href="../css/style.css">
        <title><? echo $title; ?></title>
    </head>
<body>

<main class="dashboard">
    <header class="header-dashboard">
        <div class="header-item">
            <h2><? echo $title; ?></h2>
        </div>
        <div class="header-item">
            <h2>¡Hola <? echo $_SESSION["arusAdminName"]; ?>! | <a href="logout">Salir</a></h2>
        </div>
    </header>

    <aside class="menu">
        <h2 class="title-dashboard">
            Panel administración
        </h2>
        <nav>
            <ul>
                <li>
                    <a href="/dashboard">
                        <i class="fas fa-plus-circle"></i>
                        <h3>Añadir encuestas</h3>
                    </a>
                </li>
                <li>
                    <a href="/gestionar-encuestas">
                        <i class="fas fa-folder-open"></i>
                        <h3>Gestionar encuestas</h3>
                    </a>
                </li>
                <li>
                    <a href="/gestionar-usuarios">
                        <i class="fas fa-user-plus"></i>
                        <h3>Gestionar usuarios</h3>
                    </a>
                </li>
                <li>
                    <a href="/configuraciones">
                        <i class="fas fa-cog"></i>
                        <h3>Configuraciones</h3>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
<? } ?>