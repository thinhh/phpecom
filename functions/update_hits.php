<?php

include("../config/dbcon.php");
$prod_id = $_POST['prod_id'];
$hits = $_POST['hits'];
$check_query = "SELECT * FROM `products` WHERE id='$prod_id'";
$check_query_run = mysqli_query($con, $check_query);
if(mysqli_num_rows($check_query_run) > 0) {
    $update_query = "UPDATE `products` SET `hits`= '$hits' WHERE id='$prod_id'";
    $update_query_run = mysqli_query($con, $update_query);
    if($update_query_run) {
        echo 201;
    } else {
        echo 500;
    }
} else {
    echo "Something went wrong";
}
