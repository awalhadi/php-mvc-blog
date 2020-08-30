<?php

/**
 * LoginController class
 */
class LoginController extends Controller{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->login();
    }

    public function login(){
        Session::init();
        if (Session::get('login') == true) {
            header("Location: ".BASE_URL."/AdminController/dashboard");
        }else {
            $this->load->view("login/login");
        }
    }
    
    public function loginAuth(){

        $table      = "user";
        $username   = $_POST['username'];
        $password   = md5($_POST['password']);
        $loginModel = $this->load->model("LoginModel");
        $count      = $loginModel->userControl($table, $username, $password);
        if ($count > 0) {
            $result = $loginModel->getUserData($table, $username, $password);
            Session::init();
            Session::set('login', true);
            Session::set('username', $result[0]['username']);
            Session::set('user_id', $result[0]['id']);
            Session::set('role', $result[0]['role']);
            header("Location: ".BASE_URL."/AdminController/dashboard");
        } else {
            header("Location: ".BASE_URL."/LoginController/login");
        }
        
    }


    public function logout()
    {
        Session::init();
        Session::destroy();
        header("Location: ".BASE_URL."/LoginController/login");
    }
    
}


?>