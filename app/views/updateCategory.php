<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Category</title>

  <link rel="stylesheet" href="../include/css/bootstrap-4.4.1.min.css">
</head>
<body>
  <div class="container">
    <h3> Update Category</h3>
    <hr>
    <?php
      if (isset($msg)) {
        echo "<span style='color:blue'>".$msg."</span>";
      }
    ?>
    <form action="http://localhost/mvc/CategoryController/updateCat" method="post">
      <?php 
      if (isset($catbyid)) {
        foreach ($catbyid as $value) {
      ?>
      <div class="form-group">
        <label> Category Name </label>
        <input type="text" name="name" class="form-control" value = "<?php echo $value['name']?>" > 
      </div>

      <input type="hidden" name="id" value="<?php echo $value['id']?>">
      <div class="form-group">
        <label> Category Title </label>
        <input type="text" name="title" class="form-control" value = "<?php echo $value['title']?>">
      </div>
      <button type="submit">Update</button>
      <?php } }?>
    </form>
  </div>

  <script src="../include/js/bootstrap-4.4.1.min.js"></script>
</body>
</html>