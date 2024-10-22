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
        $vehicle = $_POST['vehicle'];
        $plate = $_POST['plate'];
        $sign_pass = $_POST['sign-pass'];
        $role = $_GET['role'];

        echo "First Name: $fname<br>";
        echo "Last Name: $lname<br>";
        echo "Gender: $gender<br>";
        echo "Telephone: $tele<br>";
        echo "Address: $address<br>";
        echo "Sign Email: $sign_email<br>";
        echo "Vehicle: $vehicle<br>";
        echo "Plate: $plate<br>";
        echo "Sign Password: $sign_pass<br>";
        echo "Role: $role<br>";

        if($role == 'customer'){
            $sql = "SELECT * FROM `$tb_name` WHERE `$tb_email` = '$sign_email'";
            $result = mysqli_query($conn, $sql);

            if($result){
                if(mysqli_num_rows($result) > 0){
                    // E-mail already found
                    $message = "This email is already registered! Please log in to your account or use a different e-mail.";
                    echo
                    "<script>
                        alert('$message');
                        window.history.back();
                    </script>";
                    die();   // Stops the process
                }
            }
        }
        else if($role == 'driver'){
            $sql = "SELECT * FROM `$tb_name` WHERE `$tb_email` = '$sign_email'";
            $result = mysqli_query($conn, $sql);

            if($result){
                if(mysqli_num_rows($result) > 0){
                    // E-mail already found
                    $message = "This email is already registered! Please log in to your account.";
                    echo
                    "<script>
                        alert('$message');
                        window.history.back();
                    </script>";
                    die();   // Stops the process
                }
            }

            $sql = "SELECT * FROM `$tb_name` WHERE `$tb_plate` = '$plate'";
            $result = mysqli_query($conn, $sql);

            if($result){
                if(mysqli_num_rows($result) > 0){
                    // Plate already found
                    $message = "The number plate $plate is already registered! Log in to your account or use a different vehicle.";
                    echo
                    "<script>
                        alert('$message');
                        window.history.back();
                    </script>";
                    die();   // Stops the process
                }
            }
        }

        $sql = "INSERT INTO $tb_name(`$tb_fname`, `$tb_lname`, `$tb_gender`, `$tb_tele`, `$tb_vehicle`, `$tb_plate`, `$tb_adrs`, `$tb_email`, `$tb_pass`, `$tb_role`) VALUES('$fname', '$lname', '$gender', '$tele', '$vehicle', '$plate','$address', '$sign_email', '$sign_pass', '$role')";

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
