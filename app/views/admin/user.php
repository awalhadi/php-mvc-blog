
<!-- end Notification message -->

<h3> User List</h3>
    <hr>

    <div class="data_table">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Serial No.</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php if(Session::get('role') == 1){ ?>
        <tbody>
            <?php 
              
              $i = 0;
              foreach($user_list as $user){
                  $i = $i + 1;
            ?>
              <tr>
              <td><?php echo $i."."; ?></td>
              <td><?php echo $user['name']; ?></td>
              <td><?php echo $user['email']; ?></td>
              <td>
                <?php  
                  switch ($user['role']) {
                    case '1':
                      echo "admin";
                      break;
                    case '2':
                      echo "author";
                      break;
                    case '3':
                      echo "modarator";
                      break;
                  }
                ?>
              </td>
              
              <td>
                <a href="<?php echo BASE_URL; ?>/UserController/edit_user/<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-primary edit_btn">Edit</a> 

                <a class="delete btn btn-sm btn-outline-danger" data-url="<?php echo BASE_URL; ?>/UserController/delete_user/<?php echo $user['id']; ?>">Delete</a></td>
              </tr>
          <?php }?>

        </tbody>
      <?php }else{ ?>
        <tbody>
            <?php 
              
              $i = 0;
              foreach($user_list as $user){
                  $i = $i + 1;
                  if(Session::get('role') == $user['role']){
            ?>
              <tr>
              <td><?php echo $i."."; ?></td>
              <td><?php echo $user['name']; ?></td>
              <td><?php echo $user['email']; ?></td>
              <td>
                <?php  
                  switch ($user['role']) {
                    case '1':
                      echo "admin";
                      break;
                    case '2':
                      echo "author";
                      break;
                    case '3':
                      echo "modarator";
                      break;
                  }
                ?>
              </td>
              
              <td>
                <a href="<?php echo BASE_URL; ?>/UserController/edit_user/<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-primary edit_btn">Edit</a> 

                <a class="delete btn btn-sm btn-outline-danger" data-url="<?php echo BASE_URL; ?>/UserController/delete_user/<?php echo $user['id']; ?>">Delete</a></td>
              </tr>
          <?php } } ?>

        </tbody>
      <?php }?>
    </table>
    </div>

    <!-- Delete Modal -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="delete_form" method="get">
        <div class="modal-body">
          <p>Are you sure?</p>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>