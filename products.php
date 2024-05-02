<?php
session_start();
if(isset($_COOKIE["pages"])) {
    if(explode(", ", $_COOKIE["pages"])[0] != $_GET['category']) {
        setcookie("pages", $_GET['category']."'s Products".", ".$_COOKIE["pages"], time() + (86400 * 30));
    }

} else {
    setcookie("pages", $_GET['category']."'s Products", time() + (86400 * 30));
}
include("includes/header.php");
include("functions/userfunctions.php");
if(isset($_GET['category'])) {
    if($_GET['category'] == "") {
        redirect('categories.php', "No Category Selected", 'error');
    }
    $category_slug = $_GET['category'];
    $category_data = getSlugActive("categories", $category_slug);
    $category = mysqli_fetch_array($category_data);
    if($category) {
        $cid = $category['id'];
        ?>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3><a href="index.php">Home</a>/<a href="categories.php">Companies</a>/<?= $category['name']?></h3> <br>
                        <h2><?= $category['name']?></h2> <br>
                        <div class="row">
                            <?php
                                        $products = getProdByCategory($cid);
                                if(mysqli_num_rows($products) > 0) {

                                    foreach($products as $item) { ?>
                                        
                                    <div class="col-md-2 mb-2 product_data">
                                            <a href="product-view.php?product=<?=$item['slug']?>" class="update_hits " > 
                                                <input type="hidden" class="hits" value="<?= $item['hits'] ?>">
                                                <input type="hidden" class="hits_prod_id" value="<?= $item['id'] ?>">
                                                <div class="card shadow">
                                                <div class="card-header text-center bg-dark text-light">
                                                        <?= $item['name'] ?>
                                                    </div>
                                                    <div class="card-body">
                                                        <img src="uploads/<?=$item['image']; ?>" class="card-img" alt="category image">
                                                    </div>
                                                </div>
                                            </a>
                                        
                                    </div>
                                    
                                <?php }
            } else {
                echo "No product available";
            }
        ?>
                        </div>
               
                    </div>
             </div>
            </div>
        </div>


<?php
    } else {
        redirect("categories.php", "Category Not Found", "error");
    }
} else {
    redirect("categories.php", "Page Not Found", "error");
}

include("includes/footer.php");?>