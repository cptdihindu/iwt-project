<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Nexride Driver</title>
    <style>
        .form-holder{
            display: flex;
            justify-content: center;
            width: 100%;
        }
        .sign-in-popup{
            position: static;
            visibility: visible;
            transform: scale(1);
        }
        td .logout-btn{
            box-shadow: none;
            height: 35px;
            width: 80px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    
<?php
require_once('php/nav-variables.php');
require_once('php/login.php');
require_once('php/connect.php');
$page = "driver";
require_once('header.php');

echo "<div class='nav-margin'></div>";
?>

<?php if (empty($_SESSION['user_role'])) {?>
<div class="form-holder">
    <div class="sign-in-popup" id="sign-in-popup">
    <!--Sign in form-->
        <form id="c_sign_in_form" action="php/sign-in.php?role=driver" method="post" onkeyup="validateSignIn()" onsubmit="return validateSignIn()">
            <h2 class="form-heading">Driver Sign In</h2>

            <div class="login-row">
                First Name
                <span id="fname-note"></span><!--JS Error note-->
                <input type="text" id="fname" name="fname" class="textfield">
            </div>

            <div class="login-row">
                Last Name
                <span id="lname-note"></span><!--JS Error note-->
                <input type="text" id="lname" name="lname" class="textfield">
            </div>

            <div class="login-row" style="display: flex;">
                Gender :
                <div class="radio-btns">
                    <div><input required class="radio" type="radio" name="gender" value="m">Male</div>
                    <div><input required class="radio" type="radio" name="gender" value="f">Female</div>
                </div> 
            </div>

            <div class="login-row">
                Phone
                <span id="tele-note"></span><!--JS Error note-->
                <input type="text" id="tele" name="tele" class="textfield">
            </div>

            <div class="login-row">
                Vehicle
                <select name="vehicle" class="textfield" required>
                    <option value="">Select the vehicle from the list</option>
                    <option value="tuk">Tuk</option>
                    <option value="nano-car">Nano Car</option>
                    <option value="mini-car">Mini Car</option>
                    <option value="hybrid-car">Hybrid Car</option>
                    <option value="mini-van">Mini Van</option>
                    <option value="van-non-ac">Van Non A/C</option>
                    <option value="van-ac">Van A/C</option>
                    <option value="batta-lorry">Batta Lorry</option>
                    <option value="lorry">Lorry</option>
                </select>
            </div>

            <div class="login-row">
                Plate number
                <span id="plate-note"></span><!--JS Error note-->
                <input type="text" id="plate" name="plate" class="textfield" style="text-transform: uppercase;" placeholder="Eg : NC-9024, CAB-1234">
            </div>

            <div class="login-row">
                Address
                <span id="address-note"></span><!--JS Error note-->
                <input type="text" id="address" name="address" class="textfield">
            </div>

            <div class="login-row">
                E-mail
                <span id="sign-email-note"></span><!--JS Error note-->
                <input type="text" id="sign-email" name="sign-email" class="textfield">
            </div>

            <div class="login-row" id="sign-password-row">
                Create a Password
                <span id="sign-pass-note"></span><!--JS Error note-->
                <input type="password" id="sign-pass" name="sign-pass" class="textfield">
                <img id="sign-eye" src="icons/eye-close.png">
            </div>

            <div class="login-row" id="sign-re-password-row">
                Repeat Password
                <span id="re-sign-pass-note"></span><!--JS Error note-->
                <input type="password" id="re-sign-pass" name="re-sign-pass" class="textfield">
                <img id="sign-re-eye" src="icons/eye-close.png">
            </div>

            <div class="login-row">
                <input type="submit" name="sign-in-submit" value="Sign In" class="login-submit"><!--Sign-in submit button-->
            </div>

            <div>
                Already have an account ? <a class="loginSignRedir" href="index.php">Login</a>
            </div>
        </form>
    </div>
</div>
<?php }?>

<!------------------------------------------------Javascript for password eye toggling------------------------------------------------------>
<script>

    var signEye = document.getElementById("sign-eye");
    var signReEye = document.getElementById("sign-re-eye");

    var signPass = document.getElementById("sign-pass");
    var signRePass = document.getElementById("re-sign-pass");

    signEye.onclick = function(){
        if(signPass.type == "password"){
            signPass.type = "text";
            signEye.src = "icons/eye-open.png";
        }
        else if(signPass.type = "text"){
            signPass.type = "password";
            signEye.src = "icons/eye-close.png";
        }
    }

    signReEye.onclick = function(){
        if(signRePass.type == "password"){
            signRePass.type = "text";
            signReEye.src = "icons/eye-open.png";
        }
        else if(signRePass.type = "text"){
            signRePass.type = "password";
            signReEye.src = "icons/eye-close.png";
        }
    }
</script>

<?php if(!empty($_SESSION['user_role']) && $_SESSION['user_role'] == 'driver') { ?>
    <div style="min-height: 400px;">
        <div class="topic">Ride Bookings</div>

        
        
        <!-- This is the div that will be dynamically updated with the booking table -->
        <div id="booking-table-container">
            <!-- Initially, load the table here with PHP -->
            <?php require_once('fetch-bookings.php'); ?>
        </div>
    </div>
<?php } ?>







<?php require_once('footer.php'); ?>

<script src="scripts/validate.js"></script>
<script>
    function loadRides() {
        var xhr = new XMLHttpRequest();  // Create a new AJAX request
        xhr.open('GET', 'fetch-bookings.php', true);  // Request fetch-bookings.php

        xhr.onload = function() {
            if (xhr.status == 200) {
                // Update the booking table with the new content
                document.getElementById('booking-table-container').innerHTML = xhr.responseText;
            }
        };

        xhr.send();  // Send the request
    }

    // Call loadBookings every 1000 mili seconds to refresh the bookings table
    setInterval(loadRides, 1000);
</script>

</body>
</html>