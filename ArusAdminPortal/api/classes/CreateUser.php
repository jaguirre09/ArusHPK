<?php
require_once "objects/User.php";


class CreateUser
{
    private string $name;
    private int $pin;
    private bool $isAdmin;

    /**
     * CreateUser constructor.
     * @param string $name User name
     * @param int $pin User pin
     * @param bool $isAdmin User type, only use values {@see User::USER} and {@see User::ADMIN}
     */
    public function __construct(string $name, int $pin, bool $isAdmin)
    {
        $this->name = $this->escapeString($name);
        $this->pin = $this->escapeString($pin);
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return bool|string @return bool true if user created but if there is error return string with details
     */
    public function create(): bool
    {
        $con = null;
        include_once "connection.php"; // include $con
        $query = "INSERT INTO USERS (FULL_NAME, PIN, USER_TYPE) VALUES (?, ?, ?);";
        $userType = $this->isAdmin ? user::ADMIN : user::USER;
        $prepare = mysqli_stmt_init($con);
        if (mysqli_stmt_prepare($prepare, $query)) {
            mysqli_stmt_bind_param($prepare, "sii", $this->name, $this->pin, $userType);
            mysqli_stmt_execute($prepare);
            if (!empty(mysqli_stmt_error($prepare))) {
                $message = mysqli_stmt_error($prepare);
                mysqli_stmt_close($prepare);
                return $message;
            }
            mysqli_stmt_close($prepare);

            return true;
        } else {
            return "Error desconocido";
        }
    }

    private function escapeString(string $string): string
    {
        return preg_replace('#<script(.*?)>(.*?)</script>#is', '', $string);
    }
}