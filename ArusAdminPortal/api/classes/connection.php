<?php
require_once "constants.php";

$con = mysqli_connect(HOST, USER, PASSWORD) or die("Fail connecting to DB");
mysqli_select_db($con, DATABASE_NAME) or die("Can't select DB");
mysqli_set_charset($con, 'utf8');