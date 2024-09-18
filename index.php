<html>
    <head>
        <title>NexRide 2.0</title>
        <link rel="stylesheet" href="style.css">
        <script src="scripts/validate.js"></script>
        <?php
            require_once('php/connect.php');
            require_once('php/login.php');
            require_once('php/banner.php');
            require_once('php/nav-variables.php');

            $page = "home";
        ?>
    </head>
    <body>
    <?php require_once('header.php') // Including header file ?> 
        <div class="welcome-user">
            <span>
                <?php
                    if(!empty($_SESSION['user_fname'])){
                        echo "Welcome, " . $_SESSION['user_fname'] . " ! 👋";
                    }else{
                        echo "Welcome, Guest !";
                    }
                ?>
            </span>
<!--------------------------------------------------------------Welcome note-------------------------------------------------------------------------------->
        </div>
        <div class="welcome-note">
            <div class="topic">
                Join the Ride Revolution with NexRide
            </div>
            <div class="content">
                Let’s hit the road together! Experience the difference with Your Ride, Your Way. Your adventure awaits! 🌟
            </div>
        </div>

<!--------------------------------------------------------------Dynamic banners-------------------------------------------------------------------------------->
        <?php
            # banner for logged users
            if(!empty($_SESSION['user_fname'])){
                $randKey = array_rand($userBanners);
                echo "<marquee class='user-banner'>
                        $userBanners[$randKey]
                     </marquee>";
            
            # banner for guest users
            }else{
                $randKey = array_rand($guestBanners);
                echo "<marquee class='guest-banner'>
                        $guestBanners[$randKey]
                     </marquee>";
            }
        ?>

<!--------------------------------------------------------------Services-------------------------------------------------------------------------------->
        <div class="wrapper">
            <div class="topic">Our services</div>
            <div class="services">
                <div class="service">
                    <h2 class="subtopic">NexRide Taxi</h2>
                    <img src="Images/taxi-icon.png" alt="taxi-icon">
                    <div class="content">
                        Need a lift? Our reliable taxis get you where you need to go—safely and on time!
                    </div>
                </div>
                <div class="service">
                    <h2 class="subtopic">NexRide Food</h2>
                    <img src="Images/food-icon.png" alt="food-icon">
                    <div class="content">
                        Hungry? Your favorite meals are just a tap away—fresh and hot at your doorstep!
                    </div>
                </div>
                <div class="service">
                    <h2 class="subtopic">NexRide Truck</h2>
                    <img src="Images/truck-icon.png" alt="truck-icon">
                    <div class="content">
                        Big items to move? Our efficient truck service handles it all with care. Let’s get moving!
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper">
            <div class="btn-container">
                <?php
                    #if user not logged in, JOIN button should visible
                    if(empty($_SESSION['user_fname'])){
                        echo
                        "<button class='long-btn' onclick='openLoginPopup()'>
                            Join the Ride Revolution!
                        </button>";
                    }
                ?>
<!--------------------------------------------------------Login popup-------------------------------------------------------------------------------->
                <div class="login-popup" id="login-popup">
<!--Login form-->
                <form id="c_login_form" action="php/login.php" method="post">
                    <h2 class="form-heading">Login</h2>
                    <button type="button" class="popup-close-btn" onclick="closeLoginPopup()">X</button>
                    <div class="login-row">
                        E-mail<br>
                        <input type="text" name="login-email" class="textfield">
                    </div>
                    <div class="login-row" id="login-password-row">
                        Password<br>
                        <input id="login-pass" type="password" name="login-pass" class="textfield">
                        <img id="login-eye" src="icons/eye-close.png">
                    </div>
                    <div class="login-row">
                        <input type="submit" name="login-submit" value="Login" class="login-submit"><!--Login submit button-->
                    </div>
                    <div>
                        Don't have an account ? <a class="loginSignRedir" onclick="openSignInPopup()">register</a>
                    </div>
                </form>
                </div>
<!--------------------------------------------------------Sign in popup-------------------------------------------------------------------------------->
                <div class="sign-in-popup" id="sign-in-popup">
<!--Sign in form-->
                <form id="c_sign_in_form" action="php/sign-in.php" method="post" onkeyup="validateSignIn()" onsubmit="return validateSignIn()">
                    <h2 class="form-heading">Sign In</h2>
                    <button type="button" class="popup-close-btn" onclick="closeSignInPopup()">X</button>

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
                        Already have an account ? <a class="loginSignRedir" onclick="loginSignRedir()">Login</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
<!------------------------------------------------Javascript for password eye toggling-------------------------------------------------------------------------------->
        <script>
            var loginEye = document.getElementById("login-eye");
            var signEye = document.getElementById("sign-eye");
            var signReEye = document.getElementById("sign-re-eye");

            var loginPass = document.getElementById("login-pass");
            var signPass = document.getElementById("sign-pass");
            var signRePass = document.getElementById("re-sign-pass");

            loginEye.onclick = function(){
                if(loginPass.type == "password"){
                    loginPass.type = "text";
                    loginEye.src = "icons/eye-open.png";
                }
                else if(loginPass.type = "text"){
                    loginPass.type = "password";
                    loginEye.src = "icons/eye-close.png";
                }
            }

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

