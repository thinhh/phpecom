<?php

session_start();
include("../config/dbcon.php");
include("./myfunctions.php");
if(isset($_POST['register_btn'])) {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name =  mysqli_real_escape_string($con, $_POST['last_name']);
    $home_address = mysqli_real_escape_string($con, $_POST['home_address']);
    $home_phone = mysqli_real_escape_string($con, $_POST['home_phone']);
    $cell_phone = mysqli_real_escape_string($con, $_POST['cell_phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);


    if(mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = "Email already registered";
        header("Location:../register.php");
    } else {
        if($password == $cpassword) {
            $insert_query = "INSERT INTO `users`(`first_name`, 
                                             `last_name`, 
                                             `home_address`, 
                                             `home_phone`, 
                                             `cell_phone`, 
                                             `email`, 
                                             `password`) 
                                              VALUES ('$first_name','$last_name','$home_address','$home_phone','$cell_phone','$email','$password')";
            $insert_query_run = mysqli_query($con, $insert_query);
            if($insert_query_run) {
                $_SESSION['success'] = "Register Successful";
                header("Location: ../register.php");
            } else {
                $_SESSION['message'] = "Something went wrong";
                header("Location:../register.php");
            }
        } else {
            $_SESSION['message'] = "Passwords Do Not Match";
            header("Location: ../register.php");
        }
    }

} elseif(isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $login_query = "SELECT * FROM users WHERE email= '$email' AND password='$password'";
    $login_query_run = mysqli_query($con, $login_query);
    if(mysqli_num_rows($login_query_run) > 0) {
        $_SESSION['auth'] = true;
        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['first_name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];
        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $useremail
        ];
        $_SESSION['role_as'] = $role_as;
        if($role_as == 1) {
            redirect("../admin/index.php", "Admin Login Successfully", "success");

        } else {
            redirect("../index.php", "Login Successfully", "success");
        }

    } else {
        redirect("../login.php", "Invalid Credential", "error");
    }
}
