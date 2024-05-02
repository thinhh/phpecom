<?php include('includes/header.php');?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header fw-bold">
                    <h4>Active Orders<a href="orders-history.php" class='btn btn-primary float-end'>Order History</a></h4>
                    
                </div>
                <div class="card-body">
                    <table class="table table-border">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Tracking No</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>View</th>
                    </thead>
                    <tbody>
                        <?php $orders= getAllActiveOrders("orders");
                        if(mysqli_num_rows($orders)> 0){
                            foreach($orders as $item){?>
                            <tr>
                                <td><?= $item['id']?></td>
                                <td><?= $item['name']?></td>
                                <td><?= $item['tracking_no']?></td>
                                <td>$<?= $item['total_price']?></td>
                                <td><?= $item['created_at']?></td>
                                <td><?php if($item['status'] == 0){
                                        echo "Under Process";
                                    }
                                    elseif($item['status']== 1){
                                        echo "Completed";
                                    }
                                    elseif($item['status']== 2){
                                        echo "Cancelled";
                                    } ?></td>
                                <td><a href="order-details.php?tracking=<?=$item['tracking_no']?>" class="btn btn-primary">View Details</a></td>
                            </tr>
                        <?php
                            }
                        }
                        else{ ?>
                            <tr>
                                 <td colspan= "5"> No Active Order </td> 
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
</div>
<?php
include('includes/footer.php')?>