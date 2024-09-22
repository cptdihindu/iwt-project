<html>
    <head>
        <link rel="stylesheet" href="../style.css">
    </head>
</html>
<body>

<?php
require_once('php/login.php');
require_once('php/connect.php');
$driver_no = $_SESSION['user_no'];
$cus_no = $_GET['no'];

$sql = "SELECT status FROM bookings WHERE no = $cus_no";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if($result && mysqli_num_rows($result) > 0){
    $status = $row['status'];
    
    if($status == 'pending'){
        $status = 'confirmed';
        $sql = "UPDATE bookings SET driver_no = $driver_no WHERE no = $cus_no";
        $result = mysqli_query($conn, $sql);
    }
    else if($status == 'confirmed')
        $status = 'picked';


    $sql = "UPDATE bookings SET status = '$status' WHERE no = $cus_no";
    $result = mysqli_query($conn, $sql);
    header("Location: driver.php");
}
?>

</body>