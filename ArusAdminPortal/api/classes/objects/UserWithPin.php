<?php
require_once "User.php";

class UserWithPin extends User
{
    private int $pin;

    /**
     * user constructor.
     * @param int $id User id
     * @param string $name User name
     * @param int $pin Pin of user
     * @param bool $enabled Is user enabled to login?
     * @param int $userType User type int 1 - ADMIN 2 - USER
     * @param bool $error Has error in request?. default value is false
     * @param string $errDesc If has error it is description. default value is empty string
     */
    public function __construct(int $id, string $name, int $pin, bool $enabled, int $userType, bool $error = false, string $errDesc = "")
    {
        parent::__construct($id, $name, $enabled, $userType, $error, $errDesc);
        $this->pin = $pin;
    }

    /**
     * @return int ReturnsPin of user
     */
    public function getPin(): int
    {
        return $this->pin;
    }
}