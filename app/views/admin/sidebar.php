<!-- sidenav or sidebar  -->
<div class="sidebar">
            <div class="brand mt-4 mb-2 pr-2 justify-content-center align-items-center d-flex">
                <img class="pl-3" src="<?php echo BASE_URL; ?>/include/images/logo.png" alt="">
            </div>
            <div class="items-container">
                <div class="main-menu">
                    <ul class="list-unstyled sidebar_items">
                        <li class="items-list">
                            <a class="items" href="<?php echo BASE_URL?>/AdminController/dashboard">
                                <i class="fas fa-bars"></i>
                                <span class="list-text">Dashboad</span>
                            </a>
                        </li>
                        <?php if(Session::get('role') == 1) {?>
                        <li class="items-list">
                            <a class="items" href="">
                                <i class="fas fa-podcast"></i>
                                <span class="list-text">Manage user</span>
                            </a>
                            <ul>
                                <li><a href="<?php echo BASE_URL; ?>/UserController/user_list">All User</a></li>
                                <li><a href="<?php echo BASE_URL; ?>/UserController/creat_user">Create User</a></li>
                            </ul>
                        </li>
                        <?php }?>

                        <?php if(Session::get('role') == 1 || Session::get('role') == 2) {?>
                        <li class="items-list">
                            <a class="items" href="<?php echo BASE_URL; ?>/AdminController/all_category">
                                <i class="fas fa-podcast"></i>
                                <span class="list-text">Category</span>
                            </a>
                            <ul>
                                <li><a href="<?php echo BASE_URL; ?>/AdminController/all_category">All Category</a></li>
                                <li><a href="<?php echo BASE_URL; ?>/AdminController/add_newCat">Add Category</a></li>
                            </ul>
                        </li>
                        <?php }?>
                        <li class="items-list">
                            <a class="items" href="">
                                <i class="fas fa-comment"></i>
                                <span class="list-text">Post</span>
                            </a>
                            <ul>
                                <li><a href="<?php echo BASE_URL; ?>/AdminPostController/all_post">All Post</a></li>
                                <li><a href="<?php echo BASE_URL; ?>/AdminPostController/mew_post">Create New Post</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End sidebar  -->

       
        
    <!-- main content  -->
<div class="main_content">
    <div class="content-header d-flex justify-content-between">
        <div class="notifucation">
            <i class="fas fa-envelope-open"></i>
        </div>
        <div class="user_icon">
            <div class="dropdown">
                <div class="dropbtn">

                    <i class="fas fa-user-circle fa-2x"></i>
                </div>
                <div class="dropdown-content">
                    <?php if(Session::get('role') == 1){ ?>
                        <a href="<?php echo BASE_URL; ?>/AdminController/edit_profile/<?php echo Session::get('user_id'); ?>">Profile</a>
                        <?php }else{ ?>
                            <a href="<?php echo BASE_URL; ?>/UserController/edit_user/<?php echo Session::get('user_id'); ?>">Profile</a>
                        <?php } ?>

                <a href="<?php echo BASE_URL; ?>/LoginController/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-4">