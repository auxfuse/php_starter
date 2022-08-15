<?php

    // del_post();

    // del_row('posts', 'post_id', 'posts');

    // approve/decline comments
    if(isset($_GET['approve'])) {
        $the_comment_id = $_GET['approve'];
        $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$the_comment_id}";

        $approve_query = mysqli_query($connection, $query);
        header("Location: comments.php");
    }

    if(isset($_GET['decline'])) {
        $the_comment_id = $_GET['decline'];
        $query = "UPDATE comments SET comment_status = 'Declined' WHERE comment_id = {$the_comment_id}";

        $decline_query = mysqli_query($connection, $query);
        header("Location: comments.php");
    }

    // delete comment
    if(isset($_GET['delete'])) {
        $the_comment_id = $_GET['delete'];
        $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";

        $delete_query = mysqli_query($connection, $query);
        header("Location: comments.php");
    }

?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Comment Id</th>
            <th>Post Title</th>
            <th>Author</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Date</th>
            <th colspan="3" class="center-txt">👇 👇Actions👇 👇</th>
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

                $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                $select_post_id_query = mysqli_query($connection, $query);

                echo "<tr>";
                echo "<td>{$comment_id}</td>";

                while($row = mysqli_fetch_assoc($select_post_id_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];

                    echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
                }
                
                echo "<td>{$comment_author}</td>";
                echo "<td>{$comment_email}</td>";
                echo "<td>{$comment_content}</td>";
                echo "<td>{$comment_status}</td>";
                echo "<td>{$comment_date}</td>";
                echo "<td class='center-txt'><a href='comments.php?approve={$comment_id}'>✅</a></td>";
                echo "<td class='center-txt'><a href='comments.php?decline={$comment_id}'>🚫</a></td>";
                echo "<td class='center-txt'><a href='comments.php?delete={$comment_id}'>❌</a></td>";
                echo "</tr>";
            }
        
        ?>
        
    </tbody>
</table>