<html>
    <head>
        <link rel="stylesheet" href="../style.css">
    </head>
</html>
<?php
require_once('nav-variables.php');
require_once('login.php');
require_once('connect.php');
$page = "admin";
require_once('../header.php');

echo "<div class='nav-margin'></div>";

if (isset($_SESSION['user_role'])) {

#---------------------------------------------Admins can delete any record from the admin table ---------------------------------------

        if($_SESSION['user_role'] == 'admin'){
            if(isset($_GET['no'])){
                $sql = "DELETE FROM `" . $tb_name . "` WHERE `" . $tb_no . "` = " . $_GET['no'];
                $result = mysqli_query($conn, $sql);
    
                if(!$result){
                    echo "failed !";
                }
                header("Location: ../admin.php");
            }
        }
#---------------------------------------------------------------------------------------------------------------------------------------------
        else if($_SESSION['user_role'] == 'driver'){
            if(isset($_GET['no'])){
                $sql = "DELETE FROM bookings WHERE no = ".$_GET['no'];
                $result = mysqli_query($conn, $sql);
    
                if(!$result){
                    echo "failed !";
                }
                header("Location: ../driver.php");
            }
        }
        else{
            echo "<center><h2>Oops!</h2><br/><h2>You don't have access to this page!</h2></center>";
        }
     ?>

        


<?php } else {
    echo "<center><h2>Oops!</h2><br/><h2>Guests cannot access this page!</h2></center>";
}
?>

<?php require_once('../footer.php'); ?>

