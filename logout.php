<?php

session_start();
if(isset($_SESSION['auth'])) {
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    unset($_SESSION['success']);
    unset($_SESSION['message']);
    setcookie("path", "", time() - 3600);
}
header("Location:login.php");
