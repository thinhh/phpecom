<?php include('includes/header.php');?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $userByID = getByID("users", $id);
                if(mysqli_num_rows($userByID) > 0) {
                    $data = mysqli_fetch_array($userByID);
                    ?>
            <div class="card">
                <div class="card-header fw-bold">
                    <h4>Edit User</h4>
                </div>
                <div class="card-body">
                    <form action="./code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="user_id" value="<?= $data['id']; ?>">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" name="first_name"
                                    value="<?= $data['first_name']; ?>" placeholder="Enter First name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" name="last_name"
                                    value="<?= $data['last_name']; ?>" placeholder="Enter Last Name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Home Address</label>
                                <input type="text" class="form-control" name="home_address"
                                    value="<?= $data['home_address']; ?>" placeholder="Enter Home Address">
                            </div>
                            <div class="col-md-6">
                                <label for="">Home Phone</label>
                                <input type="text" name="home_phone" value="<?= $data['home_phone']; ?>"
                                    class="form-control" placeholder="Enter Home Phone">
                            </div>
                            <div class="col-md-6">
                                <label for="">Cell Phone</label>
                                <input type="text" name="cell_phone" value="<?= $data['cell_phone']; ?>"
                                    class="form-control" placeholder="Enter Cell Phone">
                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="text" name="email" value="<?= $data['email']; ?>" class="form-control"
                                    placeholder="Enter Email">
                            </div>
                            <div class="col-md-12">
                                <label for="">Password</label>
                                <input type="password" name="password" value="<?= $data['password']; ?>"
                                    class="form-control" placeholder="Enter Password">
                            </div>
                            <div class="col-md-12">
                                <label for="">Confirm Password</label>
                                <input type="password" name="cpassword" value="<?= $data['password']; ?>"
                                    class="form-control" placeholder="Enter Confirm Password">
                            </div>
                            <div class="col-md-6">
                                <label for=""> Admin</label>
                                <input type="checkbox" <?= $data['role_as'] ? "checked" : "" ?> name="role_as">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="update_user_btn"> Update</button>
                            </div>
                        </div>

                    </form>
                </div>


            </div>
            <?php
                } else {
                    echo "No user found";
                }
            } else {
                echo "User ID missing for URL";
            }
?>

        </div>

    </div>
</div>
<?php
include('includes/footer.php')?>