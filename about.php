<html>
<head>
    <title>NexRide About</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once('php/nav-variables.php');
require_once('php/login.php');
$page = "about";

require_once('header.php');
/*
require_once('index.php');
*/
?>
<div class="nav-margin"></div>

<div>
    <div class="about-image">
        <img src="Images/about-image.jpg"/>
    </div>

    <div class="about-blank">
        <h3><a href="index.php"> Home</a> / About Us </h3>
    </div>

    <div class="about-content">
        <h1 align="center">About Us</h1>
        <h3> A Brief description Of Our Company </h3>

       <p align="justify"> NexRide, having opened its doors on 5th september 2023 at Norris Canal road, Colombo 10,, 
        is currently the pioneer cab Servicse company in Sri Lanka. While still operating at the same location it has moved its main practice to spacious location at No. 06, Ward Place Colombo Sri Lanka.
        Where its corporate office is located.
        The main reason for success of <b><i> NexRide </i></b> is providing good service of well trained staff. </p>
        
        <h3>Our Vision </h3>
        "To be the most reliable and customer-focused cab service, ensuring safe,convenient, and affordable transportation for all" 

        <h3> Our Mission </h3>
        "To Provide safe , reliable, and affordable transportation, ensuring a seamless booking experience with timely service, prioritizing customer satisfaction and driver welfare."
    </div>
</div>

<?php require_once('footer.php');?>
</body>
</html>