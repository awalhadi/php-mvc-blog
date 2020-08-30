
        <!-- Sidebar -->
        <div class="col-4 hidden-xs">
          <div class="sidebar-content">
            <p class="sidebar-title">Category</p>
            <hr class="horihontal-title">

            <div class="catList">
              <ul class="list-unstyled side_cat">
              <?php
                foreach ($catlist as $cat) {

              ?>
                <li class="cat_list">
                <a href="<?php echo BASE_URL; ?>/IndexController/postByCat/<?php echo $cat['id']; ?>">
                <?php echo $cat['name']; ?>
                </a>
                </li>

                <?php }?>
              </ul>
            </div>

            <div class="latestPost">
              <p class="sidebar-title">Latest Post</p>
              <hr class="horihontal-title">

              <div class="latestPostList">
              <ul class="list-unstyled latest_post">
              <?php
                foreach($latestPost as $latestpost){
              ?>
                <li class="sidebarTitle"><a href=""><?php echo $latestpost['title']; ?></a></li>

                <?php }?>
              </ul>
            </div>
            </div>

          </div>
        </div>
        <!-- end Sidebar -->
