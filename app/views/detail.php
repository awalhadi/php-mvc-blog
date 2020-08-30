
    <div class="content">
      <div class="row">
        <!-- post view  -->
        <div class="col-8 col-xs-12">
          <div class="main-content">
            <p class="breadcumb">Post Ddetails</p>
            <hr>
            <div class="full_post">
              <?php
                foreach ($postById as $post) {
              ?>
              <div class="post_title">
                <h3><?php echo $post['title'] ?></h3>
                <p>Category Name: <a class = "cat_name" href="<?php echo BASE_URL; ?>/IndexController/postByCat/<?php echo $post['cat']; ?>"><?php echo $post['name'] ?></a></p>
              </div>

              <div class="post_content">
                <p class="content">
                  <?php echo $post['body'] ?>
                </p>
              </div>

              <?php }?>
            </div>
          </div>
        </div>
        <!-- end post view  -->


  
