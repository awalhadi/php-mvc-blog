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
    <h3> Add Category</h3>
    <hr>
    <?php
      if (isset($msg)) {
        echo "<span style='color:blue'>".$msg."</span>";
      }
    ?>
    <form action="http://localhost/mvc/CategoryController/insertCategory" method="post">

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

  <script src="../include/js/bootstrap-4.4.1.min.js"></script>
</body>
</html>