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
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
              integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
              crossorigin="anonymous">
        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
                crossorigin="anonymous"></script>

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
                    <a href="/seleccionar-encuestas">
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
                    <a href="/impresoras">
                        <i class="fas fa-print"></i>
                        <h3>Gestión impresoras</h3>
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