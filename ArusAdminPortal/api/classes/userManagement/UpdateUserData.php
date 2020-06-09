<?php


class UpdateUserData
{
    private int $id;
    private string $name;
    private int $pin;

    /**
     * UpdateUserData constructor.
     * @param int $id User id
     * @param string $name New user name
     * @param int $pin New user pin
     */
    public function __construct(int $id, string $name, int $pin)
    {
        $this->id = $id;
        $this->name = $name;
        $this->pin = $pin;
    }

    public function updateInfo()
    {
        $con = null;
        require_once __DIR__ . "/../connection.php"; // include $con
        $query = "UPDATE USERS SET FULL_NAME = ?, PIN = ? WHERE ID = ?;";
        $prepare = mysqli_stmt_init($con);
        if (mysqli_stmt_prepare($prepare, $query)) {
            mysqli_stmt_bind_param($prepare, "sii", $this->name, $this->pin, $this->id);
            mysqli_stmt_execute($prepare);
            if (!empty(mysqli_stmt_error($prepare))) {
                $message = mysqli_stmt_error($prepare);
                mysqli_stmt_close($prepare);
                return $message;
            }
            mysqli_stmt_close($prepare);

            return "Cambio exitoso";
        } else {
            return "Error desconocido";
        }
    }
}