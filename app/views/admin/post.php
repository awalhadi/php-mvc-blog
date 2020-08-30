<h3> All Post </h3>
    <hr>

    <div class="data_table">
    <table class="table table-striped display" id="post_list">
      <thead>
        <tr>
          <th> No.</th>
          <th>Title</th>
          <th>Content</th>
          <th>Cat Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
          <?php 
            $i = 0;
            foreach($posts as $key => $post){
                $i++;
          ?>
            <tr>
            <td width="5%"><?php echo $i."."; ?></td>
            <td width="35%"><?php echo $post['title']; ?></td>
            <td width="30%">
                <?php  
                    $content = $post['body'];
                    if (strlen($content) > 35) {
                        $content = substr($content, 0, 35);
                        echo $content."...";
                    }
                ?>
            </td>
            <td width="15%">
                <?php
                    foreach ($catlist as $cat) {
                        if ($cat['id'] == $post['cat']) {
                            
                            echo $cat['name']; 
                        }
                    }
                 ?>
            </td>
            <td width="15%">
              <a href="<?php echo BASE_URL; ?>/AdminPostController/edit_post/<?php echo $post['id']; ?>" class="btn btn-sm btn-outline-primary edit_btn">Edit</a> 

              <a class="delete btn btn-sm btn-outline-danger" data-url="<?php echo BASE_URL; ?>/AdminPostController/delete_post/<?php echo $post['id']; ?>">Delete</a>
            
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