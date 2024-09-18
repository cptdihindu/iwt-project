<html>
    <head>
        <link rel="stylesheet" href="../style.css">
    </head>
</html>
<body>
<?php

require_once('nav-variables.php');
require_once('login.php');
require_once('connect.php');
$page = "admin";

require_once('../header.php');

echo "<div class='nav-margin'></div>";
$old_email = $_GET['email'];

if(isset($_POST['update-btn'])){
    $up_no = $_POST['no'];
    $up_fname = $_POST['fname'];
    $up_lname = $_POST['lname'];
    $up_gender = $_POST['gender'];
    $up_tele = $_POST['tele'];
    $up_address = $_POST['address'];

    $up_email = $_POST['email'];
    $up_role = $_POST['role'];

    $current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . "?no=" . urlencode($up_no) . "&email=" . urlencode($old_email);

    #if old email and new email are different
    if($old_email != $up_email){
        $sql = "SELECT * FROM `$tb_name` WHERE `$tb_email` = '$up_email'";
        $result = mysqli_query($conn, $sql);

        if($result){
            if(mysqli_num_rows($result) > 0){# E-mail already found
                $msg = "This email is taken. Use a different one !";
                echo
                "<script>
                    alert('$msg');
                    window.location.href = '$current_url';
                </script>";
            }
            else{# E-mail not found
                $msg = "Changes Saved !";
                echo
                "<script>
                    alert('$msg');
                    window.location.href = '../admin.php';
                </script>";
            }
        }
    # if old and new emaols are same
    }else{
        // Updating Data
        $sql = "UPDATE `$tb_name` SET `$tb_fname`='$up_fname', `$tb_lname`='$up_lname', `$tb_gender`='$up_gender', `$tb_tele`='$up_tele', `$tb_adrs`='$up_address', `$tb_email`='$up_email', `$tb_role`='$up_role' WHERE `$tb_no`='$up_no'";
        
        $result = mysqli_query($conn, $sql);

        if($result){
            $msg = "Changes Saved !";
            echo
            "<script>
                alert('$msg');
                window.location.href = '../admin.php';
            </script>";
        }
    }
    
}
if (isset($_SESSION['user_role'])) {
    # Logged admins can access 'admin' page
    if ($_SESSION['user_role'] != 'admin') {
        echo "<center><h2>Oops!</h2><br/><h2>You don't have access to this page!</h2></center>";
    } else {
        /*echo "<h1 align='center'>Update Page</h1>";*/

        if(isset($_GET['no'])){
            $sql = "SELECT * FROM `$tb_name` WHERE `$tb_no` = ".$_GET['no'];
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            if($result){
                ?>
                <div class="update-form-wrapper">
        <?php echo "<form class='update-form'  method='post'>" ?>
                        <div class="update-form-row"><div>No :</div>
                            <div>
                                <?php echo "<input class='textfield' type='text' name='no' value='".$row['no']."' required readonly>"; ?>
                            </div>
                        </div>

                        <div class="update-form-row"><div>First Name :</div>
                            <?php echo "<input class='textfield' type='text' name='fname' value='".$row['fname']."' required>"; ?>
                        </div>

                        <div class="update-form-row"><div>Last Name :</div>
                            <?php echo "<input class='textfield' type='text' name='lname' value='".$row['lname']."' required>"; ?>
                        </div>

                        <div class="update-form-row"><div>Gender :</div>
                            <div class="gender-field">
                                <input type='radio' name='gender' value='m' <?php if($row['gender'] == 'm') echo 'checked'?> required> Male &nbsp;&nbsp;
                                <input type='radio' name='gender' value='f' <?php if($row['gender'] == 'f') echo 'checked'?> required> Female
                            </div>                        
                        </div>

                        <div class="update-form-row"><div>Phone :</div>
                            <?php echo "<input class='textfield' type='text' name='tele' value='".$row['tele']."' required>"; ?>
                        </div>

                        <div class="update-form-row"><div>Address :</div>
                            <?php echo "<input class='textfield' type='text' name='address' value='".$row['address']."' required>"; ?>
                        </div>

                        <div class="update-form-row"><div>E-mail :</div>
                            <?php echo "<input class='textfield' type='text' name='email' value='".$row['email']."' required>"; ?>
                        </div>

                        <div class="update-form-row"><div>Role :</div>
                            <?php echo "<input class='textfield' type='text' name='role' value='".$row['role']."' required>"; ?>
                        </div>
                        <div class="update-form-row">
                            <input name="update-btn" class="login-submit" type="submit" value="Update">
                        </div>
                    </form> 
                </div>

<?php       }else
                echo "failed !";
        }
   

   }

     } else {
    echo "<center><h2>Oops!</h2><br/><h2>Guests cannot access this page!</h2></center>";
}

?>

<?php require_once('../footer.php'); ?>
</body>

