
    <div class="content">
      <div class="row">
        <!-- post view  -->
        <div class="col-8 col-xs-12">
          <div class="main-content">
          <?php
            foreach ($catbypost as $post) {

          ?>
            <div class="post">
              <div class="post_title">
                <h3><?php echo $post['title'] ?></h3>
                <p class = "cat_name">Category Name: <?php echo $post['name'] ?></p>
              </div>

              <p class="post-body">
                <?php 
                  $text =$post['body'];
                if (strlen($text) > 200) {
                  $text = substr($text, 0, 200);
                  echo $text;
                }else{

                  echo $post['body'];
                }
                ?>
              </p>
              </a>
              <p class="read_more"><a href="<?php echo BASE_URL;?>/IndexController/postDetails/<?php echo $post['id']?>">read more....</a></p>
            </div>

            <?php }?>
          </div>
        </div>
        <!-- end post view  -->


  
