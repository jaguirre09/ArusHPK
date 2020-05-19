<?php


class AnswerSurvey
{
    private int $idSurvey;
    private int $idUser;
    private string $json;

    /**
     * AnswerSurvey constructor.
     *
     * required call [@param int $idSurvey Id of survey
     * @param int $idUser Id of user
     * @param string $json Answers in JSON format
     * @link send()} for store in DB
     *
     */
    public function __construct(int $idSurvey, int $idUser, string $json)
    {
        $this->idSurvey = $idSurvey;
        $this->idUser = $idUser;
        $this->json = $json;
    }

    public function send()
    {
        $con = null;
        include_once "connection.php"; // include $con
        $query = "INSERT INTO ANSWERS (ID_SURVEY, ID_USER, ANSWER) VALUES (?, ?, ?);";
        $prepare = mysqli_stmt_init($con);
        if (mysqli_stmt_prepare($prepare, $query)) {
            mysqli_stmt_bind_param($prepare, "iis", $this->idSurvey, $this->idUser, $this->json);
            mysqli_stmt_execute($prepare);
            if (!empty(mysqli_stmt_error($prepare))) {
                $message = mysqli_stmt_error($prepare);
                mysqli_stmt_close($prepare);
                return $message;
            }
            mysqli_stmt_close($prepare);

            return true;
        } else {
            return false;
        }
    }
}