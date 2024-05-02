<?php
session_start();
if(isset($_COOKIE["pages"])) {
    if(explode(", ", $_COOKIE["pages"])[0] != "News") {
        setcookie("pages", "News".", ".$_COOKIE["pages"], time() + (86400 * 30));
    }

} else {
    setcookie("pages", "News", time() + (86400 * 30));
}
include("./includes/header.php");
?>

<div class="py-5">
    <div class="container">
        <h3 class="fw-bold"> News Page</h3> <hr>
        <div>
        <h5> News Post 1
            <br>
            New Items in Store. Check it out on homePage
        </h5>
        <h5> News Post 2
            <br>
            New Shirts in Store. Check it out on homePage
        </h5>
        <h5> News Post 3
            <br>
            New Iphones in Store. Check it out on homePage
        </h5>
        <h5> News Post 4
            <br>
            New Electronics in Store. Check it out on homePage
        </h5>
            
    </div>
</div>

<?php include("./includes/footer.php")?>