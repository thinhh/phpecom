<?php include('includes/header.php');?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header fw-bold">
                    <h4>Add User</h4>
                </div>
                <div class="card-body">
                    <form action="./code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Home Address</label>
                                <input type="text" class="form-control" name="home_address" placeholder="Enter Home Address">
                            </div>
                            <div class="col-md-6">
                                <label for="">Home Phone</label>
                                <input type="text" name="home_phone" class="form-control"  placeholder="Enter Home Phone">
                            </div>
                            <div class="col-md-6">
                                <label for="">Cell Phone</label>
                                <input type="text" name="cell_phone" class="form-control"  placeholder="Enter Cell Phone">
                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control"  placeholder="Enter Email">
                            </div>
                            <div class="col-md-12">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control"  placeholder="Enter Password">
                            </div>
                            <div class="col-md-12">
                                <label for="">Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control"  placeholder="Enter Confirm Password">
                            </div>
                            <div class="col-md-6">
                                <label for=""> Admin</label>
                                <input type="checkbox" name="role_as">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_user_btn"> Add</button>
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