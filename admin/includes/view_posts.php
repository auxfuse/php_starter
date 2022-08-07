<?php

    // del_post();

    del_row('posts', 'post_id', 'posts');

?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Cat Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Image</th>
            <th>Content</th>
            <th>Tags</th>
            <th>Comment #</th>
            <th>Status</th>
            <th>User</th>
            <th>Views</th>
        </tr>
    </thead>
    <tbody>

        <?php
        
            while($row = mysqli_fetch_assoc($all_posts)) {
                $post_id = $row['post_id'];
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_status = $row['post_status'];
                $post_user = $row['post_user'];
                $post_views_count = $row['post_user'];

                echo "<tr>";
                echo "<td>{$post_id}</td>";
                $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                $select_categories_id = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_categories_id)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    echo "<td>{$cat_title}</td>";
                }
                
                echo "<td>{$post_title}</td>";
                echo "<td>{$post_author}</td>";
                echo "<td>{$post_date}</td>";
                echo "<td><img width='100' src='../images/$post_image' alt='{$post_image}' /></td>";
                echo "<td>{$post_content}</td>";
                echo "<td>{$post_tags}</td>";
                echo "<td>{$post_comment_count}</td>";
                echo "<td>{$post_status}</td>";
                echo "<td>{$post_user}</td>";
                echo "<td>{$post_views_count}</td>";
                echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>E</a></td>";
                echo "<td><a href='posts.php?delete={$post_id}'>X</a></td>";
                echo "</tr>";
            }
        
        ?>
        
    </tbody>
</table>