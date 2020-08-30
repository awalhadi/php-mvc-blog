<h3> Edit User</h3>
    <hr>
    
<?php 
  foreach ($userbyid as $user) {
?>
    <div class="data_table p-4 m-4">
      <form action="<?php echo BASE_URL; ?>/UserController/update_user" method="post">

          <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

          <div class="form-group">
            <label> Full Name </label>
            <input type="text" name="name" class="form-control" value="<?php echo $user['name']; ?>" required>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label> UserName </label>
                <input type="text" name="username" class="form-control" value="<?php echo $user['username']; ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label> Email </label>
                <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>" required>
              </div>
            </div>
          </div>
            
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label> Password </label>
                <input type="password" name="password" class="form-control" value="<?php echo $user['password']; ?>" required>
              </div>

            </div>
            <div class="col-md-6">
              <?php if(Session::get('role') == 1){ ?>
              <div class="form-group">
                <label for="my-select">Select User Role</label>
                <select id="my-select" class="custom-select" name="role">
                  <option value="1" <?php if($user['role'] == 1){echo "selected";} ?>> Admin </option>
                  <option value="2" <?php if($user['role'] == 2){echo "selected";} ?>> Author </option>
                  <option value="3" <?php if($user['role'] == 3){echo "selected";} ?>> Modarator </option>
                  <option value="4" <?php if($user['role'] == 4){echo "selected";} ?>> Editor </option>
                </select>
              </div>
              <?php }?>

            </div>
          </div>
        <button type="submit">Update User</button>
      </form>
    </div>
<?php }?>