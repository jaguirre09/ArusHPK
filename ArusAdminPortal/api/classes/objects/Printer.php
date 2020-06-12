<?php


class Printer
{
    private int $id;
    private string $name;
    private string $description;
    private bool $error;
    private string $errDesc;

    /**
     * printer constructor.
     * @param int $id Printer id
     * @param string $name Printer name
     * @param string $description Printer description
     * @param bool $error True if there are error
     * @param string $errDesc Describe error if there are anyone
     */
    public function __construct(int $id, string $name, string $description, bool $error = false, string $errDesc = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->error = $error;
        $this->errDesc = $errDesc;
    }


    /**
     * @return int Returns printer id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string Returns printer name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string returns printer description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return bool Return if there is error
     */
    public function isError(): bool
    {
        return $this->error;
    }

    /**
     * @return string Returns error description if exists
     */
    public function getErrDesc(): string
    {
        return $this->errDesc;
    }
}
