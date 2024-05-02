<?php
include("includes/header.php");
if(isset($_GET['tracking'])) {
    $tracking_no = $_GET['tracking'];
    $result = checkTrackingValid($tracking_no);
    if(mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
    
    } else {
        echo " <div class='card'>
                        <div class='card-header fw-bold'>
                           No result from our orders database
                        </div> 
                    </div>";
        exit();
    }
} else {
    echo " <div class='card'>
    <div class='card-header fw-bold'>
       No tracking number provided
    </div> 
    </div>";
    exit();
}
?>
<div class="card shadow">
                <div class="card-header fw-bold flex">
                    <h4 class=" fs-4">View Order  <a href="./orders-view.php" class='btn btn-warning float-end'>Back</a></h4>  
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Delivery Details</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" class='fw-bold'>Name</label>
                                    <div class="border p-1"><?= $data['name'];?></div>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class='fw-bold'>Email</label>
                                    <div class="border p-1"><?= $data['email'];?></div>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class='fw-bold'>Address</label>
                                    <div class="border p-1"><?= $data['address'];?></div>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class='fw-bold'>Phone</label>
                                    <div class="border p-1"><?= $data['phone'];?></div>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class='fw-bold'>Tracking Number</label>
                                    <div class="border p-1"><?= $data['tracking_no'];?></div>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class='fw-bold'>Pin Code</label>
                                    <div class="border p-1"><?= $data['pincode'];?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Order Details</h4>
                            <hr>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <?php 
                                            $order_query="SELECT o.id, o.tracking_no, o.user_id, o_i.*,o_i.qty AS orderQty, p.*  
                                                        FROM orders o, order_items o_i, products p
                                                        WHERE o.tracking_no = '$tracking_no' AND p.id= o_i.prod_id  AND o_i.order_id= o.id";
                                            $order_query_run= mysqli_query($con, $order_query);
                                            if(mysqli_num_rows($order_query_run) > 0){
                                                foreach ($order_query_run as $item){ ?>
                                                    <tr>     
                                                        <td><img width= '100px' height= '100px' src="../uploads/<?= $item['image'] ?>" alt="product image"></td>         
                                                        <td><?= $item['name'] ?></td>
                                                        <td><?= $item['selling_price'] ?></td>
                                                        <td><?= $item['orderQty'] ?></td>
                                                    </tr>
                                            <?php } 
                                            }
                                        ?>
                                                       
                                </tbody>
                            </table>
                            <hr>
                            <h4>Total Price:<span class='float-end fw-bold'>$<?= $data['total_price'] ?></span></h4>
                            <hr>
                            <label class='fw-bold'for="">Payment Method</label>
                             <div class="border p-1 mb-3">
                               <?= $data['payment_mode'] ?>
                            </div>
                            <label class='fw-bold'for="">Status</label>
                             <div class="mb-3">
                                <form action="./code.php" method= "POST">
                                    <input type="hidden" name= 'tracking_no' value="<?= $data['tracking_no'] ?>">
                                    <select name="order_status" class='form-select' id="">
                                        <option value="0" <?=$data['status']== 0?'selected' :'' ?>>Under process</option>
                                        <option value="1" <?=$data['status']== 1?'selected' :'' ?>>Completed</option>
                                        <option value="2" <?=$data['status']== 2?'selected' :'' ?>>Canceled</option>
                                    </select> <br>
                                    <button type='submit' name="update_order_status_btn" class='btn btn-primary float-end'>Update Status</button>
                                </form>
                               
                            </div>
                        </div>
                    </div>
                
                </div>
        </div>
            
        </div>
        
    </div>
</div>


<?php include("includes/footer.php");?>
