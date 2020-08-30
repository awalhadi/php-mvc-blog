<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../include/css/bootstrap-4.4.1.min.css">
</head>
<body>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h3> Category Id </h3>
    <hr>
    <?php

      foreach ($catbyid as $key => $value) {
        echo $value['name'] . "<br/>";
      }
    ?>
    
  </div>
</div>
<script src="../include/js/bootstrap-4.4.1.min.js"></script>
</body>
</html>