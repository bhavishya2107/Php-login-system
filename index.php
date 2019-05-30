<?php
require "header.php";
?>
<main>
<div class="container-fluid">
<section class="jumbotron">

<?php
if (isset($_SESSION['userId'])) {
    echo '<p  style="font-size:5vw" >You are logged In!</p>';
} 
else{
    echo '<p style="font-size:50px">You are logged Out!</p>';
}
?>
</section>
</div>
</main>
<?php
require "footer.php" 
?>