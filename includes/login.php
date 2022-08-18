<?php

    ob_start();
    session_start();

    include "db.php";
    include "../admin/functions.php";

    global $connection;

    if(isset($_POST['login'])) {

        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        $query = "SELECT * FROM users WHERE username = '{$username}'";
        $select_user_query = mysqli_query($connection, $query);

        confirm_Query($select_user_query);

        while($row = mysqli_fetch_array($select_user_query)) {
            $db_user_id = $row['user_id'];
            $db_username = $row['username'];
            $db_user_password = $row['user_password'];
            $db_firstname = $row['user_firstname'];
            $db_lastname = $row['user_lastname'];
            $db_role = $row['user_role'];
        }

        if($username === $db_username && $password === $db_user_password) {

            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_firstname;
            $_SESSION['lastname'] = $db_lastname;
            $_SESSION['role'] = $db_role;

            header("Location: ../admin");

        } else {

            $_SESSION['login_error'] = 'login error!';
            header("Location: ../index.php");

        }

    }

?>