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

<?php if(!empty($_SESSION['user_role']) && $_SESSION['user_role'] == 'driver') {?>
<div style="min-height: 400px;">
    <div class="topic">Ride Bookings</div>

    <?php
    $sql = "SELECT * FROM bookings";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) > 0){ ?>
        <div style="padding-bottom:25" class="subtopic">Go to customer's Pick up location, pick the customer and click "Picked" button to start the ride.</div>
        <table class="admin-table">
            <tbody>
                <tr>
                    <td>Customer No</td>
                    <td>Name</td>
                    <td>Phone</td>
                    <td>Vehicle</td>
                    <td>Pickup Location</td>
                    <td>Drop-off Location</td>
                    <td>Time</td>
                    <td>Date</td>
                    <td>Actions</td>
                </tr>

                <?php while($row = mysqli_fetch_assoc($result)) {?>
                    <tr>
                        <td><?php echo $row['no']?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['tele']?></td>
                        <td><?php echo $row['vehicle']?></td>
                        <td><?php echo $row['pickLoc']?></td>
                        <td><?php echo $row['dropLoc']?></td>
                        <td><?php echo $row['time']?></td>
                        <td><?php echo $row['date']?></td>

                        <td><a href='php/delete.php?no=<?php echo $row['no']; ?>'><button type="button" class="logout-btn">Picked</button></a></td>

                    </tr>
                    <?php } ?>
            </tbody>
        </table>
    
    <?php } else {?>
    <div style="color: #888; padding-top:100;" class="topic">
        No ride bookings available at this time.
    </div>

</div>
<?php } }?>






<?php require_once('footer.php'); ?>

<script src="scripts/validate.js"></script>
</body>
</html>