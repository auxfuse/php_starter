<?php

    ob_start();

?>

<?php

    include "includes/db.php";
    include "functions.php"

?>

<?php

    $query = "SELECT * FROM categories";
    $all_cat = mysqli_query($connection, $query);

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

        <div class="container" id="cat-container">
            <div class="row">
                <div class="col-xs-6">
                    <?php
                            
                        insert_cat();
                    
                    ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="cat-title">Add Category:</label>
                            <input class="form-control" type="text" name="cat-title" placeholder="Add Category">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </div>
                    </form>

                    <?php
                    
                        if(isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];

                            include "includes/update_cat.php";
                        }
                    
                    ?>

                </div> 
                
                <div class="col-xs-6">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    
                                find_cat($all_cat);
                            
                            ?>

                            <?php
                            
                                del_cat();
                            
                            ?>
                        </tbody>
                    </table>
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
