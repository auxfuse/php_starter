<?php

    // del_row('posts', 'post_id', 'posts');

    // make user admin role
    if(isset($_GET['admin'])) {
        $the_user_id = $_GET['admin'];
        $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = {$the_user_id}";

        $admin_query = mysqli_query($connection, $query);
        header("Location: users.php");
    }

    // make user standard role
    if(isset($_GET['standard'])) {
        $the_user_id = $_GET['standard'];
        $query = "UPDATE users SET user_role = 'Standard' WHERE user_id = {$the_user_id}";

        $standard_query = mysqli_query($connection, $query);
        header("Location: users.php");
    }


    // delete comment
    if(isset($_GET['delete'])) {
        $the_user_id = $_GET['delete'];
        $query = "DELETE FROM users WHERE user_id = {$the_user_id}";

        $delete_query = mysqli_query($connection, $query);
        header("Location: users.php");
    }

?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>UserID</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th colspan="4" class="center-txt">👇 👇Actions👇 👇</th>
        </tr>
    </thead>
    <tbody>

        <?php
        
            while($row = mysqli_fetch_assoc($all_users)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_role= $row['user_role'];

                echo "<tr>";
                echo "<td>{$user_id}</td>";
                echo "<td>{$username}</td>";
                echo "<td>{$user_firstname}</td>";
                echo "<td>{$user_lastname}</td>";
                echo "<td>{$user_email}</td>";
                echo "<td>{$user_role}</td>";
                echo "<td class='center-txt'><a href='users.php?admin={$user_id}'>🧙‍♂️</a></td>";
                echo "<td class='center-txt'><a href='users.php?standard={$user_id}'>🧔</a></td>";
                echo "<td class='center-txt'><a href='users.php?source=edit_user&user_id={$user_id}'>📝</a></td>";
                echo "<td class='center-txt'><a href='users.php?delete={$user_id}'>❌</a></td>";
                echo "</tr>";
            }
        
        ?>
        
    </tbody>
</table>