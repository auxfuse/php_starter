<?php

    ob_start();

?>

<?php

    include "includes/db.php";
    include "functions.php"

?>

<?php

    $query = "SELECT * FROM users";
    $all_users = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">

<?php

    include "includes/head.php";

?>

<body>

    <div id="wrapper">
        <?php
        
            include "includes/nav.php";
        
        ?>

        <?php
        
            include "includes/main.php";  
        
        ?>

        <div class="container-fluid" id="posts-container">
            <div class="row">
                <div class="col-lg-12">
                    <?php

                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = "";
                        }

                        switch($source) {
                            case 'add_user':
                                include "includes/add_user.php";
                                break;
                            case 'edit_user':
                                include "includes/edit_user.php";
                                break;
                            default:
                                include "includes/view_users.php";
                        }
                    
                    ?>
                </div> 
            </div>
        </div>
        
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
