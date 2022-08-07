<?php

    include "includes/db.php";

?>

<!-- Page Content -->
<div class="container margin-t-lg">

<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
    <?php

        if(isset($_POST['search'])) {

            $search = $_POST['search'];

            $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";

            $results = mysqli_query($connection, $query);

            if(!$results) {

                die("QUERY Failed" . mysqli_error($connection));

            };

            $count = mysqli_num_rows($results);

            if($count == 0) {

                echo "<h1>No results for '$search'</h1>";

            } else {

                $post_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($post_query)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
            ?>
                <h1 class="page-header">
                    Page Heading <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a>
                </p>
                <p>
                    <span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?>
                </p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="blog image">
                <hr>
                <p>
                    <?php echo $post_content; ?>
                </p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
    <?php
                } 
            } 
        }
    ?>
    </div>

<?php

    include "includes/sidebar.php";

?>

</div>
<!-- /.row -->

<hr>

</div>
<!-- /.container -->