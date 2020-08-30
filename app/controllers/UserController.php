<?php
/**
 * UserController class
 */
class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Session::checkSession();
    }



    public function user_list()
    {
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $data       = array();
        $userTable  = "user";
        $userModel  = $this->load->model('UserModel');


        $data['user_list'] = $userModel->get_userlist($userTable);

        $this->load->view("admin/user", $data);

        if (Session::get('notify_msg') == true) {

            $data       = array();
            $notify     = Session::get('notify');
            Session::close_notify();
            $data['notify']   = $notify[0];
            $this->load->view("admin/notify", $data);

        }
        $this->load->view("admin/footer");
    }
    

    // create new user page
    public function creat_user()
    {
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");
        
        $this->load->view("admin/create_user");
        $this->load->view("admin/footer");
    }



    public function edit_user($id = null)
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


    public function store_user()
        {
            $data       = array();
            $request    = $this->load->request();
            $name       = $request->input('name');
            $username   = $request->input('username');
            $email      = $request->input('email');
            $password   = md5($request->input('password'));
            $role       = $request->input('role');

            $table      = "user";
            
        if (!empty($name) || !empty($username) || !empty($email) || !empty($password) || !empty($role)) {
            $data       = array(
                'username'  => $username,
                'name'      => $name,
                'email'     => $email,
                'password'  => $password,
                'role'      => $role,
            );
        } else {
            $notify[]   = ['warning', 'must filled empty field'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/UserController/user_list");
        }


        $userModel  = $this->load->model('UserModel');
        $result = $userModel->store_user($table, $data);
        if ($result == 1) {
            $notify[]   = ['success', 'user create success'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/UserController/user_list");
        }else{
            $notify[]   = ['warning', 'Something went wrong'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/UserController/user_list");
        }
        
    }



    public function update_user()
    {
        $data       = array();
        $request    = $this->load->request();
        $name       = $request->input('name');
        $username   = $request->input('username');
        $email      = $request->input('email');
        $password   = md5($request->input('password'));
        $id         = $request->input('id');
        $role       = $request->input('role');
        if (!isset($role)) {
            $role   = Session::get('role');
        }

        $cond   = "id=$id";

        $table      = "user";
        if (!empty($name) || !empty($username) || !empty($email) || !empty($password) || !empty($role)) {
            $data   = array(
                'username'  => $username,
                'name'      => $name,
                'email'     => $email,
                'password'  => $password,
                'role'      => $role,
            );
        } else {
            $notify[]   = ['warning', 'must filled empty field'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/UserController/user_list");
        }
        

        $userModel  = $this->load->model('UserModel');
        $result     = $userModel->updateUser($table, $data, $cond);

        if ($result == 1) {
            $notify[]   = ['success', 'user Update success'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
            header("Location: ".BASE_URL."/UserController/user_list");
        }else{
            $notify[]   = ['warning', 'Something went wrong'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/UserController/user_list");
        }
    }


    public function delete_user($id=NULL)
    {
        $table      = "user";
        $cond       = "id=$id";
        $userModel  = $this->load->model('UserModel');
        $result     = $userModel->deleteUser($table, $cond);

        if ($result == 1) {
            $notify[]   = ['error', 'Post has been deleted'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/UserController/user_list");
        }else{
            $notify[]   = ['warning', 'Something went wrong'];
            Session::set_notify('notify_msg', true);
            Session::set_notify('notify', $notify);
    
            header("Location: ".BASE_URL."/UserController/user_list");
        }
    }


}


?>
