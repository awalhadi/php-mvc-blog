<?php

/**
 * AdminController class
 */
class AdminController extends Controller{
    
    public function __construct()
    {
        parent::__construct();
        Session::checkSession();
    }

    public function dashboard()
    {
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $data   = array();
        $table  = "user";
        $userModel  = $this->load->model("UserModel");
        $data['user']  =  $userModel->get_userlist($table);

        $this->load->view("admin/dashboard", $data);
        $this->load->view("admin/footer");
    }

    // admin profile
    public function edit_profile($id=null)
    {
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $table      = "user";
        $userModel  = $this->load->model("UserModel");
        $data       = array();
        $data['userbyid'] = $userModel->userById($table, $id);

        $this->load->view("admin/edit_user", $data);

        $this->load->view("admin/footer");
    }

    // start category section
    public function all_category()
    {
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $data           = array();
        $table          = "category";
        $catModel       = $this->load->model("CatModel");
        $data['cat']    = $catModel->catlist($table);
        $this->load->view("admin/category", $data);

        if (Session::get('notify_msg') == true) {

            $data = array();
            $notify   = Session::get('notify');
            Session::close_notify();
            $data['notify']   = $notify[0];
            $this->load->view("admin/notify", $data);

        }
        $this->load->view("admin/footer");
        
    }

    public function add_newCat()
    {
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $this->load->view("admin/new_category");

        $this->load->view("admin/footer");
    }

    public function store_cat()
    {
        $data   = array();
        $table  = "category";
        $name   = $_POST['name'];
        $title  = $_POST['title'];
        $data   = array(
            'name'  => $name,
            'title' => $title
        );
        $catModel   = $this->load->model('CatModel');
        $result     = $catModel->insertCat($table, $data);
        if ($result == 1) {

            $notify[]   = ['success', 'Category Store success'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/AdminController/all_category");
        }else {
            $notify[]   = ['error', 'Something went wrong'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/AdminController/all_category");
        }

        header("Location: " .BASE_URL."/AdminController/all_category");
    }
   
    public function edit_cat($id=null)
    {
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $data       = array();
        $cat_id     = $id;
        $table      = "category";
        $catModel   = $this->load->model("CatModel");
        $data['category']  = $catModel->catById($table, $cat_id);

        $this->load->view("admin/edit_cat", $data);

        $this->load->view("admin/footer");
    }

    public function update_cat()
    {
        $data   = array();
        $table  = "category";
        $id     = $_POST['id'];
        $name   = $_POST['name'];
        $title  = $_POST['title'];

        $cond   = "id=$id";
        $data   = array(
            'name'  => $name,
            'title' => $title
        );
        $catModel   = $this->load->model("CatModel");

        $result = $catModel->catUpdate($table, $data, $cond);

        // notification message show with url
        $notify[]   = ['success', 'Category update success'];
        $url    = BASE_URL."/AdminController/all_category?msg=".urlencode(serialize($notify[0]));
        header("Location: ".$url);

        // if ($result == 1) {
        //     $notify[]   = ['success', 'Category update success'];
        //     Session::set_notify('notify_msg', true);
        //     Session::set_notify('notify', $notify);
    
        //     header("Location: ".BASE_URL."/AdminController/all_category");
        // }else {
        //     $notify[]   = ['error', 'Category update success'];
        //     Session::set_notify('notify_msg', true);
        //     Session::set_notify('notify', $notify);
    
        //     header("Location: ".BASE_URL."/AdminController/all_category");
        // }

        


    }

    public function delete_cat($id)
    {
        $table  = "category";
        $cond   = "id=$id";

        $catModel   = $this->load->model("CatModel");
        $result = $catModel->deleteCatById($table, $cond);
        if ($result == 1) {
            $notify[]   = ['warning', 'Category has been deleted'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/AdminController/all_category");
        }else {
            $notify[]   = ['error', 'Something went wrong'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/AdminController/all_category");
        }
        
        header("Location: ".BASE_URL."/AdminController/all_category");

    }

    // end category section
    
}


?>