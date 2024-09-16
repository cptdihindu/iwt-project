<html><head><title>NexRide Login</title></head></html>
<?php
require_once('connect.php');

//starting the session
session_start();

if(isset($_POST['login-submit'])){
    $login_email = $_POST['login-email'];
    $login_pass = $_POST['login-pass'];
    
    $sql = "SELECT * FROM `$tb_name` WHERE `$tb_email` = '$login_email' AND `$tb_pass` = '$login_pass'";
    
    $result = mysqli_query($conn, $sql);

    if($result) {
        if (mysqli_num_rows($result) > 0) {
            // Fetch user data
            $userdata = mysqli_fetch_assoc($result);
    
            // Store user information in session variables
            $_SESSION['user_fname'] = $userdata['fname']; // Getting fname
            $_SESSION['user_role'] = $userdata['role']; // Getting role
    
            // Redirect to index.php
            header("Location: ../index.php");
            exit();
            
        } else {
            // Login failed
            $msg = "Incorrect Username or password !";
            //starting the session
            session_destroy();
            // Redirect to index.php
            echo
            "<script>
                alert('$msg');
                window.location.href = '../index.php';
            </script>";
            
    
        }
    }
}



// Close the connection
mysqli_close($conn);
?>