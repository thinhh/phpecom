<?php
include('includes/header.php');
if(isset($_POST['search'])) {
    $search = $_POST['search'];
    $search_query = "SELECT * FROM `users` WHERE first_name='$search' OR email='$search'";
    $result = mysqli_query($con, $search_query);
    if(mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_array($result);
    } else {
        echo " <div class='card'>
                        <div class='card-header fw-bold'>
                           No result from our user database
                        </div> 
                    </div>";
        exit();
    }

}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header fw-bold">
                    Search User
                </div>
                <div class="card-body">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Home Address</th>
                                <th>Home Phone</th>
                                <th>Cell Phone</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td> <?= $user["id"] ?></td>
                            <td> <?= $user["first_name"] ?></td>
                            <td> <?= $user['last_name']; ?></td>
                            <td> <?= $user["home_address"]; ?></td>
                            <td> <?= $user["home_phone"]; ?></td>
                            <td> <?= $user["cell_phone"]; ?></td>
                            <td> <?= $user["email"]; ?></td>
                            <td> <?= $user["password"]; ?></td>
                            <td> <?= $user["role_as"] ? "Admin" : "User"; ?></td>
                            <td style="display:grid"> 
                            <a href="edit-user.php?id=<?= $user['id'];?>" class= "btn btn-primary">Edit</a>
                            <form action="code.php" method= "POST">
                                <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                                <button type="submit" class="btn btn-danger" name="delete_user_btn">Delete</button>
                            </form>
                            </td>
                        </tr>                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php')?>