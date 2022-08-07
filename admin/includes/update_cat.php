<form action="" method="POST">
    <div class="form-group">
        <label for="cat-title">Edit Category:</label>
        <?php
        
            if(isset($_GET['edit'])) {
                $edit_cat = $_GET['edit'];
                $query = "SELECT * FROM categories WHERE cat_id = {$edit_cat}";
                $select_cat_edit = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_cat_edit)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

        ?>
        <input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" class="form-control" type="text" name="cat_title" placeholder="Edit Category">
        <?php

                }
            }
        
        ?>

        <?php
        
            edit_cat($cat_id);
        
        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit" value="Edit Category">
    </div>
</form>