<?php


class User
{
    private int $id;
    private string $name;
    private bool $enabled;
    private int $userType;
    private bool $error;
    private string $errDesc;

    const ADMIN = 1;
    const USER = 2;

    /**
     * user constructor.
     * @param int $id User id
     * @param string $name User name
     * @param bool $enabled Is user enabled to login?
     * @param int $userType User type int 1 - ADMIN 2 - USER
     * @param bool $error Has error in request?. default value is false
     * @param string $errDesc If has error it is description. default value is empty string
     */
    public function __construct(int $id, string $name, bool $enabled, int $userType, bool $error = false, string $errDesc = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->enabled = $enabled;
        $this->userType = $userType;
        $this->error = $error;
        $this->errDesc = $errDesc;
    }

    /**
     * @return int User id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string User name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool Is user enabled to login?
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @return int User type int 1 - ADMIN 2 - USER
     */
    public function getUserType(): int
    {
        return $this->userType;
    }

    /**
     * @return bool Has error in request?. default value is false
     */
    public function isError(): bool
    {
        return $this->error;
    }

    /**
     * @return string If has error it is description. default value is empty string
     */
    public function getErrDesc(): string
    {
        return $this->errDesc;
    }


}