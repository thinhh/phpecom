<?php session_start();
if(isset($_COOKIE["pages"])) {
    if(explode(", ", $_COOKIE["pages"])[0] != "About") {
        setcookie("pages", "About".", ".$_COOKIE["pages"], time() + (86400 * 30));
    }

} else {
    setcookie("pages", "About", time() + (86400 * 30));
}
include("./includes/header.php");
?>

<div class="py-5">
    <div class="container">
        <h3 class="fw-bold"> About Page</h3> <hr>
            <h5> GoCommerce is an online shopping marketplace that was created using php and mysql
        <br>
        GoCommerce allows its users to search for products with ease and easy to navigate interface that enable users to add product to their carts and checkout for purchase

    <h5>
   <img src= './images/php_image.png' />
   <img src= './images/mysql_image.png' />

    </div>
</div>

<?php include("./includes/footer.php")?>