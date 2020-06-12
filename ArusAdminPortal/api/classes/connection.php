<?php
require_once "constants.php";

$con = mysqli_connect(HOST, USER, PASSWORD) or die("Fail connecting to DB");
mysqli_select_db($con, DATABASE_NAME) or die("Can't select DB");
mysqli_set_charset($con, 'utf8');


class connection
{
    /**
     * @return mysqli Connection init
     */
    public static function startConnection()
    {
        $con = new mysqli(HOST, USER, PASSWORD) or die("Fail connecting to DB");
        $con->select_db(DATABASE_NAME) or die("Can't select DB");
        $con->set_charset("utf8");
        return $con;
    }
}
