<?php

include("../config/dbcon.php");
$prod_id = $_POST['prod_id'];
$user_name = $_POST['user_name'];
$user_review = $_POST['user_review'];
$insert_query = "INSERT INTO `reviews`(`prod_id`, `user_name`, `user_review`) VALUES ('$prod_id','$user_name','$user_review')";
$insert_query_run = mysqli_query($con, $insert_query);
if($insert_query_run) {
    echo "success add review";
} else {
    echo "Something went wrong";
}
