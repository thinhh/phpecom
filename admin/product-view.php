<?php include('includes/header.php');?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header fw-bold">
                    <h4>All Products</h4>  
                </div>
                <div class="card-body">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Qty </th>
                                <th># of search</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $products= getAll("products");
                                if(mysqli_num_rows($products) > 0){
                                    foreach($products as $item)
                                    { 
                                    ?>
                                        <tr>
                                            <td> <?= $item["id"] ?></td>
                                            <td> <?= $item["name"] ?></td>
                                            <td> <img src='../uploads/<?= $item['image'];?>' width='80px' height= '80px' alt="<?= $item['name']; ?>"></td>
                                            <th> <?= $item['qty']; ?></th>
                                            <th><?= $item['hits'];?></th>
                                            <td> <?= $item["status"] == "1" ? "Visible" : "Hidden" ?></td>
                                            <td> 
                                                <a href="edit-product.php?id=<?= $item['id'];?>" class= "btn btn-primary">Edit</a>
                                                <form action="code.php" method= "POST">
                                                    <input type="hidden" name="product_id" value="<?= $item['id']; ?>">
                                                    <button type="submit" class="btn btn-danger" name="delete_product_btn">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                      
                                    <?php
                                    }
                                }
                                else{
                                    echo "No records found";
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