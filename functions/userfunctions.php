<?php

include("config/dbcon.php");

function getIdActive($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id= '$id' AND status='1'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getSlugActive($table, $slug)
{
    global $con;
    $query = "SELECT * FROM $table WHERE slug='$slug' AND status='1'";
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
function redirect($url, $message, $type)
{
    $_SESSION[$type] = $message;
    header("Location:".$url);
    exit();
}
function mostSearchProduct()
{
    global $con;
    $query = "SELECT * FROM `products` WHERE status='1' ORDER BY hits DESC LIMIT 5";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function mostSearchProductByCompany($cid)
{
    global $con;
    $query = "SELECT * FROM `products` WHERE status='1' AND category_id= '$cid' ORDER BY hits DESC LIMIT 5";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getAllTrending()
{
    global $con;
    $query = "SELECT * FROM `products` WHERE trending='1' AND status='1' ORDER BY RAND() LIMIT 6";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getOrders()
{
    global $con;
    $userid = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM `orders` WHERE user_id= '$userid'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getCartItems()
{
    global $con;
    $userid = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id, c.prod_id, c.prod_qty, p.id AS pid, p.name, p.image, p.selling_price
             FROM carts c, products p  
             WHERE c.prod_id= p.id AND c.user_id=$userid
             ORDER BY c.id DESC; ";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getProdByCategory($cid)
{
    global $con;
    $query = "SELECT * FROM `products` WHERE category_id='$cid' AND status='1' AND qty > 1";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}

function checkTrackingValid($trackingNo)
{
    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM `orders` WHERE tracking_no = '$trackingNo' AND user_id= '$user_id'";
    return mysqli_query($con, $query);
}

function get_reviews_by_prod_id($id)
{
    global $con;
    $query = "SELECT * FROM `reviews` WHERE prod_id= '$id'";
    return mysqli_query($con, $query);
}
