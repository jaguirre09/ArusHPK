<?php
require_once "objects/Printer.php";
require_once "connection.php"; // include $con


class PrintersManager
{
    /**
     * @return array Returns {@link Printer} array
     */
    public static function getPrinters(): array
    {
        $data = [];
        $con = connection::startConnection();
        $query = "SELECT * FROM PRINTERS";
        $prepare = mysqli_stmt_init($con);
        if (mysqli_stmt_prepare($prepare, $query)) {
            mysqli_stmt_execute($prepare);
            mysqli_stmt_bind_result($prepare, $id, $name, $description);
            while (mysqli_stmt_fetch($prepare)) {
                array_push($data, new Printer($id, $name, $description));
            }
            mysqli_stmt_close($prepare);
            return $data;
        } else {
            return [new Printer(0, "", "", true, "Ocurrió un error el procesar la solicitud")];
        }
    }

    /**
     * @param string $name New printer name
     * @param string $description New printer description
     * @return bool|string Returns true if added correctly else if there is error returns string with description but is unexpected returns false
     */
    public static function addPrinter(string $name, string $description)
    {
        $con = connection::startConnection();
        $query = "INSERT INTO PRINTERS (NAME, DESCRIPTION) VALUES (?, ?)";
        $prepare = mysqli_stmt_init($con);
        if (mysqli_stmt_prepare($prepare, $query)) {
            $prepare->bind_param("ss", $name, $description);
            $prepare->execute();
            if (strlen($prepare->error) > 0) {
                $err = $prepare->error;
                mysqli_stmt_close($prepare);
                return $err;
            }
            mysqli_stmt_close($prepare);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param int $id Printer id to delete
     * @return bool|string Returns true if added correctly else if there is error returns string with description but is unexpected returns false
     */
    public static function deletePrinter(int $id)
    {
        $con = connection::startConnection();
        $query = "DELETE FROM PRINTERS WHERE ID = ?";
        $prepare = mysqli_stmt_init($con);
        if (mysqli_stmt_prepare($prepare, $query)) {
            $prepare->bind_param("i", $id);
            $prepare->execute();
            if (strlen($prepare->error) > 0) {
                $err = $prepare->error;
                mysqli_stmt_close($prepare);
                return $err;
            }
            mysqli_stmt_close($prepare);
            return true;
        } else {
            return false;
        }
    }
}
