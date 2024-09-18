<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
require_once('php/nav-variables.php');
require_once('php/login.php');
require_once('php/connect.php');
$page = "admin";
require_once('header.php');

echo "<div class='nav-margin'></div>";

if (isset($_SESSION['user_role'])) {
    # Logged admins can access 'admin' page
    if ($_SESSION['user_role'] != 'admin') {
        echo "<center><h2>Oops!</h2><br/><h2>You don't have access to this page!</h2></center>";
    } else {
        echo "<h1 align='center'>Admin Page</h1>";

        $sql = "SELECT * FROM `$tb_name`";
        $result = mysqli_query($conn, $sql);

        if ($result) {
?>
            <table class="admin-table">
                <tbody>
                    <tr>
                        <td>No</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Gender</td>
                        <td>Phone</td>
                        <td>Address</td>
                        <td>E-mail 🔑</td>
                        <td>Role</td>
                        <td colspan="2">Modify</td>
                    </tr>

                    <?php while($row = mysqli_fetch_assoc($result)) {?>
                    <tr>
                        <td><?php echo $row['no']?></td>
                        <td><?php echo $row['fname']?></td>
                        <td><?php echo $row['lname']?></td>
                        <td><?php echo $row['gender']?></td>
                        <td><?php echo $row['tele']?></td>
                        <td><?php echo $row['address']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['role']?></td>

                        <?php echo "<td><a href='php/update.php?no=" . $row['no'] . "&email=" . urlencode($row['email']) . "'><img class='admin-table-icon' src='icons/edit.png'></a></td>"; ?>

                        <?php echo "<td><a href =php/delete.php?no='".$row['no']."'><img class='admin-table-icon' src = 'icons/delete.png'></a></td>" ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
<?php
        }
    }
} else {
    echo "<center><h2>Oops!</h2><br/><h2>Guests cannot access this page!</h2></center>";
}
?>

<?php require_once('footer.php'); ?>

</body>
</html>