<?php
session_start();
unset($_SESSION['arusAdminId'], $_SESSION['arusAdminName']);
session_destroy();
header("location: /");