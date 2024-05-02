<?php

session_start();
include("../config/dbcon.php");
function redirect($url, $message, $type)
{
    $_SESSION[$type] = $message;
    header("Location:".$url);
    exit();
}
if(isset($_SESSION['auth'])) {
    if(isset($_POST['placeOrderBtn'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $pincode = mysqli_real_escape_string($con, $_POST['pincode']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $payment_mode = mysqli_real_escape_string($con, $_POST['payment_mode']);
        $payment_id = mysqli_real_escape_string($con, $_POST['payment_id']);
        $total_price = 0;
        if($name == " " || $email == " " || $phone == " " || $pincode == " " || $address == " ") {
            redirect("../checkout.php", "All fields are mandatory", "error");
            exit(0);
        }
        $user_id = $_SESSION['auth_user']['user_id'];
        $tracking_no = "GoCommerce".rand(1111, 9999).substr($phone, 2);
        $query = "SELECT c.id, c.prod_id, c.prod_qty, p.id AS pid, p.name, p.image, p.selling_price
                FROM carts c, products p  
                WHERE c.prod_id= p.id AND c.user_id=$user_id
                ORDER BY c.id DESC; ";
        $cart_items = mysqli_query($con, $query);
        foreach($cart_items as $item) {
            $total_price += $item['selling_price'] * $item['prod_qty'];
        }
        $insert_query = "INSERT INTO `orders`(`tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `pincode`, `total_price`, `payment_mode`, `payment_id`) 
                                     VALUES ('$tracking_no','$user_id','$name','$email','$phone','$address','$pincode','$total_price','$payment_mode', '$payment_id')";
        $insert_query_run = mysqli_query($con, $insert_query);
        if($insert_query) {
            $order_id = mysqli_insert_id($con);
            foreach($cart_items as $item) {
                $prod_id = $item['prod_id'];
                $prod_qty = $item['prod_qty'];
                $price = $item['selling_price'];
                $insert_items_query = "INSERT INTO `order_items`(`order_id`, `prod_id`, `qty`, `price`) 
                                                      VALUES ('$order_id','$prod_id','$prod_qty','$price')";
                $insert_items_query_run = mysqli_query($con, $insert_items_query);

                $product_query = "SELECT * FROM `products` WHERE id= '$prod_id' LIMIT 1";
                $product_query_run = mysqli_query($con, $product_query);

                $product_data = mysqli_fetch_array($product_query_run);
                $curr_qty = $product_data['qty'];

                $new_qty = $curr_qty - $prod_qty;
                $updateQty_query = "UPDATE `products` SET qty='$new_qty' WHERE id='$prod_id'";
                $updateQty_query_run = mysqli_query($con, $updateQty_query);


            }
            $deleteCartQuery = "DELETE FROM `carts` WHERE user_id='$user_id'";
            $deleteCartQuery_run = mysqli_query($con, $deleteCartQuery);
            if($payment_mode == 'COD'){
                redirect("../my_order.php", "Successfully added order", "success");
              die();
            }
           else{
            echo 201;
           }
        }
    }

} else {
    redirect("../login.php", "Login to checkout", "error");
}
