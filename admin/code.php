<?php

session_start();
include("../config/dbcon.php");
include("../functions/myfunctions.php");
// Category Add/Update/Delete
if(isset($_POST['add_category_btn'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? "1" : "0";
    $popular = isset($_POST['popular']) ? "1" : "0";
    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;
    $insert_query = "INSERT INTO `categories`(`name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`) 
                                    VALUES ('$name','$slug','$description','$status','$popular','$filename','$meta_title','$meta_description','$meta_keywords')";
    $insert_query_run = mysqli_query($con, $insert_query);
    if($insert_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("add-category-form.php", "Successfully add category", "success");
    } else {
        redirect("add-category-form.php", "Something went wrong", "error");
    }
} elseif(isset($_POST['update_category_btn'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? "1" : "0";
    $popular = isset($_POST['popular']) ? "1" : "0";
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    $path = "../uploads";
    if($new_image != "") {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    } else {
        $update_filename = $old_image;
    }
    $update_query = "UPDATE `categories` SET `name`='$name',
                                            `slug`='$slug', 
                                            `description`='$description',  
                                            `status`='$status',   
                                            `popular`='$popular',  
                                            `image`='$update_filename',
                                            `meta_title`='$meta_title',
                                            `meta_description`='$meta_description', 
                                            `meta_keywords`='$meta_keywords' 
                                            WHERE id= '$category_id'";
    $update_query_run = mysqli_query($con, $update_query);
    if($update_query_run) {
        if($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image)) {
                unlink("../uploads/".$old_image);
            }
        }
        redirect("edit-category.php?id=$category_id", "Category Update Successfully", "success");
    } else {
        redirect("edit-category.php?id=$category_id", "Something went wrong", "success");
    }
} elseif(isset($_POST['delete_category_btn'])) {

    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
    $category_query = "SELECT * FROM `categories` WHERE id='$category_id'";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];
    $delete_query = "DELETE FROM `categories` WHERE id='$category_id'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run) {
        if(file_exists("../uploads/".$image)) {
            unlink("../uploads/".$image);
        }
        redirect("category-view.php", "Category Deleted Successfully", "success");
    } else {
        redirect("category-view.php", "Something went wrong", "error");
    }
}
// Product Add/Update/Delete
elseif(isset($_POST['add_product_btn'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $status = isset($_POST['status']) ? "1" : "0";
    $trending = isset($_POST['trending']) ? "1" : "0";
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];


    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;
    if($name != "" && $slug != "" && $description != "") {
        $product_query = "INSERT INTO `products`(`category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`) 
                                        VALUES ('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price','$filename','$qty','$status','$trending','$meta_title','$meta_keywords','$meta_description')";
        $product_query_run = mysqli_query($con, $product_query);
        if($product_query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            redirect("add-product-form.php", "Successfully add product", "success");
        } else {
            redirect("add-product-form.php", "Something went wrong", "error");
        }
    } else {
        redirect("add-product-form.php", "All field required", "error");
    }

} elseif(isset($_POST['update_product_btn'])) {
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $status = isset($_POST['status']) ? "1" : "0";
    $trending = isset($_POST['trending']) ? "1" : "0";
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    $path = "../uploads";
    if($new_image != "") {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    } else {
        $update_filename = $old_image;
    }
    $update_query = "UPDATE `products` SET `category_id`='$category_id',
                                          `name`='$name',
                                          `slug`='$slug',  
                                          `small_description`='$small_description',
                                          `description`='$description',
                                          `original_price`='$original_price',
                                          `selling_price`='$selling_price',
                                          `image`='$update_filename',
                                          `qty`='$qty',
                                          `status`='$status',
                                          `trending`='$trending',
                                          `meta_title`='$meta_title',`meta_keywords`='$meta_keywords',`meta_description`='$meta_description' WHERE id= '$product_id'";
    $update_query_run = mysqli_query($con, $update_query);
    if($update_query_run) {
        if($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image)) {
                unlink("../uploads/".$old_image);
            }
        }
        redirect("edit-product.php?id=$product_id", "Product Update Successfully", "success");
    } else {
        redirect("edit-product.php?id=$product_id", "Something went wrong", "success");
    }
} elseif(isset($_POST['delete_product_btn'])) {
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
    $product_query = "SELECT * FROM `products` WHERE id='$product_id'";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];
    $delete_query = "DELETE FROM `products` WHERE id='$product_id'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run) {
        if(file_exists("../uploads/".$image)) {
            unlink("../uploads/".$image);
        }
        redirect("product-view.php", "Product Deleted Successfully", "success");
    } else {
        redirect("product-view.php", "Something went wrong", "error");
    }
}
// User Add/Update/Delete
elseif(isset($_POST['update_user_btn'])) {
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $home_address = $_POST['home_address'];
    $home_phone = $_POST['home_phone'];
    $cell_phone = $_POST['cell_phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $role_as = isset($_POST['role_as']) ? "1" : "0" ;
    if($password != $cpassword) {
        redirect("edit-user.php?id=$user_id", "Incorrect Password and Confirm Password", "error");
        exit();
    }
    $update_query = "UPDATE `users` SET `first_name`='$first_name', 
                                       `last_name`='$last_name', 
                                       `home_address`='$home_address', 
                                       `home_phone`='$home_phone', 
                                       `cell_phone`='$cell_phone', 
                                       `email`='$email', 
                                       `password`='$password',
                                       `role_as`='$role_as' WHERE id= '$user_id'";
    $update_query_run = mysqli_query($con, $update_query);
    if($update_query_run) {
        redirect("edit-user.php?id=$user_id", "Successful Update User", "success");
    } else {
        redirect("edit-user.php?id=$user_id", "Something Went Wrong", "error");
    }


} elseif(isset($_POST['add_user_btn'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $home_address = $_POST['home_address'];
    $home_phone = $_POST['home_phone'];
    $cell_phone = $_POST['cell_phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $role_as = isset($_POST['role_as']) ? "1" : "0" ;
    if($password != $cpassword) {
        redirect("add-user-form.php", "Incorrect Password and Confirm Password", "error");
        exit();
    }
    $insert_query = "INSERT INTO `users`(`first_name`, `last_name`, `home_address`, `home_phone`, `cell_phone`, `email`, `password`, `role_as`) 
                            VALUES ('$first_name','$last_name','$home_address','$home_phone','$cell_phone','$email','$password','$role_as')";
    $insert_query_run = mysqli_query($con, $insert_query);
    if($insert_query_run) {
        redirect("users-view.php", "Successful Add New User", "success");
    } else {
        redirect("add-user-form.php", "Something Went Wrong", "error");
    }

} elseif(isset($_POST['delete_user_btn'])) {
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $user_query = "SELECT * FROM `users` WHERE id='$user_id'";
    $user_query_run = mysqli_query($con, $user_query);
    $user_data = mysqli_fetch_array($user_query_run);
    $delete_query = "DELETE FROM `users` WHERE id='$user_id'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run) {
        redirect("users-view.php", "Category Deleted Successfully", "success");
    } else {
        redirect("users-view.php", "Something went wrong", "error");
    }
} elseif(isset($_POST['update_order_status_btn'])) {
    $tracking_no = $_POST['tracking_no'];
    $status = $_POST['order_status'];
    $update_query = "UPDATE `orders` SET status= '$status' WHERE tracking_no='$tracking_no'";
    $update_query_run = mysqli_query($con, $update_query);
    if($update_query_run) {
        redirect("orders-view.php", "Successful Update Order Status", "success");
    }
}
