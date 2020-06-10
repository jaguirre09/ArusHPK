<?php


class GetSurvey
{
    private int $surveyId;

    /**
     * GetSurvey constructor.
     *
     * required call $getSurveyId to get JSON
     *
     * @param int $surveyId Survey id
     */
    public function __construct(int $surveyId)
    {
        $this->surveyId = $surveyId;
    }

    /**
     * @return array return array with questions
     */
    public function getSurveyId(): array
    {
        $con = null;
        require_once __DIR__ . "/../connection.php"; // include $con
        $query = "SELECT TITLE, DESCRIPTION, QUESTIONS FROM SURVEYS WHERE ID = ?";
        $prepare = mysqli_stmt_init($con);
        if (mysqli_stmt_prepare($prepare, $query)) {
            mysqli_stmt_bind_param($prepare, "i", $this->surveyId);
            mysqli_stmt_execute($prepare);
            mysqli_stmt_bind_result($prepare, $title, $desc, $json);
            mysqli_stmt_fetch($prepare);
            mysqli_stmt_close($prepare);

            return ["title" => $title, "desc" => $desc, "questions" => json_decode($json, true)];
        } else {
            return ["title" => "Error en el servidor", "desc" => "Ocurrió un error el procesar la solicitud", "questions" => []];
        }
    }
}
