<?php
session_start();
if(isset($_COOKIE["pages"])) {
    if(explode(", ", $_COOKIE["pages"])[0] != "Home") {
        setcookie("pages", "Home".", ".$_COOKIE["pages"], time() + (86400 * 30));
    }

} else {
    setcookie("pages", "Home", time() + (86400 * 30));
}
include("./functions/userfunctions.php");
include("includes/header.php");?>
<div class="py-4">
    <div class="container">
        <h3>Home</h3> <br>
        <div class="row">
            <div class="col-md-12">
                <h4>Top 5 Most Search Products</h4>
                <hr>
                <div class="row">
                    <?php $most_search_prods = mostSearchProduct();
                    if(mysqli_num_rows($most_search_prods) > 0){
                        foreach($most_search_prods as $item){?>
                    <div class="col-md-2 mb-2 product_data">
                        <a href="product-view.php?product=<?=$item['slug']?>" class="update_hits ">
                            <input type="hidden" class="hits" value="<?= $item['hits'] ?>">
                            <input type="hidden" class="hits_prod_id" value="<?= $item['id'] ?>">
                            <div class="card shadow">
                                <div class="card-header text-center bg-dark text-light">
                                    <?= $item['name'] ?>
                                </div>
                                <div class="card-body">
                                    <img src="uploads/<?=$item['image']; ?>" class="card-img" alt="category image">
                                </div>
                                <div class='fw-bold text-center'>Searches: <?= $item['hits']?>
                                </div>
                            </div>
                        </a>

                    </div>
                    <?php }
                    }
                    
                ?>
                </div>
                <br>
                <h4>Trending Discount Products</h4>
                <hr>
                <div class="row">
                    <?php $trend_prods = getAllTrending();
                    if(mysqli_num_rows($trend_prods) > 0){
                        foreach($trend_prods as $item){?>
                    <div class="col-md-2 mb-2 product_data">
                        <a href="product-view.php?product=<?=$item['slug']?>" class="update_hits ">
                            <input type="hidden" class="hits" value="<?= $item['hits'] ?>">
                            <input type="hidden" class="hits_prod_id" value="<?= $item['id'] ?>">
                            <div class="card shadow">
                                <div class="card-header text-center bg-dark text-light">
                                    <?= $item['name'] ?>
                                </div>
                                <div class="card-body">
                                    <img src="uploads/<?=$item['image']; ?>" class="card-img" alt="category image">
                                </div>
                                <div class="text-center">
                                    <h6>Original: <br><s class='text-danger'> $<?= $item['original_price'] ?></s> </h6>
                                </div>
                                <div class="text-center">
                                    <h6>Discount: <br> <span
                                            class='text-success fw-bold'>$<?= $item['selling_price'] ?><span></h6>
                                </div>
                            </div>
                        </a>

                    </div>
                    <?php }
                    }
                    
                ?>
                </div>
                <br>
                <h4>All Products</h4>
                <hr>
                <div class="row">
                    <div class="owl-carousel">
                        <?php $trend_prods = getAllActive('products');
                                    if(mysqli_num_rows($trend_prods) > 0){
                                    foreach($trend_prods as $item){?>
                                    <div class="item">
                                        <a href="product-view.php?product=<?=$item['slug']?>" class="update_hits ">
                                            <input type="hidden" class="hits" value="<?= $item['hits'] ?>">
                                            <input type="hidden" class="hits_prod_id" value="<?= $item['id'] ?>">
                                            <div class="card shadow">
                                                <div class="card-header text-center bg-dark text-light">
                                                    <?= $item['name'] ?>
                                                </div>
                                                <div class="card-body">
                                                    <img src="uploads/<?=$item['image']; ?>" class="card-img" alt="category image">
                                                </div>
                                                <div class="text-center">
                                                    <h6>Original: <br><s class='text-danger'> $<?= $item['original_price'] ?></s>
                                                    </h6>
                                                </div>
                                                <div class="text-center">
                                                    <h6>Discount: <br> <span
                                                            class='text-success fw-bold'>$<?= $item['selling_price'] ?><span></h6>
                                                </div>
                                            </div>
                                        </a>

                        </div>
                        <?php }
                            }
                            
                            ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>


<?php include("includes/footer.php");?>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
</script>