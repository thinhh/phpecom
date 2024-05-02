<?php
session_start();
if(isset($_COOKIE["pages"])) {
    if(explode(", ", $_COOKIE["pages"])[0] != "Cart") {
        setcookie("pages", "Cart".", ".$_COOKIE["pages"], time() + (86400 * 30));
    }

} else {
    setcookie("pages","Cart", time() + (86400 * 30));
}
include("./functions/userfunctions.php");
include("includes/header.php");
include("authenticate.php");?>

<div class="py-5">
    <div class="container">
        <h3><a href="index.php">Home</a>/Cart</h3> <br>
        <h3>Cart Items</h3>
        <div class="card card-body shadow" >
            <div class="row">
                <div class="col-md-12">
                    <?php $cartItems= getCartItems();
                    if(mysqli_num_rows($cartItems) == 0){
                        echo "<h5 class='text-center'>Empty Cart</h5>";}
                    else{
                    foreach($cartItems as $item){
                        ?>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <img src="./uploads/<?= $item['image']?>" class= "card-img" alt="carts item image">
                            </div>
                            <div class="col-md-3">
                                <h5><?= $item['name'] ?></h5>
                            </div>
                            <div class="col-md-3">
                                <h5>$<?= $item['selling_price'] ?></h5>
                            </div>
                            <div class="col-md-2 product_data">
                                <input type="hidden" class='prodID' value="<?= $item['prod_id'] ?>">
                                <div class="input-group mb-3" style="width:130px">
                                    <button class="input-group-text decrement_btn updateQty" id="updateQty">-</button>
                                    <input type="number" class="form-control bg-white text-center input_qty" id="input_qty" value="<?= $item['prod_qty']; ?>" disabled>
                                    <button class="input-group-text increment_btn updateQty" id="updateQty">+</button>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger remove_btn" value="<?= $item['id'] ?>"> Remove</button>
                            </div>
                        </div>
                        
                    <?php 
                    } ?>
                        <div class="float-end">
                            <a href="checkout.php" class="btn btn-primary">Proceed to checkout</a>
                        </div>
                    <?php } ?>
                        
                </div>
            </div>
        </div>
        
    </div>
</div>


<?php include("includes/footer.php");?>