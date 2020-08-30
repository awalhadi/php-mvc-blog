
    <div class="content">
      <div class="row">
        <!-- post view  -->
        <div class="col-8 col-xs-12">
          <div class="main-content">
          <?php
            foreach ($posts as $key => $post) {

          ?>
            <div class="post">
              <a href="<?php echo BASE_URL;?>/IndexController/postDetails/<?php echo $post['id']?>">
              <p class="postTitle"> <?php echo $post['title']?></p>
              <p class="post-body">
                <?php 
                  $text = $post['body'];
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


  
