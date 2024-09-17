<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
<body>

<?php 
require_once('php/nav-variables.php');
require_once('php/login.php');
$page = "admin";

require_once('header.php');

echo "<div class='nav-margin'></div>";

if(isset($_SESSION['user_role'])){
    # Logged admins can access 'admin' page
    if($_SESSION['user_role'] != 'admin')
        echo "<center><h2>Oops!</h2><br/><h2>You don't have access to this page !</h2></center>";
    else
        echo "<h1 align='center'>Admin Page</h1>";
}else
    echo "<center><h2>Oops!</h2><br/><h2>Guests cannot access this page !</h2></center>";
?>





<?php require_once('footer.php'); ?>

</body>
</html>