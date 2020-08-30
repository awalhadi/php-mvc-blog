<h3> Edit Category</h3>
    <hr>
    <div class="data_table p-4 m-4">
        <?php
        foreach($category as $key => $value){
        ?>
            <form action="<?php echo BASE_URL; ?>/AdminController/update_cat" method="post">
        
                <div class="form-group">
                    <label> Category Name </label>
                    <input type="text" name="name" class="form-control" value="<?php echo $value['name'];?>" required>
                </div>
                <input type="hidden" name="id" value="<?php echo $value['id'];?>">

                <div class="form-group">
                    <label> Category Title </label>
                    <input type="text" name="title" class="form-control" value="<?php echo $value['title'];?>" required>
                </div>

                <button type="submit">Update</button>
            </form>
        <?php }?>
    </div>
