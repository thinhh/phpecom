<?php include('includes/header.php');?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header fw-bold">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    <form action="./code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Select Category</label>
                                <select name="category_id" class="form-select">
                                    <option selected>Select a Category</option>
                                    <?php
                                        $categories = getAll("categories");
                                        if(mysqli_num_rows($categories) > 0) {
                                            foreach ($categories as $item) { ?>
                                                                                        <option value="<?= $item['id'];?>"> <?= $item['name'];?></option>
                                                                                    <?php
                                            }
                                        } else {
                                            echo "No Available Category";
                                        }
                                    ?>
                                  
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" class="form-control" required name="name" placeholder="Enter product name" >
                            </div>
                            <div class="col-md-6">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" required name="slug" placeholder="Enter slug" >
                            </div>
                            <div class="col-md-12">
                                <label for="">Small Description</label>
                                <textarea row="3"  class="form-control"  required name="small_description" placeholder="Enter Small Description"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea row="3" class="form-control" required name="description" placeholder="Enter Product Description"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Original Price</label>
                                <input type="text" class="form-control" required name="original_price" placeholder="Enter Original Price">
                            </div>
                            <div class="col-md-6">
                                <label for="">Selling Price</label>
                                <input type="text" class="form-control" required name="selling_price" placeholder="Enter Selling Price">
                            </div> 
                            <div class='row'>
                                <div class="col-md-6">
                                    <label class="mb-0" for=""> Quantity</label>
                                    <input type="number" class="form-control mb-2" required name="qty" placeholder="Enter Quantity">
                                </div>
                                <div class="col-md-3">
                                    <label  class="mb-2" for=""> Status</label> <br>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-3">
                                    <label  class="mb-2" for=""> Trending</label> <br>
                                    <input type="checkbox" name="trending">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="">Upload Image</label>
                                <input type="file" required name="image" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Title</label>
                                <input type="text" required name="meta_title" placeholder="Enter meta title"
                                    class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Description</label>
                                <textarea row="3" required name="meta_description" placeholder="Enter meta description"
                                    class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Keywords</label>
                                <textarea row="3" required name="meta_keywords" placeholder="Enter meta keywords"
                                    class="form-control"></textarea>
                            </div>
                            <div class="col-md-12"> 
                                <br>
                                <button type="submit" class="btn btn-primary" name="add_product_btn"> Add</button>
                            </div>
                        </div>

                    </form>
                </div>


            </div>
        </div>

    </div>
</div>
<?php
include('includes/footer.php')?>