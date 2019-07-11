<?php 
session_start();
include 'Connection.php';
$connection = new Connection;

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $array = array(
    ':username'=>$username,
        ':password'=>$password
    );
    $connection->update("INSERT INTO users(username,password) VALUES(:username,:password)",$array); 
}
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $result = $connection->getAll("SELECT * FROM users WHERE username = '$username' AND password = '$password'", null);
    print_r($result);
    if(count($result)){
        $_SESSION['logged_id'] = $username;
        header("location:index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
   <h3>Welcome</h3>
    <form action="" method="post">
        <label for="username">username</label>
        <input type="text" name="username" id="username" required><br>
        
        <label for="password">password</label>
        <input type="password" name="password" id="password" required>
        
        <input type="submit" value="Login" name="login">
        <input type="submit" value="Register" name="register">
    </form>
</body>
</html>