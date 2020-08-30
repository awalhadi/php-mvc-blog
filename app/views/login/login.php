<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/include/css/bootstrap-4.4.1.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/include/css/main.css">
</head>
<body>
  <div class="container">
      <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="login">
                Admin login
                <hr>
                <form action="<?php echo BASE_URL; ?>/LoginController/loginAuth" method="POST">
                    <div class="form-group">
                        <label for=""> User Name </label>
                        <input class="form-control" name="username" type="text" placeholder="Type your username" required>
                    </div>
                    <div class="form-group">
                        <label for=""> Password </label>
                        <input class="form-control" name="password" type="password" placeholder="Type your password" required>
                    </div>
                    <button class="btn btn-outline-success" type="submit">Login</button>
                </form>
                
                
            </div>
          </div>
          <div class="col-md-3"></div>
      </div>
    
  </div>

  <script src="<?php echo BASE_URL; ?>/include/js/bootstrap-4.4.1.min.js"></script>
</body>
</html>
