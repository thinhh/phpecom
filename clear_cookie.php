<?php

session_start();
if($_COOKIE['pages']) {
    setcookie("pages", "", time() - 3600);
}
else{
    header("Location: visited.php");
}
header("Location: visited.php");
