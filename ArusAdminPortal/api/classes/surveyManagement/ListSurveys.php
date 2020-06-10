<?php


class ListSurveys
{

    /**
     * GetSurvey constructor.
     *
     * required call $getSurveys to get Surveys List
     */
    public function __construct()
    {

    }

    /**
     * @return array return array with questions
     */
    public function getSurveys(): array
    {
        $con = null;
        require_once __DIR__ . "/../connection.php"; // include $con
        $query = "SELECT ID, TITLE, DESCRIPTION, CREATION_DATE FROM SURVEYS ORDER BY ID DESC;";
        $prepare = mysqli_stmt_init($con);
        if (mysqli_stmt_prepare($prepare, $query)) {
            $array = [];
            mysqli_stmt_execute($prepare);
            mysqli_stmt_bind_result($prepare, $id, $title, $description, $date);
            while (mysqli_stmt_fetch($prepare)) {
                array_push($array, ["id" => $id, "title" => $title, "desc" => $description, "creationDate" => $date]);
            }
            mysqli_stmt_close($prepare);

            return $array;
        } else {
            return [["id" => 0, "title" => "Error en el servidor", "desc" => "Ocurrió un error el procesar la solicitud", "creationDate" => "0000-00-00"]];
        }
    }
}