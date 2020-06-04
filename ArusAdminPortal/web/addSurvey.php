<main class="dashboard">
    <header class="header-dashboard">
        <div class="header-item">
            <h2>Agregar encuesta</h2>
        </div>
        <div class="header-item">
            <h2><a href="">Salir</a></h2>
        </div>
    </header>
    <?php require "includes/aside.php"?>
    <div class="add-survey">
        <div class="add">
            <hr>
            <div class="space">
                <input type="text" placeholder="Titulo de la encuesta" style="color: #004284">
                <h5 style="color: #004284">Describa las instrucciones de la encuesta</h5>
            </div>
        </div>
        <div class="add">
            <div class="space">
                1. Primera pregunta de la encuesta y primer método de respuesta
                <input type="text" name="question" placeholder="Pregunta" style="margin-bottom: 10px;margin-top:10px">
                <input type="text" name="answer" placeholder="Respuesta">
            </div>
        </div>
        <div class="add">
            <div class="space">
                <div class="position-star">
                    <div class="add-- ">4. tercera pregunta de la encuesta y tercer método de respuesta respuesta
                        multiple
                    </div>
                    <div class="center">inicio</div>
                    <div><img src="assets/img/star.png" alt=""></div>
                    <div><img src="assets/img/star.png" alt=""></div>
                    <div><img src="assets/img/star.png" alt=""></div>
                    <div><img src="assets/img/star.png" alt=""></div>
                    <div><img src="assets/img/star.png" alt=""></div>
                    <div class="center">final</div>
                </div>
            </div>
        </div>
        <div class="add">
            <div class="space">
                3. tercera pregunta de la encuesta y tercer método de respuesta respuesta unica<br>
                <input type="checkbox" name="question" style="margin-bottom: 10px;margin-top:10px; width: 10% ">Si<br>
                <input type="checkbox" name="answer" value="No" style="width: 10% ">No
            </div>
        </div>
        <div class="add">
            <div class="position space">
                <div class="add- ">4. tercera pregunta de la encuesta y tercer método de respuesta respuesta multiple
                </div>
                <div><input type="text" placeholder="Texto"></div>
                <div class="center"><img src="assets/img/no-Like.png" alt=""></div>
                <div class="center"><img src="assets/img/like.png" alt=""></div>
                <div><input type="text" placeholder="Texto"></div>
                <div class="center"><img src="assets/img/no-Like.png" alt=""></div>
                <div class="center"><img src="assets/img/like.png" alt=""></div>
                <div><input type="text" placeholder="Texto"></div>
                <div class="center"><img src="assets/img/no-Like.png" alt=""></div>
                <div class="center"><img src="assets/img/like.png" alt=""></div>
            </div>
        </div>
        <div class="add">
            <div class="position space">
                <div class="add- ">5. tercera pregunta de la encuesta y tercer método de respuesta respuesta multiple
                </div>
                <div></div>
                <div style="text-align: center">Mucho</div>
                <div style="text-align: center">Poco</div>
                <div><input type="text" placeholder="Texto"></div>
                <div class="center"><input type="checkbox"></div>
                <div class="center"><input type="checkbox"></div>
                <div><input type="text" placeholder="Texto"></div>
                <div class="center"><input type="checkbox"></div>
                <div class="center"><input type="checkbox"></div>
                <div><input type="text" placeholder="Texto"></div>
                <div class="center"><input type="checkbox"></div>
                <div class="center"><input type="checkbox" class="center"></div>
            </div>
        </div>
        <input type="button" class="button" value="Guardar" style="width: 30%;height: 40px">
    </div>
    <?php include_once "includes/footer.php"?>
</main>