<!-----------------------------------------------------------Why choose us-------------------------------------------------------------------------------->
        <div class="wrapper">
            <div class="topic">Why Choose Us?</div>
            <table class="feature-table">
                <tbody>
                <tr class="odd">
                    <td>
                        <img class="table-icon" src="icons/24-7.png" alt="24/7-icon">
                    </td>
                    <td class="hl">24/7 Availability</td>
                    <td>
                        Your schedule is our priority! We are available 24/7 to meet your transportation needs, ensuring you can count on us whenever you need a ride, day or night.
                    </td>
                </tr>
                <tr>
                    <td>
                        <img class="table-icon" src="icons/wallet.png" alt="24/7-icon">
                    </td>
                    <td class="hl">Affordable Rates</td>
                    <td>
                        Quality service doesn’t have to be expensive. We offer competitive pricing that provides exceptional value without compromising your comfort, making it affordable for you to travel in style.
                    </td>
                </tr>
                <tr class="odd">
                    <td>
                        <img class="table-icon" src="icons/shield.png" alt="24/7-icon">
                    </td>
                    <td class="hl">Safety First</td>
                    <td>
                        Our drivers are thoroughly vetted and professionally trained to ensure your safety and security during every ride. Trust us to provide a reliable and secure transportation experience every time.
                    </td>
                </tr>
                <tr>
                    <td>
                        <img class="table-icon" src="icons/click.icon.png" alt="24/7-icon">
                    </td>
                    <td class="hl">Easy Booking</td>
                    <td>
                        With just a few clicks, your ride is ready to go! Easily download our app or book online to enjoy a seamless and convenient transportation experience tailored to your needs.
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

<!-----------------------------------------------------------Vehicles-------------------------------------------------------------------------------->
        <!----------------------------------------1st row------------------------------------------->
        <div class="wrapper">
            <div class="topic">Our options</div>

            <div class="vehicle-row">
                <div class="vehicle">
                    <h2 class="subtopic">Tuk</h2>
                    <img src="Images/Tuk.png" alt="Image of a tuk">
                    <div class="content">
                    Base Fare (for 2km) <br/>LKR.180<br/><br/>
                    Waiting Fare <br/>Per Minute LKR. 7<br/><br/>
                    Per Kilometer LKR. 80

                    </div>
                </div>
                <div class="vehicle">
                    <h2 class="subtopic">Nano Car</h2>
                    <img src="Images/Nano_Car.png" alt="Image of a  small car">
                    <div class="content">
                    Base Fare (for 2km) <br/>LKR.240<br/><br/>
                    Waiting Fare <br/>Per Minute LKR. 10<br/><br/>
                    Per Kilometer LKR. 100
                    </div>
                </div>
                <div class="vehicle">
                    <h2 class="subtopic">Mini Car</h2>
                    <img src="Images/Mini_Car.png" alt="Image of a mini car">
                    <div class="content">
                    Base Fare (for 2km) <br/>LKR.260<br/><br/>
                    Waiting Fare <br/>Per Minute LKR. 12<br/><br/>
                    Per Kilometer LKR. 110
                    </div>
                </div>
            </div>

            <!----------------------------------------2nd row------------------------------------------->
            <div class="vehicle-row">
                <div class="vehicle">
                    <h2 class="subtopic">Hybrid Car</h2>
                    <img src="Images/Hybrid_Car.png" alt="Image of a hybrid car">
                    <div class="content">
                    Base Fare (for 2km) <br/>LKR.300<br/><br/>
                    Waiting Fare <br/>Per Minute LKR. 12<br/><br/>
                    Per Kilometer LKR. 130
                    </div>
                </div>
                <div class="vehicle">
                    <h2 class="subtopic">Mini Van</h2>
                    <img src="Images/Mini_Van.png" alt="Image of a mini van">
                    <div class="content">
                     Base Fare (for 2km) <br/>LKR.250<br/><br/>
                     Waiting Fare <br/>Per Minute LKR. 15<br/><br/>
                     Per Kilometer LKR. 120 
                    </div>
                </div>
                <div class="vehicle">
                    <h2 class="subtopic">Van Non A/C</h2>
                    <img src="Images/Van_Non_AC.png" alt="Image of a non A/C van">
                    <div class="content">
                     Base Fare (for 2km) <br/>LKR.270<br/><br/>
                     Waiting Fare <br/>Per Minute LKR. 15<br/><br/>
                     Per Kilometer LKR. 125
                
                    </div>
                </div>
            </div>
            <!----------------------------------3rd row---------------------------------------------------->
            <div class="vehicle-row">
                <div class="vehicle">
                    <h2 class="subtopic">Van A/C</h2>
                    <img src="Images/Van_AC.png" alt="Image of a A/C van">
                    <div class="content">
                    Base Fare (for 2km) <br/>LKR.320<br/><br/>
                    Waiting Fare <br/>Per Minute LKR. 18<br/><br/>
                    Per Kilometer LKR. 150
                    </div>
                </div>
                <div class="vehicle">
                    <h2 class="subtopic">Batta Lorry</h2>
                    <img src="Images/Batta_Lorry.png" alt="Image of a batta lorry">
                    <div class="content">
                    Base Fare (for 2km) <br/>LKR.280<br/><br/>
                    Waiting Fare <br/>Per Minute LKR. 16<br/><br/>
                    Per Kilometer LKR. 130
                    </div>
                </div>
                <div class="vehicle">
                    <h2 class="subtopic">Lorry</h2>
                    <img src="Images/Lorry.png" alt="Image of a lorry">
                    <div class="content">
                    Base Fare (for 2km) <br/>LKR.280<br/><br/>
                    Waiting Fare <br/>Per Minute LKR. 16<br/><br/>
                    Per Kilometer LKR. 140
                    </div>
                </div>
            </div>

        </div>


        <?php require_once('footer.php') // including footer file ?>
        <script src="scripts/popups.js"></script>
    </body>
</html>