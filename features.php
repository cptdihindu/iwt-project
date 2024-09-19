<html>
<head>
    <title>NexRide Help</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .all-bodies{
            padding: 0 50;
        }
        .nav-margin{
            margin: 50;
        }
        .box{
            width: 65%;
            max-width: none;
        }
        .all-boxes{
            box-shadow:3px 3px 15px 20px rgba(0, 0, 0, 0.300);
            border-radius: 10px;
            border: 2px solid orange;
        }
        .answer{
            color: rgb(200, 200, 200);
        }
    </style>

    <script>
      function expandBox(button){
        var box = button.closest('.box');
        var answer = box.querySelector('.answer');
        var question = box.querySelector('.question')

        if(button.innerHTML == "╲╱"){
          answer.classList.add("expanded-answer");
          question.classList.add("expanded-question");
          button.innerHTML = "╱╲";
        }
        else{
          answer.classList.remove("expanded-answer");
          question.classList.remove("expanded-question");
          button.innerHTML = "╲╱";
        }
      }
    </script>
</head>
<body>
<?php
require_once('php/nav-variables.php');
require_once('php/login.php');
$page = "features";

require_once('header.php');
/*
require_once('index.php');
*/
?>
<div class="nav-margin"></div>

<div class="all-bodies">    
    <!---------------------------------------User roles---------------------------------------->
    <div class="help-body">
        <h1 align="center" >User Roles Breakdown</h1>

        <div class="all-boxes">
            <!-----------------------------------------Admins---------------------------------------->
            <div class="box">
            <button type="button" class="expand-btn" onclick="expandBox(this)">╲╱</button>
                <div class="question">
                    Admins
                </div>
                <div class="answer">
                    <ul>
                        <li>When an admin login to the system, they can access the Admin page through the navigation bar.</li><br>
                        <li>There is a default admin in the system called "ucscAdmin"</li><br>
                        <li>A logged admin see the details of all registered users in the database.</li><br>
                        <li>Admins have the ability to <b>Edit</b> and <b>Delete</b> any user data.</li><br>
                        <li>Admins can give the admin role to the other users through Admin page.</li><br>
                        <li>Admins can log out of the website by clicking the logout button on the right side of the navigation bar.</li>
                    </ul>
                </div>
            </div>
            <!-----------------------------------------------Customers------------------------------------>
            <div class="box">
            <button type="button" class="expand-btn" onclick="expandBox(this)">╲╱</button>
                <div class="question">
                    Customers
                </div>
                <div class="answer">
                    <ul>
                        <li>To become a customer, they need to register by clicking the "Join the Ride Revolution" button.</li><br/>
                        <li>All registered members are initially signed in as customers.</li><br/>
                        <li>The vehicle options are no longer visible for the customers in the home page.</li><br/>
                        <li>Customers now have access to the Ride page.</li><br/>
                        <li>The previously hidden vehicle options are available to customers on the Ride page.</li><br/>
                        <li>Customers can now book vehicles.</li><br/>
                        <li>They can view their reservation details on the Ride page.</li><br/>
                        <li>If they no longer want their reservation, they can cancel it by clicking the delete icon in the action column.</li><br/>
                        <li>Customers can log out of the website by clicking the logout button on the right side of the navigation bar.</li>
                        
                    </ul>
                </div>
            </div>
            <!--------------------------------------------------------Guest--------------------------------------->
            <div class="box">
            <button type="button" class="expand-btn" onclick="expandBox(this)">╲╱</button>
                <div class="question">
                    Guests
                </div>
                <div class="answer">
                    <ul>
                        <li>When a guest visits our website, they will see various promotional banners designed specifically to capture their attention.</li><br/>
                        <li>These banners are displayed randomly.</li><br/>
                        <li>Guests don’t need to register to view the available vehicles and their prices. This information is visible directly on the homepage.</li><br/>
                        <li>If a guest wants to register, they can do so by clicking the "Join the Ride Revolution" button. </li>
                        
                
                </div>
            </div>
        </div>
    </div>


    <!---------------------------------------Special features---------------------------------------->
    <div class="help-body">
        <h1 align="center" >Special Features</h1>
        
        <div class="all-boxes">
            <div class="box">
            <button type="button" class="expand-btn" onclick="expandBox(this)">╲╱</button>
                <div class="question">
                    Dynamic banners
                </div>
                <div class="answer">
                    <ul>
                        <li>in <b>banner.php</b> file in the php folder, we have defined 2 string arrays called <i>userBanners</i> and <i>guestBanners</i>.</li><br>

                        <li>In each array there are various offers and promotions customized according to the user type. Ex :</li><br>
                        <ul>
                        <li>First ride offers, fresh deals for guests.</li><br>
                        <li>Other offers for logged users. <i>("Thank You for Being a Loyal User! Get 20% OFF your next ride booked this week!")</i></li><br>
                        </ul>
                    </ul>
                </div>
            </div>

            <div class="box">
            <button type="button" class="expand-btn" onclick="expandBox(this)">╲╱</button>
                <div class="question">
                    Dynamic greeting
                </div>
                <div class="answer">
                    <ul>
                        <li>Website greets the user with their first name as "Welcome, <i>Username !</i> 👋"</li><br>
                        <li>If the user is a guest, website greets them with "Welcome, Guest !"</li>
                    </ul>
                </div>
            </div>

            <div class="box">
            <button type="button" class="expand-btn" onclick="expandBox(this)">╲╱</button>
                <div class="question">
                    Dynamic vehicle section placement
                </div>
                <div class="answer">
                    <ul>
                        <li>Guests can view the vehicle options on the homepage.</li><br/>
                        <li>The vehicle options on the homepage are no longer visible once a guest is logged in.</li><br/>
                        <li>Instead, those options are available on the Ride page for logged-in customers.</li><br/>
                        
                    </ul>
                </div>
            </div>
            
            <div class="box">
            <button type="button" class="expand-btn" onclick="expandBox(this)">╲╱</button>
                <div class="question">
                    Visibility of Ride booking form
                </div>
                <div class="answer">
                    <ul>
                        <li>Once a customer books a ride, the booking form is no longer visible.</li><br/>
                        <li>If they cancel the ride, they will be able to see the form again.</li>
                        
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php');?>










</body>
</html>