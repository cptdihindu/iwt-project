<?php require_once('connect.php') ?>
<html>
    <head>
        <link rel="stylesheet" href="../style.css">
        <title>NexRide Login</title>
    </head>
    <body>
        <?php
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $tele = $_POST['tele'];
        $address = $_POST['address'];
        $sign_email = $_POST['sign-email'];
        $sign_pass = $_POST['sign-pass'];

        $sql = "SELECT * FROM `$tb_name` WHERE `$tb_email` = '$sign_email'";
        $result = mysqli_query($conn, $sql);

        if($result){
            if(mysqli_num_rows($result) > 0){
                // E-mail already found
                $message = "This email is already registered ! Please log in to your account.";
                echo
                "<script>
                    alert('$message');
                    window.location.href = '../index.php';
                </script>";
                die();
            }
        }

        $sql = "INSERT INTO $tb_name(`$tb_fname`, `$tb_lname`, `$tb_gender`, `$tb_tele`, `$tb_adrs`, `$tb_email`, `$tb_pass`, `$tb_role`)VAlUES('$fname', '$lname', '$gender', '$tele', '$address', '$sign_email', '$sign_pass', 'customer')";

        if(mysqli_query($conn, $sql)){
            $message = 'User registered successfully! You can login now.';
            echo "<script>
                    alert('$message');
                    window.location.href = '../index.php';
                </script>";
        } else {
            $message = 'Error inserting data!';
            echo "<script>
                    alert('$message');
                    window.location.href = '../index.php';
                </script>";
        }

        ?>   
    </body>
</html>
