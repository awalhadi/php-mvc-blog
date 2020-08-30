<h3> Add Category</h3>
    <hr>
    
    <?php
    //  if (isset($msg)) {
    //     echo "<span style='color:blue'>".$msg."</span>";
    // }
    ?>
    <div class="data_table p-4 m-4">
      <form action="<?php echo BASE_URL; ?>/AdminController/store_cat" method="post">
  
        <div class="form-group">
          <label> Category Name </label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label> Category Title </label>
          <input type="text" name="title" class="form-control" required>
        </div>
        <button type="submit">submit</button>
      </form>
    </div>
