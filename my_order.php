<?php
session_start();
if(isset($_COOKIE["pages"])) {
    if(explode(", ", $_COOKIE["pages"])[0] != "My Order") {
        setcookie("pages", "My Order".", ".$_COOKIE["pages"], time() + (86400 * 30));
    }

} else {
    setcookie("pages", "My Order", time() + (86400 * 30));
}
include("./functions/userfunctions.php");
include("includes/header.php");
include("authenticate.php");?>

<div class="py-5">
    <div class="container">
        <h3><a href="index.php">Home</a>/My Orders</h3> <br>
        <h3>Order History</h3>
        <br>
        <div class="card card-body shadow" >
            <div class="row">
                
                <table class="table table-bordered">
                    
                    <thead>
                        <th>ID</th>
                        <th>Tracking No</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>View</th>
                    </thead>
                    
                    <tbody>
                        <?php $orders= getOrders();
                        if(mysqli_num_rows($orders)> 0){
                            foreach($orders as $item){?>
                            <tr>
                                <td><?= $item['id']?></td>
                                <td><?= $item['tracking_no']?></td>
                                <td>$<?= $item['total_price']?></td>
                                <td><?= $item['created_at']?></td>
                                <td><a href="order_detail.php?tracking=<?=$item['tracking_no']?>" class="btn btn-primary">View Details</a></td>
                            </tr>
                        <?php
                            }
                        }
                        else{ ?>
                            <tr>
                                 <td colspan= "5"> No Orders History </td> 
                            </tr>
                           
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>

               
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php");?>