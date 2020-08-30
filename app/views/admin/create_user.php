<h3> Add New User</h3>
    <hr>
    

    <div class="data_table p-4 m-4">
      <form action="<?php echo BASE_URL; ?>/UserController/store_user" method="post">
        
          <div class="form-group">
            <label> Full Name </label>
            <input type="text" name="name" class="form-control" required>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label> UserName </label>
                <input type="text" name="username" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label> Email </label>
                <input type="email" name="email" class="form-control" required>
              </div>
            </div>
          </div>
            
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label> Password </label>
                <input type="text" name="password" class="form-control" required>
              </div>

            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="my-select">Select User Role</label>
                <select id="my-select" class="custom-select" name="role">
                  <option value="2"> Author </option>
                  <option value="3"> Modarator </option>
                  <option value="4"> Editor </option>
                </select>
              </div>

            </div>
          </div>
          
        <button type="submit">create user</button>
      </form>
    </div>
        

        
