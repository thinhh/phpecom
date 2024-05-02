
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src= "assets/js/owl.carousel.min.js"></script>
    <script src= "assets/js/custom.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> 
    <script>alertify.set('notifier','position', 'top-left');</script>
    
    <script> 
    <?php
        if(isset($_SESSION['success'])) {
            ?>
          alertify.success("<?= $_SESSION['success'] ?>");
            <?php
            unset($_SESSION['success']);
        } elseif(isset($_SESSION['error'])) {
            ?>
          alertify.error("<?= $_SESSION['error'] ?>");
          <?php
            unset($_SESSION['error']);
        }
    ?>
  </script>
  </body>
</html>