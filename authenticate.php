<?php

if(!isset($_SESSION['auth'])) {
    redirect("login.php", "Please login to continue", "error");
}
