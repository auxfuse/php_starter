<form action="" method="POST" enctype="multipart/form-data">

    <?php

        global $connection;

        if(isset($_POST['create_post'])) {
            $post_title = mysqli_real_escape_string($connection, $_POST['title']);
            $post_author = mysqli_real_escape_string($connection, $_POST['post_author']);
            $post_category_id = mysqli_real_escape_string($connection, $_POST['post_category']);
            $post_status = mysqli_real_escape_string($connection, $_POST['post_status']);

            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];

            $post_tags = mysqli_real_escape_string($connection, $_POST['post_tags']);
            $post_content = mysqli_real_escape_string($connection, $_POST['post_content']);
            $post_date = date('d-m-y');
            $post_comment_count = 1;

            move_uploaded_file($post_image_temp, "../images/$post_image");

            $query = "INSERT INTO posts(
                post_title,
                post_author,
                post_category_id,
                post_status,
                post_image,
                post_tags,
                post_content,
                post_date,
                post_comment_count
            )";

            $query .= "VALUES(
                '{$post_title}',
                '{$post_author}',
                {$post_category_id},
                '{$post_status}',
                '{$post_image}',
                '{$post_tags}',
                '{$post_content}',
                now(),
                {$post_comment_count}
            )";

            $create_post = mysqli_query($connection, $query);
            header('Location: posts.php');

            if(!$create_post) {
                die("QUERY FAIL" . mysqli_error($connection));
            }
        }

    ?>

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="post_category">Post Category ID</label>
        <select class="form-control" name="post_category" id="post_category">
            <?php
            
                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection, $query);

                confirm_Query($select_categories);

                while($row = mysqli_fetch_assoc($select_categories)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
            
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>
</form>