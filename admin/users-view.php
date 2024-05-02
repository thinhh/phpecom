<?php include('includes/header.php');?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header fw-bold">
                    <h4>All Users</h4>
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
                            <?php 
                                $users= getAll("users");
                                if(mysqli_num_rows($users) > 0){
                                    foreach($users as $user)
                                    { 
                                    ?>
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