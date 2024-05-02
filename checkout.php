<?php
session_start();
if(isset($_COOKIE["pages"])) {
    if(explode(", ", $_COOKIE["pages"])[0] != "Checkout") {
        setcookie("pages", "Checkout".", ".$_COOKIE["pages"], time() + (86400 * 30));
    }

} else {
    setcookie("pages", "Checkout", time() + (86400 * 30));
}
include("./functions/userfunctions.php");
include("includes/header.php");
include("authenticate.php");
$cartItems= getCartItems();
if(mysqli_num_rows($cartItems) == 0){
    header("Location:index.php");
}?>

<div class="py-5">
    <div class="container">
        <h3><a href="index.php">Home</a>/<a href="checkout.php">Checkout</a></h3> <br>
        <h3>Checkout Items</h3>
        <div class="card shadow">
                <div class="card-body">
                    <form action="functions/placeorder.php" method="POST">
                        <div class="row">
                                <div class="col-md-7">
                                    <h5>User Details</h5>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">Name</label>
                                            <input type="text" name="name" id = "name" required placeholder="Enter your name" class="form-control" >
                                            <small class='text-danger name'></small>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">Email</label>
                                            <input type="email" name="email" id = "email" required placeholder="Enter your email" class="form-control" >
                                            <small class='text-danger name'></small>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">Phone</label>
                                            <input type="text" name="phone"  id = "phone" required placeholder="Enter your phone number" class="form-control" >
                                            <small class='text-danger name'></small>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">Pin code</label>
                                            <input type="text" name="pincode" id = "pincode" required placeholder="Enter your pin code" class="form-control" >
                                            <small class='text-danger name'></small>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Address</label>
                                            <input type="text" name="address" id = "address" required placeholder="Enter your address" class="form-control" >
                                            <small class='text-danger name'></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <h5> Items Details</h5>
                                    <hr>
                                    <?php
                                        $totalPrice= 0;
                                        foreach($cartItems as $item){
                                            $totalPrice += $item['selling_price'] * $item['prod_qty'];
                                    ?>
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <img src="./uploads/<?= $item['image']?>" width="70px" alt="carts item image">
                                                </div>
                                                <div class="col-md-3">
                                                    <label><?= $item['name'] ?></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>$<?= $item['selling_price'] ?></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>x <?= $item['prod_qty'] ?></label>
                                                </div>
                                        </div>
                                        <hr>
                                        
                                    <?php 
                                        }
                                    ?>
                                    <h5>Total Price: <span class="float-end fw-bold">$ <?= $totalPrice ?></span></h5>
                                    <div class=""> 
                                        <input type="hidden" name="payment_mode" value="COD">
                                        <input type="hidden" name="payment_id" value=" ">
                                        <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100"> Place Order | Cash On Delivery (COD)</button>
                                        <div id="paypal-button-container" class='mt-2'></div>
                                    </div>
                            </div>

                    </form>
                
                </div>
        </div>
            
        </div>
        
    </div>
</div>


<?php include("includes/footer.php");?>
<script src="https://www.paypal.com/sdk/js?client-id=ARtPByMY5RiBsYcEIh4xcGJHTPHKuGQtRkUXpSWv-prbhYr6wDlFmerFIbVmgDG_easOBH57zPGujrTu&currency=USD"></script>
<script>
   
    paypal.Buttons({
        onClick(){
            var name= $("#name").val();
            var email= $("#email").val();
            var phone= $("#phone").val();
            var pincode= $("#pincode").val();
            var address= $("#address").val();
            if(name.length == 0 || email.length == 0 || phone.length == 0 || pincode.length == 0 || address.length == 0){
                alertify.error("All fields Required")
                return false;
            }

        },
        createOrder:(data, actions) =>{
            return actions.order.create({
                purchase_units:[{
                    amount: {
                        value: "<?=$totalPrice ?>"
                    }
                }]
            });
        },
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData){
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction= orderData.purchase_units[0].payments.captures[0];
                var name= $("#name").val();
                var email= $("#email").val();
                var phone= $("#phone").val();
                var pincode= $("#pincode").val();
                var address= $("#address").val();
                var data= {
                    'name': name,
                    'email': email,
                    'phone': phone,
                    'pincode': pincode,
                    'address': address,
                    'payment_mode': "Paid By Paypal",
                    'payment_id': transaction.id,
                    'placeOrderBtn': true
                }
                $.ajax({
                    method: "POST",
                    url:"functions/placeorder.php",
                    data: data,
                    success: function(response){
                        if(response == 201){
                            alertify.success("Order Place Successfully");
                            window.location.href= 'my_order.php';
                        }
                    }

                })
            });
        }
    }).render("#paypal-button-container");
</script>