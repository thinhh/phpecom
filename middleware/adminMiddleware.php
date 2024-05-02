<?php

include("../functions/myfunctions.php");
if(isset($_SESSION['auth'])) {
    if($_SESSION['role_as'] != 1) {
        redirect("../index.php", "No Credential to access Admin Dashboard", "error");
    }
} else {
    redirect("../login.php", "Login to continue",'error');
}
