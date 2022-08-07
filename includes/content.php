<?php

    include "includes/db.php";

?>

<!-- Page Content -->
<div class="container margin-t-lg">

<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
        <?php
            $query = "SELECT * FROM posts";

            $all_posts = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($all_posts)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'], 0, 50);
        ?>
                <h1 class="page-header">
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h1>

                <!-- First Blog Post -->
                <?php
                
                    $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                    $category_id = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($category_id)) {
                        $cat_title = $row['cat_title'];
                    }

                ?>
                <h2>
                    Category: <?php echo $cat_title; ?>
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
        <?php } ?>
    </div>

<?php

    include "includes/sidebar.php";

?>

</div>
<!-- /.row -->

<hr>

</div>
<!-- /.container -->