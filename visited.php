<?php
session_start();
include("./includes/header.php");
?>
<div class="py-5">
    <div class="container">
        <h3 class="fw-bold">Visited Page</h3>
        
            <?php if(isset($_COOKIE['pages'])) {
                ?>
                <div class="text-center bg-light py-4">
                    
                    <?php $array = explode(", ", $_COOKIE['pages']);
                foreach($array as $a) {
                    echo $a."<br>";
                } ?>
                </div>
            <?php } else {
                echo "
                <div class='text-center bg-light py-4'>
                    <h4>No Cookies Set</h4>
                </div>    
                ";
            }
?>
                
        <a class= "btn btn-warning" href="clear_cookie.php"> Clear</a>
    </div>
</div>

<?php include("./includes/footer.php")?>