<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Nexride Ride</title>
</head>
<body>

<?php
require_once('php/login.php');
require_once('php/connect.php');
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

#--------------------------------------------------------DELETE RIDE--------------------------------------------------------------
if(isset($_GET['no'])){
    $sql = "DELETE FROM bookings WHERE no = ".$_GET['no'];
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "failed !";
    }
    header("Location: ride.php");
}

?>

</body>
</html>