<?php
session_start();
if(isset($_COOKIE["pages"])) {
    if(explode(", ", $_COOKIE["pages"])[0] != "Contacts") {
        setcookie("pages", "Contacts".", ".$_COOKIE["pages"], time() + (86400 * 30));
    }

} else {
    setcookie("pages", "Contacts", time() + (86400 * 30));
}
include("./includes/header.php");
?>
<div class="py-5">
    <div class="container">
        <h3 class="fw-bold">Contact Page</h3> <hr>
        <div class='text-center'>
            <h3>For more Information or Help</h3>
        <h3>Please Contact Me at: </h3>
        <?php
            $fh = fopen('contact.txt', 'r');
print('<div class="container">');
while ($line = fgets($fh)) {
    if($line != "\n") {
        print "<h4>$line</h4>";
    } else {
        print "</br>";
    }
}
print("</div>");
fclose($fh);
?>
        </div>
        
        
    </div>
</div>

<?php include("./includes/footer.php")?>