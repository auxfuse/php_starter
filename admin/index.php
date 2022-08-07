<?php

    ob_start();

?>

<?php

    include "includes/db.php";

?>

<?php

    if($connection) {
        echo "success";
    };

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
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
