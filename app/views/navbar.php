<div class="nav_item">

    <div class="row">
      <div class="col-7">
        <div class="menu">
          <a href="<?php echo BASE_URL; ?>">Home</a>
        </div>
      </div>
      <div class="col-5">
        <div class="search mt-4">
          <form action="<?php echo BASE_URL?>/IndexController/search" method="post">
          <div class="row">
            <div class="col-5 mr-0 pr-0">
              <input type="text" class="form-control" name="keyword" placeholder="Search heare...">
            </div>
            <div class="col-4">
              <div class="form-group">
                <select class="form-control" name="cat">
                  <option value="0">Select One</option>
                  <?php
                    foreach($catlist as $category){
                  ?>
                    <option value="<?php echo $category['id']; ?>"> <?php echo $category['name']; ?> </option>

                  <?php }?>
                </select>
              </div>
            </div>
            <div class="col-3 ml-0 pl-0">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </div>
          </div>
          </form>
        </div>

      </div>
    </div>

  </div>