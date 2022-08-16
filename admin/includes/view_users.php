<?php

    // del_post();

    // del_row('posts', 'post_id', 'posts');

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
            <th colspan="3" class="center-txt">👇 👇Actions👇 👇</th>
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
                echo "</tr>";
            }
        
        ?>
        
    </tbody>
</table>