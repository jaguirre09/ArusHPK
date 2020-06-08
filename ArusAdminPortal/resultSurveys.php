<main class="dashboard">
    <header class="header-dashboard">
        <div class="header-item">
            <h2>Añadir encuesta</h2>
        </div>
        <div class="header-item">
            <h2><a href="">Salir</a></h2>
        </div>
    </header>
    <?php include_once "includes/aside.php"
    ?>
    <section class="select-survey">
        <a href="selectSurveys.php">
            <div class="buttons"><b>Seleccionar encuesta</b><br><br><input type="button" class="buttons-2"
                                                                           name="select-button-1"></div>
        </a>
        <a href="resultSurveys.php">
            <div class="buttons"><b>Resultados encuestas</b><br><br><input type="button" class="buttons-1"
                                                                           name="select-button-2"
                                                                           style="background: #004284"></div>
        </a>
        <div class="card-survey">
        </div>
        <div class="card-survey">
        </div>
        <div class="card-survey">
        </div>
        <div class="card-survey">
        </div>
    </section>
    <?php include_once "includes/aside.php"
    ?>
</main>