<html>
    <body>
    <div class="navbar">
            <dl>
                <?php
                    require_once('php/nav-variables.php');

                    echo "<li>NexRide</li>";

                    if($page == "home")
                        echo "<li><a class='active' href='index.php'>Home</a></li>"; // Active Home tab
                    else
                        echo "<li><a href='index.php'>Home</a></li>";// Normal Home tab
                
                    # Only the logged users can book rides
                    
                    if(isset($_SESSION['user_role'])){
                        # Logged admins can access 'admin' page
                        if($_SESSION['user_role'] == 'admin'){
                            if($page == "admin")
                                echo "<li><a class='active' href='admin.php'>Admin</a></li>";
                            else
                                echo "<li><a href='admin.php'>Admin</a></li>";
                        }
                        # Logged customers can access 'ride' page
                        else if($_SESSION['user_role'] == 'customer'){
                            echo "<li><a href=''>Ride</a></li>";
                        }
                        # Guests can access 'driver' page
                        else if(empty($_SESSION['user_role'])){
                            echo "<li><a href=''>Driver</a></li>";
                        }
                    }

                    if($page == "about")
                        echo "<li><a class='active' href='about.php'>About</a></li>"; // Active About tab
                    else
                        echo "<li><a href='about.php'>About</a></li>"; // About tab

                    if($page == "help")
                        echo "<li><a class='active' href='help.php'>Help</a></li>"; // Active Help tab
                    else
                        echo "<li><a href='help.php'>Help</a></li>"; // Help tab

                    if($page == "features")
                        echo "<li><a class='active' href='features.php'>Features</a></li>";
                    else
                        echo "<li><a href='features.php'>Features</a></li>";

                    # Logged users can logout
                    if(!empty($_SESSION['user_fname'])){
                        echo "<li><a href='php/logout.php'>
                                <button class='logout-btn' type='button'>Logout</button>
                            </a></li>";
                    }
                ?>
                
            </dl>
        </div>
    </body>
</html>