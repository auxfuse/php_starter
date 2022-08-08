<?php

    // del_post();

    // del_row('posts', 'post_id', 'posts');

?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Post Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Content</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>

        <?php
        
            while($row = mysqli_fetch_assoc($all_comments)) {
                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_author = $row['comment_author'];
                $comment_email = $row['comment_email'];
                $comment_content = $row['comment_content'];
                $comment_status = $row['comment_status'];
                $comment_date = $row['comment_date'];

                echo "<tr>";
                echo "<td>{$comment_id}</td>";
                echo "<td>{$comment_post_id}</td>";
                echo "<td>{$comment_author}</td>";
                echo "<td>{$comment_email}</td>";
                echo "<td>{$comment_content}</td>";
                echo "<td>{$comment_status}</td>";
                echo "<td>{$comment_date}</td>";
                echo "<td><a href='comments.php?source=edit_comment&p_id={$comment_id}'>✅</a></td>";
                echo "<td><a href='comments.php?delete={$comment_id}'>🚫</a></td>";
                echo "<td><a href='comments.php?delete={$comment_id}'>❌</a></td>";
                echo "</tr>";
            }
        
        ?>
        
    </tbody>
</table>