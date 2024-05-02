<?php
session_start();
if(isset($_COOKIE["pages"])) {
    if(explode(", ", $_COOKIE["pages"])[0] != "Companies") {
        setcookie("pages", "Companies".", ".$_COOKIE["pages"], time() + (86400 * 30));
    }

} else {
    setcookie("pages","Companies", time() + (86400 * 30));
}
include("includes/header.php");
include("functions/userfunctions.php");?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><a href="index.php">Home</a>/Companies</h3> <br>
               <h2>Companies</h2> <br>
               <div class="row">
                    <?php 
                        $categories= getAllActive("categories");
                        if(mysqli_num_rows($categories) > 0){
                            foreach($categories as $item){ ?>
                                
                               <div class="col-md-2 mb-2">
                                    <a href="products.php?category=<?= $item['slug'] ?>"> 
                                        <div class="card shadow">
                                            <div class="card-header text-center bg-dark text-light">
                                                <?= $item['name'] ?>
                                            </div>
                                            <div class="card-body">
                                                <img src="uploads/<?=$item['image']; ?>" class='card-img' alt="category image">
                                            </div>
                                        </div>
                                    </a>
                                
                               </div>
                               
                            
                        <?php }
                        }
                        else{
                            echo "No category available";
                        }
                    ?>
               </div>
               
            </div>
        </div>
    </div>
</div>


<?php include("includes/footer.php");?>