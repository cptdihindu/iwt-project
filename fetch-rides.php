<?php
require_once('php/connect.php');
require_once('php/login.php');

if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'customer') {
    $cus_no = $_SESSION['user_no'];
    $sql = "SELECT * FROM bookings WHERE no = $cus_no";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="topic">Active Rides</div>
        <div class="active-ride-table-holder">
            <table class="active-ride-table">
                <tbody>
                    <tr>
                        <td>Pickup Date</td>
                        <td>Pickup Time</td>
                        <td>Vehicle</td>
                        <?php if($row['status'] != 'pending') echo "<td>Plate No</td>"?>
                        <td>Pickup Location</td>
                        <td>Drop Location</td>
                        <td>Status</td>
                        <td>Actions</td>
                    </tr>

                    <tr>
                        <td><?php echo $row['date'] ?></td>
                        <td><?php echo $row['time'] ?></td>
                        <td><?php echo $row['vehicle'] ?></td>
                        <?php if($row['status'] != 'pending') echo "<td>".$row['plate']."</td>"?>
                        <td><?php echo $row['pickLoc'] ?></td>
                        <td><?php echo $row['dropLoc'] ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td><a href="ride-cancel.php?no=<?php echo $cus_no ?>"><img class="admin-table-icon" src="icons/delete.png"></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="content">You have an existing ride booked. Complete or cancel it to book again.</div>
        <?php
    }
} else {
    echo "<center><h2>Oops!</h2><br/><h2>You cannot access this page!</h2></center>";
}
?>
