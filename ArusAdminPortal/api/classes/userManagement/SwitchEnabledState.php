<?php


class SwitchEnabledState
{
    private int $id;
    private bool $newState;

    /**
     * SwitchEnabledState constructor.
     * @param int $id
     * @param bool $actualState
     */
    public function __construct(int $id, bool $actualState)
    {
        $this->id = $id;
        $this->newState = !$actualState;
    }

    public function switchState()
    {
        $con = null;
        require_once __DIR__ . "/../connection.php"; // include $con
        $query = "UPDATE USERS SET ENABLED_LOGIN = ? WHERE ID = ?;";
        $prepare = mysqli_stmt_init($con);
        if (mysqli_stmt_prepare($prepare, $query)) {
            mysqli_stmt_bind_param($prepare, "ii", $this->newState, $this->id);
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