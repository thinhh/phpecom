<?php
session_start();
if(isset($_COOKIE["pages"])) {
    if(explode(", ", $_COOKIE["pages"])[0] != "Login") {
        setcookie("pages", "Login".", ".$_COOKIE["pages"], time() + (86400 * 30));
    }

} else {
    setcookie("pages", "Login", time() + (86400 * 30));
}
if(isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Already Login";
    header("Location:index.php");
    exit();
}
include("includes/header.php");?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1>Login</h1>
                    </div>
                    <div class="card-body">
                        <form action="functions/authcode.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php");?>