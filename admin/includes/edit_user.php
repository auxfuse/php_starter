<?php

    global $connection;

    if(isset($_GET['user_id'])) {
        $the_user_id = $_GET['user_id'];
    }

    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
    $select_user_by_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_user_by_id)) {

        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];

    }

    if(isset($_POST['update_user'])) {

        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $user_password = mysqli_real_escape_string($connection, $_POST['user_password']);
        $user_firstname = mysqli_real_escape_string($connection, $_POST['user_firstname']);
        $user_lastname = mysqli_real_escape_string($connection, $_POST['user_lastname']);
        $user_email = mysqli_real_escape_string($connection, $_POST['user_email']);
        $user_role = mysqli_real_escape_string($connection, $_POST['user_role']);

        $query = "UPDATE users SET 
        username = '$username', 
        user_password = '$user_password',
        user_firstname = '$user_firstname',
        user_lastname = '$user_lastname',
        user_email = '$user_email',
        user_role = '$user_role' 
        WHERE user_id = {$the_user_id}";

        $update_user = mysqli_query($connection, $query);
        header('Location: users.php');

        confirm_Query($update_user);
        
    }

?>

<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="username">Username</label>
        <input value="<?php echo $username ?>" type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input value="<?php echo $user_password ?>" type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input value="<?php echo $user_firstname ?>" type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input value="<?php echo $user_lastname ?>" type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input value="<?php echo $user_email ?>" type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_role">Role</label>
        <input value="<?php echo $user_role ?>" type="text" class="form-control" name="user_role">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_user" value="Update User">
    </div>

</form>
