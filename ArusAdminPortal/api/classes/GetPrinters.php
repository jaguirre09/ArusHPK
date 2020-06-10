<?php


class GetPrinters
{
    /**
     * GetPrinters constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return array returns array with printers
     */
    public function getPrinters(): array
    {
        $data = [];
        $con = null;
        require_once "connection.php"; // include $con
        $query = "SELECT * FROM PRINTERS";
        $prepare = mysqli_stmt_init($con);
        if (mysqli_stmt_prepare($prepare, $query)) {
            mysqli_stmt_execute($prepare);
            mysqli_stmt_bind_result($prepare, $id, $name);
            while (mysqli_stmt_fetch($prepare)) {
                array_push($data, ["id" => $id, "name" => $name, "error" => false, "err_desc" => ""]);
            }
            mysqli_stmt_close($prepare);
            return $data;
        } else {
            return [["id" => 0, "name" => "", "error" => true, "err_desc" => "Ocurrió un error el procesar la solicitud"]];
        }
    }
}