<html>
    <body>
    <div class="navbar">
            <dl>
                <?php
                    require_once('php/nav-variables.php');

                    echo "<li>NexRide</li>";
#--------------------------------------------------------To Home Page ---------------------------------------
                    $link1 = "index.php";
                    $link2 = "../index.php";

                    if (file_exists($link1)) {
                        $final_link = $link1; // Use first link if it exists
                    } else {
                        $final_link = $link2; // Use second link if the first does not exist
                    }
                    
                    if($page == "home")
                        echo "<li><a class='active' href='$final_link'>Home</a></li>"; // Active Home tab
                    else
                        echo "<li><a href='$final_link'>Home</a></li>";// Normal Home tab
                
                    # Only the logged users can book rides
                    
                    if(isset($_SESSION['user_role'])){
                        # Logged admins can access 'admin' page
                        # navigation bar will open either inside php folder or out

#--------------------------------------------------------To Admin Page ---------------------------------------
                        $link1 = "admin.php";
                        $link2 = "../admin.php";

                        if (file_exists($link1)) {
                            $final_link = $link1; // Use first link if it exists
                        } else {
                            $final_link = $link2; // Use second link if the first does not exist
                        }

                        if($_SESSION['user_role'] == 'admin'){
                            if($page == "admin")
                                echo "<li><a class='active' href='$final_link'>Admin</a></li>";
                            else
                                echo "<li><a href='$final_link'>Admin</a></li>";
                        }
                        # Logged customers can access 'ride' page
                        else if($_SESSION['user_role'] == 'customer'){
                            echo "<li><a href=''>Ride</a></li>";
                        }
                    }
                    /* Guests can access 'driver' page
                    if(empty($_SESSION['user_role'])){
                        echo "<li><a href=''>Driver</a></li>";
                    }*/


#--------------------------------------------------------To About Page ---------------------------------------
                    $link1 = "about.php";
                    $link2 = "../about.php";

                    if (file_exists($link1)) {
                        $final_link = $link1; // Use first link if it exists
                    } else {
                        $final_link = $link2; // Use second link if the first does not exist
                    }
                    if($page == "about")
                        echo "<li><a class='active' href='$final_link'>About</a></li>"; // Active About tab
                    else
                        echo "<li><a href='$final_link'>About</a></li>"; // About tab
                    

#--------------------------------------------------------To Help Page ---------------------------------------
                    $link1 = "help.php";
                    $link2 = "../help.php";

                    if (file_exists($link1)) {
                        $final_link = $link1; // Use first link if it exists
                    } else {
                        $final_link = $link2; // Use second link if the first does not exist
                    }

                    if($page == "help")
                        echo "<li><a class='active' href='$final_link'>Help</a></li>"; // Active Help tab
                    else
                        echo "<li><a href='$final_link'>Help</a></li>"; // Help tab

#--------------------------------------------------------To Features Page --------------------------------------- 
                    $link1 = "features.php";
                    $link2 = "../features.php";

                    if (file_exists($link1)) {
                        $final_link = $link1; // Use first link if it exists
                    } else {
                        $final_link = $link2; // Use second link if the first does not exist
                    }

                    if($page == "features")
                        echo "<li><a class='active' href='$final_link'>Features</a></li>";
                    else
                        echo "<li><a href='$final_link'>Features</a></li>";

#--------------------------------------------------------Logout ---------------------------------------
                    $link1 = "logout.php";
                    $link2 = "php/logout.php";

                    if (file_exists($link1)) {
                        $final_link = $link1; // Use first link if it exists
                    } else {
                        $final_link = $link2; // Use second link if the first does not exist
                    }
                    # Logged users can logout
                    if(!empty($_SESSION['user_fname'])){
                        echo "<li><a href='$final_link'>
                                <button class='logout-btn' type='button'>Logout</button>
                            </a></li>";
                    }
                ?>
                
            </dl>
        </div>
    </body>
</html>