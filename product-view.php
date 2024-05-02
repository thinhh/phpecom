<?php
session_start();

include("functions/userfunctions.php");
if(isset($_GET['product'])) {
    $product = $_GET['product'];
    if(isset($_COOKIE["pages"])) {
        if(explode(", ", $_COOKIE["pages"])[0] != $_GET["product"]) {
            setcookie("pages", $_GET["product"].", ".$_COOKIE["pages"], time() + (86400 * 30));
        }

    } else {
        setcookie("pages", $_GET["product"], time() + (86400 * 30));
    }
    if(isset($_SESSION['auth'])) {
        if(isset($_COOKIE["path"])) {
            if(explode(", ", $_COOKIE["path"])[0] != $_GET["product"]) {
                setcookie("path", $_GET["product"].", ".$_COOKIE["path"], time() + (86400 * 30));
            }

        } else {
            setcookie("path", $_GET["product"], time() + (86400 * 30));
        }
    }
    include("includes/header.php");
    $product_data = getSlugActive("products", $product);
    $product = mysqli_fetch_array($product_data);
    if($product) { ?>
            
            <br>
            <div class="bg-light py-4">
                <div class="container mt-3">
                    <h3><a href="index.php">Home</a>/<a href="categories.php">Companies</a>/<?= $product['name'];?><h3>
                    <div class="row"> 
                        <div class="col-md-4">
                            <br>
                            <div class="shadow">
                                <img src="./uploads/<?= $product['image']?> " alt="product image" class='card-img'>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <br>
                            <h1 class="fw-bold"> <?= $product['name'];?>
                            <span class="text-danger float-end">
                                <?php if($product['trending']) {
                                    echo "Trending";
                                }?>
                            </span>
                            </h1>
                            <hr>
                            <h4><?= $product['small_description'];?><h4>
                            <hr>
                            <input type="hidden" id="stock" value=" <?= $product['qty'];?>">
                            <h5>Product in-stock: <?= $product['qty'];?><h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6"><h5>Original Price:<s class='text-danger'> $<?= $product['original_price'] ?></s> </h5></div>
                                <div class="col-md-6"><h5>Discounted Price: <span class='text-success fw-bold'>$<?= $product['selling_price'] ?><span></h5></div>
                            </div>
                            <hr>
                            <div class="container product_data mt-3">
                                <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group mb-3" style="width:130px">
                                        <button class="input-group-text decrement_btn">-</button>
                                        <input type="number" class="form-control bg-white text-center input_qty" id="input_qty" value="1" disabled>
                                        <button class="input-group-text increment_btn">+</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                           
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <button class='btn btn-primary px-4 fw-bold addToCartBtn' value="<?= $product['id'] ?>"><i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" name="add_review" id="add_review" class="btn btn-warning fw-bold">Add a Review</button>
                                </div>
                            </div>


                            <hr>
                            <h5>Product Description</h5>
                            <h5><?= $product['description'];?></h5>
                        </div>
                    </div>
                </div>
            </div><br>
        
            <div class="container col-md-6 mb-4">
                <h3 class="fw-bold text-center">Reviews</h3>
                <div class="card shadow" id="review_content">
                <?php
                $reviews = get_reviews_by_prod_id($product["id"]);
        if(mysqli_num_rows($reviews) > 0) {
            foreach($reviews as $item) {?>
                        <div class="card-header fw-bold"><?= $item['user_name']?></div>
                        <div class="card-body"><?= $item['user_review']?></div>
               <?php
            }
        }
        ?>
                </div>
                </div>
            </div>
    	
    		<?php if(isset($_COOKIE['path']) && isset($_SESSION['auth'])) {
    		    ?>
                <div class="text-center bg-light py-4">
                    <h3 class="fw-bold">Recent 5 visited products</h3>
                    <?php $array = explode(", ", $_COOKIE['path']);
    		    if(sizeof($array) >= 5) {
    		        for($i = 0 ; $i < 5; $i++) {
    		            echo $array[$i]."<br>";
    		        }
    		    } else {
    		        foreach($array as $a) {
    		            echo $a."<br>";
    		        }
    		    }

    		    ?>
                </div>


        <?php
    		} else {
    		    echo "<h3 class='text-center fw-bold'>Login to View Your Recent Products</h3>";
    		}
    } else {
        redirect("products.php", "Product Not Found", "error");
    }
} else {
    redirect("products.php", "Page Not Found", "error");
}?>
<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	      	</div>
	      	<div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="prod_id" id="review_prod_id" value="<?= $product['id']?>">
                </div>
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>
<?php
include("includes/footer.php");
?>


