<!-- start Notification message -->
<?php
if (!empty($_GET['msg'])) {
  $notify = unserialize(urldecode($_GET['msg']));
?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/include/css/iziToast.min.css">
<script src="<?php echo BASE_URL; ?>/include/js/iziToast.min.js"></script>
<script>
  iziToast.<?php echo $notify[0]; ?>({
      position: "topRight",
      message: "<?php echo $notify[1]; ?>",
  });

</script>
<?php }?>
<!-- end Notification message -->

<h3> Category List</h3>
    <hr>

    <div class="data_table">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Serial No.</th>
          <th>Name</th>
          <th>Title</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
          <?php 
            $i = 0;
            foreach($cat as $key => $value){
                $i = $i + 1;
          ?>
            <tr>
            <td><?php echo $i."."; ?></td>
            <td><?php echo $value['name']; ?></td>
            <td><?php echo $value['title']; ?></td>
            
            <td>
              <a href="<?php echo BASE_URL; ?>/AdminController/edit_cat/<?php echo $value['id']; ?>" class="btn btn-sm btn-outline-primary edit_btn">Edit</a>

              <?php if(Session::get('role') == 1){ ?>
                <a class="delete btn btn-sm btn-outline-danger" data-url="<?php echo BASE_URL; ?>/AdminController/delete_cat/<?php echo $value['id']; ?>">Delete</a>
              <?php }?>
              
            </td>

            </tr>
        <?php }?>

      </tbody>
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