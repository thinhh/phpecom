<?php include('includes/header.php');?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php  
            if(isset($_GET['id'])){
                $id= $_GET['id'];
                $categoryByID= getByID("categories", $id);
                if(mysqli_num_rows($categoryByID) > 0){  
                    $data= mysqli_fetch_array($categoryByID);
                ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="./code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="category_id" value="<?= $data['id']; ?>">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="name" value="<?= $data['name']; ?>" placeholder="Enter category name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Slug</label>
                                        <input type="text" class="form-control" name="slug" value="<?= $data['slug']; ?>" placeholder="Enter slug">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Description</label>
                                        <textarea row="3" class="form-control"name="description"
                                            placeholder="Enter Description"><?= $data['description']; ?></textarea>
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
                                    <div class="col-md-6">
                                        <label for=""> Status</label>
                                        <input type="checkbox" <?= $data['status']? "checked":"" ?> name="status">
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""> Popular</label>
                                        <input type="checkbox" <?= $data['popular']? "checked":"" ?> name="popular">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="update_category_btn"> Update</button>
                                    </div>
                                </div>

                            </form>
                        </div>


                    </div>
                    <?php 
                } 
                else{
                    echo "No category found";
                }
            } 
            else{
                echo "ID missing for URL";
            }
            ?>
            
        </div>

    </div>
</div>
<?php
include('includes/footer.php')?>