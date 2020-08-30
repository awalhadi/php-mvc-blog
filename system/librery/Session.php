<?php
/**
 * Seassion class
 */
class Session {
    public static function init(){
        session_start();
    }

    public static function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    public static function get($key)
    {
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }

    }

    public static function checkSession()
    {
        self::init();
        if (self::get('login') == false) {
            self::destroy();
            header("Location: ".BASE_URL."/LoginController/login");
        }
    }

    public static function destroy()
    {
        session_destroy();
    }

    public static function set_notify($key, $notify)
    {
        // self::init();
        self::set($key, $notify);
        

    }
    public static function close_notify()
    {
        if (self::get('notify_msg') == true) {
            self::set('notify_msg', false);
        }

    }

    
}


?>