<?php include('includes/header.php');?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $productByID = getByID("products", $id);
                if(mysqli_num_rows($productByID) > 0) {
                    $data = mysqli_fetch_array($productByID);
                    ?>
                    <div class="card">
                        <div class="card-header fw-bold">
                            <h4>Edit Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="./code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Select Category</label>
                                        <select name="category_id" class="form-select">
                                            <option selected>Select Category</option>
                                            <?php
                                                    $categories = getAll("categories");
                    if(mysqli_num_rows($categories) > 0) {
                        foreach ($categories as $item) { ?>
                                                        <option value="<?= $item['id'];?>" <?= $data['category_id'] == $item['id'] ? "selected" : ""; ?>> <?= $item['name'];?></option>
                                                    <?php
                        }
                    } else {
                        echo "No Available Category";
                    }
                    ?>
                                        
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="name" value="<?= $data['name']; ?>" placeholder="Enter product name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Slug</label>
                                        <input type="text" class="form-control" name="slug" value="<?= $data['slug']; ?>" placeholder="Enter slug">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Small Description</label>
                                        <textarea row="3"  class="form-control"  required name="small_description" placeholder="Enter Small Description"><?= $data['small_description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Description</label>
                                        <textarea row="3" class="form-control" required name="description" placeholder="Enter Product Description"><?= $data['description']; ?></textarea>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="">Original Price</label>
                                        <input type="text" class="form-control" required name="original_price" value="<?= $data['original_price']; ?>" placeholder="Enter Original Price">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Selling Price</label>
                                        <input type="text" class="form-control" required name="selling_price" value="<?= $data['selling_price']; ?>" placeholder="Enter Selling Price">
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="mb-0" for=""> Quantity</label>
                                            <input type="number" class="form-control mb-2" value="<?=$data['qty'];?>" required name="qty" placeholder="Enter Quantity">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="m-2"> Status</label> <br>
                                            <input type="checkbox" <?= $data['status'] ? "checked" : "" ?> name="status">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="m-2"> Trending</label> <br>
                                            <input type="checkbox" <?= $data['trending'] ? "checked" : "" ?> name="trending">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Upload Image</label>
                                        <input type="file" name="image" class="form-control">
                                        <label for="">Current Image</label> <br>
                                        <input type="hidden" name="old_image" value="<?= $data['image']; ?>" class="form-control">
                                        <img src="../uploads/<?= $data['image']?>" width="80px" height="80px">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta Title</label>
                                        <input type="text" name="meta_title"  value="<?= $data['meta_title']; ?>" placeholder="Enter meta title" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta Description</label>
                                        <textarea row="3" name="meta_description" placeholder="Enter meta description"
                                            class="form-control"><?= $data['meta_description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta Keywords</label>
                                        <textarea row="3" name="meta_keywords" placeholder="Enter meta keywords"
                                            class="form-control"><?= $data['meta_keywords']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <br>
                                        <button type="submit" class="btn btn-primary" name="update_product_btn"> Update</button>
                                    </div>
                                </div>

                            </form>
                        </div>


                    </div>
                    <?php
                } else {
                    echo "No product found";
                }
            } else {
                echo "ID missing for product URL";
            }
?>
            
        </div>

    </div>
</div>
<?php
include('includes/footer.php')?>