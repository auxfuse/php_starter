<form action="" method="POST" enctype="multipart/form-data">

    <?php

        global $connection;

        if(isset($_POST['create_user'])) {
            $username = mysqli_real_escape_string($connection, $_POST['username']);
            $user_password = mysqli_real_escape_string($connection, $_POST['user_password']);
            $user_firstname = mysqli_real_escape_string($connection, $_POST['user_firstname']);
            $user_lastname = mysqli_real_escape_string($connection, $_POST['user_lastname']);
            $user_email = mysqli_real_escape_string($connection, $_POST['user_email']);

            $query = "INSERT INTO users(
                username,
                user_password,
                user_firstname,
                user_lastname,
                user_email,
                user_role
            )";

            $query .= "VALUES(
                '{$username}',
                '{$user_password}',
                '{$user_firstname}',
                '{$user_lastname}',
                '{$user_email}',
                'standard'
            )";

            $create_user = mysqli_query($connection, $query);
            header('Location: users.php');

            if(!$create_user) {
                die("QUERY FAIL" . mysqli_error($connection));
            }
        }

    ?>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="text" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Create User">
    </div>
</form>