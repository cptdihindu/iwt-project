<html>
<head>
    <title>NexRide Help</title>
    <link rel="stylesheet" href="style.css">

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
$page = "help";

require_once('header.php');
/*
require_once('index.php');
*/
?>
<div class="nav-margin"></div>
<h1 align="center" >Frequently asked questions</h1>

<div class="all-boxes">

  <div class="box">
  <button type="button" class="expand-btn" onclick="expandBox(this)">╲╱</button>
      <div class="question">
          How do I register to NexRide taxi ?
      </div>
      <div class="answer">
          You can simply register to our WEBSITE through the "Join the Revolution Ride" icon in the Homepage. By clicking on that icon you can see a register link at the bottom .
      </div>
  </div>

  <div class="box">
  <button type="button" class="expand-btn" onclick="expandBox(this)">╲╱</button>
      <div class="question">
        How to Login to NexRide?
      </div>
      <div class="answer">
          You can login to our WEBSITE through the same icon you used to register.When you click on that icon a login form will appear.
      </div>
  </div>

  <div class="box">
  <button type="button" class="expand-btn" onclick="expandBox(this)">╲╱</button>
      <div class="question">
        How do I book a NexRide taxi ?
      </div>
      <div class="answer">
          To book a ride you have to register to our system first . Then login to our system by using the username and password you used to register . 
          Then simply enter your pickup location, destination, and preferred time on our homepage. Select the type of vehicle you want, and then confirm your booking.
      </div>
  </div>


  <div class="box">
  <button type="button" class="expand-btn" onclick="expandBox(this)">╲╱</button>
      <div class="question">
      How can I track my taxi ?
      </div>
      <div class="answer">
      Once your taxi has been dispatched, you can track its location in real-time through our app or website. A link to the live map will be provided in the confirmation message.
      </div>
  </div>


  <div class="box">
  <button type="button" class="expand-btn" onclick="expandBox(this)">╲╱</button>
      <div class="question">
        How much does a ride cost ?
      </div>
      <div class="answer">
        Basically it depends on the distance you travel with us . 
        Usually we cost Rs.150 per 1km.If you are a premium customer you will get rewarded with discounts (from 5% to 50%).
      </div>
  </div>

  <div class="box">
  <button type="button" class="expand-btn" onclick="expandBox(this)">╲╱</button>
      <div class="question">
        What payment options are available ?
      </div>
      <div class="answer">
        We accept various payment options, including credit/debit cards, mobile payments (e.g., Apple Pay, Google Pay), and cash. You can choose your preferred payment method during the booking process.
      </div>
  </div>


  <div class="box">
  <button type="button" class="expand-btn" onclick="expandBox(this)">╲╱</button>
      <div class="question">
        Can I cancel my booking ?
      </div>
      <div class="answer">
        Yes, you can cancel your booking. However, cancellation charges may apply depending on how soon before the scheduled time you cancel. Check our cancellation policy for more details.
      </div>
  </div>


  <div class="box">
  <button type="button" class="expand-btn" onclick="expandBox(this)">╲╱</button>
      <div class="question">
        Is it safe to travel with your drivers ?
      </div>
      <div class="answer">
      All our drivers are professionally trained and background-checked. Our vehicles are also regularly sanitized and maintained to ensure safety and comfort.
      </div>
  </div>


  <div class="box">
  <button type="button" class="expand-btn" onclick="expandBox(this)">╲╱</button>
      <div class="question">
        What should I do if my taxi is late ? 
      </div>
      <div class="answer">
      We aim to provide timely service, but in the rare event that your taxi is delayed, you will be notified through the website . You can also contact customer service for further assistance.
  </div>
</div>






























<?php require_once('footer.php');?>
</body>
</html>