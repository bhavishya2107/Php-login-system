<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>

.nav-link   {
    color: white;
}

</style>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-sm bg-dark">
    <a  class="navbar-brand" href="https://github.com/bhavishya2107">
    <img src="./PHP-logo.svg.png" width="50" height="50" alt="logo">
    </a>
    <ul class="navbar-nav">

    <li><a class="nav-link" href="index.php">Home</a></li>
    <li><a  class="nav-link" href="#">Portfolio</a></li>
    <li><a class="nav-link" href="#">About me</a></li>
    <li><a class="nav-link" href="#">Contact</a></li>
    
    </ul>
    <div class="navbar-header">


<?php
if (isset($_SESSION['userId'])) {
    echo ' <form action="logout.inc.php" method="post">
    <button class="btn btn-dark" type="submit" name="logout-submit">Logout</button>
    </form>';
} 
else{
    echo '<form action="login.inc.php" method="post">
    <input   type="text" name="mailuid" placeholder="Username/E-mail...">
    <input  type="password" name="pwd" placeholder="password...">
    <button class="btn btn-dark" type="submit" name="login-submit">Login</button>
    <button  class="btn btn-dark" href="signup.php">Signup</button>
    </form>';
}
?>
    
 
  

   
    </div>
   
    </nav>
    </header>
</body>
</html>