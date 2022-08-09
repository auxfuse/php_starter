<!DOCTYPE html>
<html lang="en">

    <?php include "includes/header.php"; ?>

    <body>

        <?php include "includes/nav.php"; ?>

        <!-- Page Content -->
        <div class="container margin-t-lg">
            <div class="row">
                <!-- Blog Entries Column -->
                <div class="col-md-8">
                    <?php

                        if(isset($_GET['p_id'])) {
                            $the_post_id = $_GET['p_id'];
                        }

                        $query = "SELECT * FROM posts WHERE post_id = $the_post_id";

                        $all_posts = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($all_posts)) {
                            $post_id = $row['post_id'];
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
                                <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
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

                <div class="col-md-4">
                    <!-- Comments Form -->
                    <?php
                    
                        if(isset($_POST['create_comment'])) {

                            $comment_post_id = $_GET['p_id'];
                            $comment_author = $_POST['comment_author'];
                            $comment_email = $_POST['comment_email'];
                            $comment_content = $_POST['comment_content'];

                            $query = "INSERT INTO comments (
                                comment_post_id,
                                comment_author,
                                comment_email,
                                comment_content,
                                comment_status,
                                comment_date
                            ) VALUES (
                                '{$comment_post_id}',
                                '{$comment_author}',
                                '{$comment_email}',
                                '{$comment_content}',
                                'Needs Approval',
                                now()
                            )";

                        }
                    
                    ?>
                    <div class="well">
                        <h4>Leave a Comment:</h4>
                        <form action="" method="post" role="form">

                            <div class="form-group">
                                <input type="text" class="form-control" name="comment_author" placeholder="Author">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="comment_email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="comment_content" placeholder="Comment"></textarea>
                            </div>

                            <button type="submit" name="create_comment" class="btn btn-primary">Comment</button>
                        </form>
                    </div>

                    <hr>

                    <!-- Posted Comments -->

                    <!-- Comment -->
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading">Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>

                    <!-- Comment -->
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading">Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            <!-- Nested Comment -->
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">Nested Start Bootstrap
                                        <small>August 25, 2014 at 9:30 PM</small>
                                    </h4>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </div>
                            </div>
                            <!-- End Nested Comment -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "includes/footer.php"; ?>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

</html>
