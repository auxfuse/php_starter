<?php include "db.php"; ?>

<?php

    $query = "SELECT * FROM categories";
    $all_cat = mysqli_query($connection, $query);

?>


<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <div class="well">
        <h4>Login</h4>
        <?php

            if(isset($_SESSION['logout'])) {
                echo "
                    <div class='alert alert-success alert-dismissible' role='alert'>
                        Logged Out
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close' name='close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                ";
            }
        
            if(isset($_SESSION['login_error'])) {
                echo "
                    <div class='alert alert-danger alert-dismissible' role='alert'>
                        {$_SESSION['login_error']}
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close' name='close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                ";
            }
        
        ?>
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="login" value="Login">
            </div>
        </form>
    </div>

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search-results.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
        </form>
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-12">
                <ul class="list-unstyled">
                    <?php
                    
                        while($row = mysqli_fetch_assoc($all_cat)) {
                            $cat_title = $row['cat_title'];
                            $cat_id = $row['cat_id'];

                            echo "<li><a href='category.php?category=$cat_id'>$cat_title</a></li>";
                        };
                    
                    ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <?php
    
        include "includes/widget.php";
    
    ?>

</div>