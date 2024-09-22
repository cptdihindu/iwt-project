<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Nexride Ride</title>
</head>
<body>
    
<?php
require_once('php/nav-variables.php');
require_once('php/login.php');
require_once('php/connect.php');
$page = "ride";
require_once('header.php');

echo "<div class='nav-margin'></div>";
?>


<?php
#--------------------------------------------------------Check the user before view the page---------------------------------------
if (isset($_SESSION['user_role'])) {
    # Logged customers can access 'ride' page
    if ($_SESSION['user_role'] != 'customer') {
        echo "<center><h2>Oops!</h2><br/><h2>You don't have access to this page!</h2></center>";
    }
}
else{
    echo "<center><h2>Oops!</h2><br/><h2>You cannot access this page!</h2></center>";
    require_once('footer.php');
    exit;
}

?>


<div id="ride-table-container"><!-----------------------------------------------PHP CODE TO VIEW ACTIVE BOOKINGS ------------------------------------------->
    <!-- Initially, load the table here with PHP -->
    <?php require_once('fetch-rides.php'); ?>
</div>


<!---------------------------------------------------Ride booking form--------------------------------------------------->
<?php if (mysqli_num_rows($result) == 0) { ?>
<div class="ride-form-holder">
    <form class="ride-form" action="ride.php" method="post" onkeyup="validateLocation()" onsubmit="return validateLocation()">
        <div class="topic">Book a Ride in Just Seconds!</div>

        <div class="login-row">
            Pickup Location : <span id="pickLoc-note"></span>
            <input type="text" id="pickLoc" name="pickLoc" class="textfield" required>
        </div>

        <div class="login-row">
            Drop-off Location : <span id="dropLoc-note"></span>
            <input type="text" id="dropLoc" name="dropLoc" class="textfield" required>
        </div>

        <div class="login-row">
            Vehicle Options : <span id="vehicleOpt-note">Scroll down the page to see options and prices.</span>
            <select name="vehicleOpt" class="textfield" required>
                <option value="">Select an option from the list</option>
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

        <div id="dateAndTime" class="login-row">
            <div>
                Date :
                <input id="dateInput" type="date" name="pickDate" class="textfield" required>
            </div>
            
            <div>
                Time :
                <input id="timeInput" type="time" name="pickTime" class="textfield" required>
            </div>
        </div>

        <div class="login-row">
            <input type="submit" name="bookCab" value="Book" class="login-submit">
        </div>
    </form>
</div>
<?php }?>


<!--------------------------------Javascript for ride booking--------------------------->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set minimum date to today
        const dateInput = document.getElementById('dateInput');
        const timeInput = document.getElementById('timeInput');
        const today = new Date().toISOString().split('T')[0];
        dateInput.setAttribute('min', today);

        // Function to update the minimum time based on the selected date
        dateInput.addEventListener('change', function() {
            const selectedDate = dateInput.value;
            const now = new Date();
            const todayDate = now.toISOString().split('T')[0];

            if (selectedDate === todayDate) {
                // Set minimum time to current time if today is selected
                const hours = now.getHours().toString().padStart(2, '0');
                const minutes = now.getMinutes().toString().padStart(2, '0');
                const currentTime = `${hours}:${minutes}`;
                timeInput.value = ''; // Clear the previous value
                timeInput.setAttribute('min', currentTime);
            } else {
                // Remove minimum time for future dates
                timeInput.removeAttribute('min');
            }
        });

        // Prevent selecting past times for today
        timeInput.addEventListener('input', function() {
            const selectedDate = dateInput.value;
            const now = new Date();
            const todayDate = now.toISOString().split('T')[0];

            if (selectedDate === todayDate) {
                const selectedTime = timeInput.value;
                const currentTime = `${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}`;

                if (selectedTime < currentTime) {
                    // If selected time is in the past, reset to the current time
                    timeInput.value = currentTime;
                }
            }
        });
    });
</script>

<script>
    function validateLocation(){
        var pickLoc = document.getElementById("pickLoc");
        var dropLoc = document.getElementById("dropLoc");

        var pickLoc_error = document.getElementById("pickLoc-note");
        var dropLoc_error = document.getElementById("dropLoc-note");

        // Initial Return value
        SignPass = true;

        /*----- Pick Location Validation------*/
        pickLoc_error.innerHTML = "";// Clear Previous messaegs
        if(pickLoc.value.match(/[!'@#$%^*?"{}|<>]/)){// Shouldn't contain special characters
            SignPass = false;
            pickLoc_error.innerHTML = "* Special characters are not allowed !";
        }

        /*----- Drop Location Validation------*/
        dropLoc_error.innerHTML = "";// Clear Previous messaegs
        if(dropLoc.value.match(/[!'@#$%^*?"{}|<>]/)){// Shouldn't contain special characters
            SignPass = false;
            dropLoc_error.innerHTML = "* Special characters are not allowed !";
        }

        // Returning value
        return SignPass;
    }
</script>


<!----------------------------------------------------Vehicles------------------------------------------->
<div class="wrapper">
    <div class="topic">Our options</div>
    <!----------------------------------------1st row------------------------------------------->
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

<div><!-----------------------------------------------PHP CODE TO BOOK RIDE ------------------------------------------->
    <?php
    #original code
    if(isset($_POST['bookCab'])){
        $cus_no = $_SESSION['user_no'];
        #echo "<script>alert('$cus_no')</script>";

        # Checking the customer has already booked
        $sql = "SELECT * FROM bookings WHERE no = $cus_no";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            $msg = "You have an existing ride booked. Please complete or cancel it to book again. !";
            echo
        "<script>
                alert('$msg');
                window.location.href = 'ride.php';
            </script>";
        }
        else{
            # Getting customer details from user table
            
            $sql = "SELECT * FROM `$tb_name` WHERE no = $cus_no";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $cus_name = $row['fname']." ".$row['lname'];
            $cus_tele = $row['tele'];

            $cus_pickLoc = $_POST['pickLoc'];
            $cus_dropLoc = $_POST['dropLoc'];
            $cus_vehicle = $_POST['vehicleOpt'];
            $cus_pickTime = $_POST['pickTime'];
            $cus_pickDate = $_POST['pickDate'];

            $sql = "INSERT INTO bookings(no, name, tele, vehicle, pickLoc, dropLoc, time, date, status) VALUES ($cus_no, '$cus_name', '$cus_tele', '$cus_vehicle', '$cus_pickLoc', '$cus_dropLoc', '$cus_pickTime', '$cus_pickDate', 'pending')";

            if(mysqli_query($conn, $sql)){
                $msg = 'Your ride has been booked !';
                echo "<script>
                        alert('$msg');
                        window.location.href = 'ride.php';
                    </script>";
            } else {
                $msg = 'Error while booking the ride !';
                echo "<script>
                        alert('$msg');
                    </script>";
            }
        }
    }
    ?>
</div>



<?php require_once('footer.php'); ?>
<script>
    function loadBookings() {
        var xhr = new XMLHttpRequest();  // Create a new AJAX request
        xhr.open('GET', 'fetch-rides.php', true);  // Request fetch-bookings.php

        xhr.onload = function() {
            if (xhr.status == 200) {
                // Update the booking table with the new content
                document.getElementById('ride-table-container').innerHTML = xhr.responseText;
            }
        };

        xhr.send();  // Send the request
    }

    // Call loadBookings every 100 mili seconds to refresh the bookings table
    setInterval(loadBookings, 1000);
</script>
</body>
</html>