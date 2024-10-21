<?php
require_once('php/connect.php');
require_once('php/login.php');
$driver_no = $_SESSION['user_no'];
$plate = $_SESSION['plate'];
$vehicle = $_SESSION['vehicle'];

# Checking the rides that this particular driver CONFIRMED.
$sql = "SELECT * FROM bookings WHERE driver_no = $driver_no";
$result = mysqli_query($conn, $sql);

# If there were no rides that this driver CONFIRMED, Then only they should see PENDING rides
if(mysqli_num_rows($result) == 0){
    $sql = "SELECT * FROM bookings WHERE driver_no = 0 AND vehicle = '$vehicle'";
    $result = mysqli_query($conn, $sql);
}

if($result && mysqli_num_rows($result) > 0) {
    echo "
        <table class='admin-table'>
            <tbody>
                <tr>
                    <td>No</td>
                    <td>Name</td>
                    <td>Phone</td>
                    <td>Vehicle</td>
                    <td>Pickup Location</td>
                    <td>Drop-off Location</td>
                    <td>Time</td>
                    <td>Date</td>
                    <td>Status</td>
                    <td>Actions</td>
                </tr>";
    
    while($row = mysqli_fetch_assoc($result)) {
        echo '
                <tr>
                    <td>' . $row['no'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['tele'] . '</td>
                    <td>' . $row['vehicle'] . '</td>
                    <td>' . $row['pickLoc'] . '</td>
                    <td>' . $row['dropLoc'] . '</td>
                    <td>' . $row['time'] . '</td>
                    <td>' . $row['date'] . '</td>
                    <td>' . $row['status'] . '</td>';

                    if($row['status'] == 'pending')
                        echo '<td><a href="booking-update.php?no=' . $row['no'] . '"><button type="button" class="logout-btn" style="width:100%; min-width:100px;">Confirm</button></a></td>';

                    else if($row['status'] == 'confirmed')
                        echo '<td><a href="booking-update.php?no=' . $row['no'] . '"><button type="button" class="logout-btn" style="width:100%; min-width:100px;">Picked Up</button></a></td>';

                    else if($row['status'] == 'picked')
                        echo '<td><a href="php/delete.php?no=' . $row['no'] . '"><button type="button" class="logout-btn" style="width:100%; min-width:100px;">Dropped</button></a></td>';
        echo '</tr>';
    }

    echo '</tbody></table>';
} else {
    echo '<div style="color: #888; padding-top:100px;" class="topic">No ride bookings available at this time.</div>';
}
?>
