<?php include('includes/header.php');?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header fw-bold">
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="./code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter category name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" placeholder="Enter slug">
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea row="3" class="form-control" name="description"
                                    placeholder="Enter Description"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Upload Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" placeholder="Enter meta title"
                                    class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Description</label>
                                <textarea row="3" name="meta_description" placeholder="Enter meta description"
                                    class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Keywords</label>
                                <textarea row="3" name="meta_keywords" placeholder="Enter meta keywords"
                                    class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for=""> Status</label>
                                <input type="checkbox" name="status">
                            </div>
                            <div class="col-md-6">
                                <label for=""> Popular</label>
                                <input type="checkbox" name="popular">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_category_btn"> Add</button>
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