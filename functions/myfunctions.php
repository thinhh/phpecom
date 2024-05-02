<?php

include("../config/dbcon.php");
function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getAllActiveOrders()
{
    global $con;
    $query = "SELECT * FROM `orders` WHERE status='0'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getOrdersHistory()
{
    global $con;
    $query = "SELECT * FROM `orders` WHERE status!='0'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='1'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getCount($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    $query_run = mysqli_query($con, $query);
    $row = mysqli_num_rows($query_run);
    return $row;
}

function getByID($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id= '$id'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function redirect($url, $message, $type)
{
    $_SESSION[$type] = $message;
    header("Location:".$url);
    exit();
}
function checkTrackingValid($trackingNo)
{
    global $con;    
    $query = "SELECT * FROM `orders` WHERE tracking_no = '$trackingNo'";
    return mysqli_query($con, $query);
}
