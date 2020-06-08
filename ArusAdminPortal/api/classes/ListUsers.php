<?php
require_once "objects/UserWithPin.php";

class ListUsers
{
    /**
     * @return array return <a href='psi_element://user'>user</a> object
     */
    public function getUsers(): array
    {
        $con = null;
        $users = [];
        include_once "connection.php"; // include $con

        $query = "SELECT ID, FULL_NAME, PIN, ENABLED_LOGIN, USER_TYPE FROM USERS ORDER BY USER_TYPE";
        $prepare = mysqli_stmt_init($con);
        if (mysqli_stmt_prepare($prepare, $query)) {
            mysqli_stmt_execute($prepare);
            mysqli_stmt_bind_result($prepare, $id, $name, $pin, $enabled, $userType);
            while (mysqli_stmt_fetch($prepare)) {
                array_push($users, new UserWithPin($id, $name, $pin, $enabled, $userType));
            }
            mysqli_stmt_close($prepare);
            return $users;
        } else {
            return [new UserWithPin(0, "", "", false, 0, true, "Ocurrió un error al procesar la solicitud.")];
        }
    }
}