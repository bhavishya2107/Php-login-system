<?php
if(isset($_POST['signup-submit'])) {

    require 'db.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $confirmPwd = $_POST['confirm-pwd'];


//No fields must be empty validation 
if(empty($username) || empty($email) || empty($password) || empty($confirmPwd)) {    
    header("Location: signup.php?error=emptyfields&uid=".$username."&mail=".$email);
    exit();
}
//check for valid mail and usrname
else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
    header("Location: signup.php?error=invalidmail");
    exit();
}

//email validation
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: signup.php?error=invalidmail&uid=".$username);
    exit();
}

//username match validation
elseif(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
    header("Location: signup.php?error=invaliduid&mail=".$email);
    exit();
}
//match passwords
elseif($password !== $confirmPwd){
    header("Location: signup.php?error=pwdcheck&uid=".$username."&mail=".$email);
    exit();
}
else {

    $sql = "SELECT uidUsers FROM users WHERE uidUsers=? ";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){

        header("Location: signup.php?error=sqlerror");
    exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck > 0){
            header("Location: signup.php?error=usertaken&mail=".$email);
            exit();
        }
        else{
            $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?) ";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: signup.php?error=sqlerror");
            exit();
            }
            else{
                $hashedpwd = password_hash($password,PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedpwd);
                mysqli_stmt_execute($stmt);
                header("Location: signup.php?signup=success");
                exit();
 
            }
        }
    }
mysqli_stmt_close($stmt);
mysqli_close($conn);

}
}
else{
    header("Location: signup.php");
    exit();
}
?>
