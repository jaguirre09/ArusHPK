<?php


class AddSurvey
{
    public function __construct(string $json)
    {
        $con = null;
        include_once __DIR__ . "/../connection.php"; // include $con
        $query = "INSERT INTO SURVEYS (QUESTIONS) VALUES (?);";
        $prepare = mysqli_stmt_init($con);
        if (mysqli_stmt_prepare($prepare, $query)) {
            mysqli_stmt_bind_param($prepare, "s", $json);
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