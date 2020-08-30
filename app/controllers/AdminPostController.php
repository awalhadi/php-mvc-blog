<?php
/**
 * AdminPostController class
 */
class AdminPostController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Session::checkSession();
    }



    public function all_post()
    {
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $data       = array();
        $PostTable  = "post";
        $CatTable   = "category";
        $post       = $this->load->model('PostModel');
        $category   = $this->load->model('CatModel');

        $data['catlist']  = $category->catlist($CatTable);    

        $data['posts'] = $post->getAllPost($PostTable);
        $this->load->view("admin/post", $data);

        if (Session::get('notify_msg') == true) {

            $data       = array();
            $notify     = Session::get('notify');
            Session::close_notify();
            $data['notify']   = $notify[0];
            $this->load->view("admin/notify", $data);

        }
        $this->load->view("admin/footer");
    }
    

    // create new post page
    public function mew_post()
    {
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $data       = array();
        $CatTable   = "category";
        $category   = $this->load->model('CatModel');

        $data['catlist']  = $category->catlist($CatTable);   
        
        $this->load->view("admin/new_post", $data);
        $this->load->view("admin/footer");
    }



    public function edit_post($id=null)
    {
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $data       = array();
        $PostTable  = "post";
        $CatTable   = "category";
        $post       = $this->load->model('PostModel');
        $category   = $this->load->model('CatModel');

        $data['catlist']  = $category->catlist($CatTable);    

        $data['postById'] = $post->getPostById($PostTable, $CatTable, $id);

        $this->load->view("admin/edit_post", $data);
        $this->load->view("admin/footer");
    }


    public function store_post()
    {
        $data   = array();
        $request   = $this->load->request();
        $title  = $request->input('title');
        $body   = $request->input('body');
        $cat    = $request->input('cat');

        $PostTable  = "post";

        if (!isset($title) || !isset($body) || !isset($cat)) {
            $data   = array(
                'title' => $title,
                'body'  => $body,
                'cat'   => $cat,
            );
        } else {
            $notify[]   = ['warning', 'filled the empty field'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/AdminPostController/all_post");
        }
        

        $postModel  = $this->load->model('PostModel');
        $result = $postModel->store_post($PostTable, $data);
        if ($result == 1) {
            $notify[]   = ['success', 'Post Store success'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/AdminPostController/all_post");
        }else{
            $notify[]   = ['warning', 'Something went wrong'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/AdminPostController/all_post");
        }
        
    }



    public function update_post()
    {
        $data       = array();
        $request    = $this->load->request();
        $id         = $request->input('id');
        $title      = $request->input('title');
        $body       = $request->input('body');
        $cat_id     = $request->input('cat');

        $cond   = "id=$id";

        $PostTable  = "post";
        if (!empty($title) || !empty($body) || !empty($id)) {
            $data   = array(
                'title' => $title,
                'body'  => $body,
                'cat'   => $cat_id,
            );
        } else {
            $notify[]   = ['warning', '2 filled the empty field'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/AdminPostController/all_post");
        }
        

        $postModel  = $this->load->model('PostModel');
        $result     = $postModel->updatePost($PostTable, $data, $cond);

        if ($result == 1) {
            $notify[]   = ['success', 'Post Update success'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
            header("Location: ".BASE_URL."/AdminPostController/all_post");
        }else{
            $notify[]   = ['warning', '2 Something went wrong'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/AdminPostController/all_post");
        }
    }


    public function delete_post($id=NULL)
    {
        $table = "post";
        $cond   = "id=$id";
        $postModel  = $this->load->model('PostModel');
        $result = $postModel->deletePost($table, $cond);

        if ($result == 1) {
            $notify[]   = ['error', 'Post has been deleted'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/AdminPostController/all_post");
        }else{
            $notify[]   = ['warning', 'Something went wrong'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/AdminPostController/all_post");
        }
    }


}


?>