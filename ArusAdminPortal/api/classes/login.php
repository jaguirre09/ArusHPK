<?php
require_once "../objects/user.php";

class login
{
    private int $pin;
    private bool $isAdmin;

    /**
     * login constructor.
     * @param int $pin assigned pin to user
     * @param bool $isAdmin true if is admin user else false if is normal user
     */
    public function __construct(int $pin, bool $isAdmin)
    {
        $this->pin = $pin;
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return user return {@link user} object
     */
    public function getUser()
    {
        $con = null;
        require_once "connection.php"; // include $con
        if (!$this->isUserExists($con)) {
            return new user(0, "", false, 0, true, "Usuario no encontrado");
        }

        $query = "SELECT ID, FULL_NAME, PIN, ENABLED_LOGIN FROM USERS WHERE PIN = ? AND USER_TYPE = ?";
        include_once "connection.php"; // include $con
        $userType = $this->isAdmin ? user::ADMIN : user::USER;
        $prepare = mysqli_stmt_init($con);
        if (mysqli_stmt_prepare($prepare, $query)) {
            mysqli_stmt_bind_param($prepare, "ii", $this->pin, $userType);
            mysqli_stmt_execute($prepare);
            mysqli_stmt_bind_result($prepare, $id, $name, $pin, $enabled);
            mysqli_stmt_fetch($prepare);
            mysqli_stmt_close($prepare);

            return new user($id, $name, $enabled, $userType);
        } else {
            return new user(0, "", false, 0, true, "Ocurrió un error al procesar la solicitud.");
        }
    }

    /**
     * @param mysqli $con Database connection
     * @return bool true if found user else false
     */
    private function isUserExists(mysqli $con) {
        $query = "SELECT COUNT(ID) FROM USERS WHERE PIN = ? AND USER_TYPE = ?";

        $userType = $this->isAdmin ? user::ADMIN : user::USER;
        $prepare = mysqli_stmt_init($con);
        if (mysqli_stmt_prepare($prepare, $query)) {
            mysqli_stmt_bind_param($prepare, "ii", $this->pin, $userType);
            mysqli_stmt_execute($prepare);
            mysqli_stmt_bind_result($prepare, $count);
            mysqli_stmt_fetch($prepare);
            mysqli_stmt_close($prepare);

            return $count > 0;
        } else {
            die("Ocurrió un error conectando a base de datos.");
        }
    }
}