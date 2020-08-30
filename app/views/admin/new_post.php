<h3> Add New Post</h3>
    <hr>
    

    <div class="data_table p-4 m-4">
      <form action="<?php echo BASE_URL; ?>/AdminPostController/store_post" method="post">
  
        <div class="form-group">
          <label> Post Title </label>
          <input type="text" name="title" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="my-select">Select Category</label>
            <select id="my-select" class="custom-select" name="cat">
            <?php
                foreach ($catlist as $cat) {
            ?>
                <option value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>

            <?php }?>
            </select>
        </div>

        <div class="form-group">
          <label> Post Content </label>
          <textarea id="ckeditor" class="form-control" name="body">

          </textarea>
        </div>
        <button type="submit">create post</button>
      </form>
    </div>
