<?php

    function insert_cat() {

        global $connection;

        if(isset($_POST['submit'])) {

            $cat_title = $_POST['cat-title'];

            if($cat_title == "" || empty($cat_title)) {
                echo "Can't be empty";
            } else {
                $add = "INSERT INTO categories(cat_title)";
                $add .= "VALUE('{$cat_title}')";

                $create_cat = mysqli_query($connection, $add);

                if(!$create_cat) {
                    die("Add Failed" . mysqli_error($connection));
                }

                echo "<h1>Category Added</h1>";
                header("Refresh:0");
            }

        }
    }

    function find_cat($all_cat) {

        global $connection;

        while($row = mysqli_fetch_assoc($all_cat)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            echo "<tr>";
            echo "<th>$cat_id</th>";
            echo "<th>$cat_title</th>";
            echo "<th><a href='categories.php?delete={$cat_id}'>x</a></th>";
            echo "<th><a href='categories.php?edit={$cat_id}'>E</a></th>";
            echo "</tr>";
        };
    }

    function edit_cat($cat_id) {

        global $connection;

        if(isset($_POST['edit'])) {
            $cat_title = $_POST['cat_title'];
            $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id}";
            $update_query = mysqli_query($connection, $query);

            if(!$update_query) {
                die("QUERY FAIL" . mysqli_error($connection));
            } else {
                header("Refresh:0");
            }
        }
    }

    function del_cat() {

        global $connection;

        if(isset($_GET['delete'])) {
            $del_cat = $_GET['delete'];
            $query = "DELETE FROM categories WHERE cat_id = {$del_cat}";

            $del_query = mysqli_query($connection, $query);
            header("Location: categories.php");
        }
    }

    function del_post() {
        global $connection;

        if(isset($_GET['delete'])) {
            $del_post = $_GET['delete'];
            $query = "DELETE FROM posts WHERE post_id = {$del_post}";

            $del_query = mysqli_query($connection, $query);
            header("Location: posts.php");
        }
    }

    function del_row($table, $field, $page) {
        global $connection;

        if(isset($_GET['delete'])) {
            $del_id = $_GET['delete'];
            $query = "DELETE FROM {$table} WHERE {$field} = {$del_id}";

            $del_query = mysqli_query($connection, $query);
            header("Location: {$page}.php");
        }
    }

    function confirm_Query($result) {
        global $connection;

        if(!$result) {
            die("QUERY FAILED " . mysqli_error($connection));
        }
    }

?>