<?php

    ob_start();

?>

<?php

    include "includes/db.php";
    include "functions.php"

?>

<?php

    $query = "SELECT * FROM comments";
    $all_comments = mysqli_query($connection, $query);

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
                            case 'add_post':
                                include "includes/add_post.php";
                                break;
                            case 'edit_post':
                                include "includes/edit_post.php";
                                break;
                            default:
                                include "includes/view_comments.php";
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
