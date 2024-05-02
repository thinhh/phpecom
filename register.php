<?php
session_start();
if(isset($_COOKIE["pages"])) {
    if(explode(", ", $_COOKIE["pages"])[0] != "Register Page") {
        setcookie("pages", "Register Page".", ".$_COOKIE["pages"], time() + (86400 * 30));
    }

} else {
    setcookie("pages","Register Page", time() + (86400 * 30));
}
if(isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Already Login";
    header("Location:index.php");
    exit();
}
include("includes/header.php");

?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1>Register</h1>
                    </div>
                    <div class="card-body">
                        <form action="functions/authcode.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Home Address</label>
                                <input type="text" name="home_address" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Home Phone</label>
                                <input type="text" name="home_phone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cell Phone</label>
                                <input type="text" name="cell_phone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php");?>