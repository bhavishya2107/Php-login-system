<?php
require "header.php";
?>
<main>
<div class="container-fluid">
<section class="jumbotron">
<h1>Signup</h1>
<form   action="signup.inc.php" method="post">
<input class="form-control "  type="text" name="uid" placeholder="Username">
<input class="form-control" type="text" name="mail" placeholder="E-mail">
<input class="form-control" type="password" name="pwd" placeholder="Password">
<input class="form-control" type="password" name="confirm-pwd" placeholder="Confirm Password">
<br>
<button class="btn btn-dark" type="submit" name="signup-submit">Signup</button>
</form>
</section>
</div>


</main>
<?php
require "footer.php"
?>