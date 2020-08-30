<h3> Add New Post</h3>
    <hr>
    
<?php
    foreach ($postById as $post) {
?>
    <div class="data_table p-4 m-4">
      <form action="<?php echo BASE_URL; ?>/AdminPostController/update_post" method="post">
  
        <div class="form-group">
          <label> Post Title </label>
          <input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?>" required>
        </div>
        
        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
        <div class="form-group">
            <label for="my-select">Select Category</label>
            <select id="my-select" class="custom-select" name="cat">
            <?php
                foreach ($catlist as $cat) {
            ?>
                <option value="<?php echo $cat['id']?>" 
                    <?php 
                    //if cat=>id == post=>cat_id  then selected 
                    if($post['cat'] == $cat['id']){
                        echo "selected"; 
                    } 
                    ?> 
                    >

                    
                    <?php echo $cat['name']?>
                </option>

            <?php }?>
            </select>
        </div>

        <div class="form-group">
          <label> Post Content </label>
          <textarea id="ckeditor" class="form-control" name="body">
                <?php echo $post['body']; ?>
          </textarea>
        </div>
        <button type="submit">update post</button>
      </form>
    </div>

 <?php }?>