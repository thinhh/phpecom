<?php include('includes/header.php');?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Admin Dashboard</h2>
            <div class="row mt-4">
                <div class="col-lg-7 position-relative z-index-2">
                    <div class="card card-plain mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="d-flex flex-column h-100">
                                        <h2 class="font-weight-bolder mb-0">Statistics</h2>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-5 col-sm-5">
                            <div class="card  mb-2">
                                <div class="card-header p-3 pt-2">
                                    <div
                                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">people</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Number of Users</p>
                                        <h4 class="mb-0"><?= $user_count = getCount("users"); ?></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="card  mb-2">
                                <div class="card-header p-3 pt-2">
                                    <div
                                        class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">category</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Number of Categories</p>
                                        <h4 class="mb-0"><?= $category_count = getCount("categories"); ?></h4>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-lg-5 col-sm-5 mt-sm-0 mt-4">
                            <div class="card  mb-2">
                                <div class="card-header p-3 pt-2 bg-transparent">
                                    <div
                                        class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">store</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize ">Number of Product</p>
                                        <h4 class="mb-0 "><?= $product_count = getCount("products"); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card  mb-2">
                                <div class="card-header p-3 pt-2">
                                    <div
                                        class="icon icon-lg icon-shape bg-gradient-secondary shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">shopping_cart</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Number of Orders</p>
                                        <h4 class="mb-0"><?= $order_count = getCount("orders"); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
include('includes/footer.php')?>