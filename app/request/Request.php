<?php
/**
 * Request class
 */
class Request
{
    public $input_value;
    public function __construct()
    {
        // code here
    }

    public function input($key)
    {
        return $this->input_value  = $_REQUEST[$key];
    }


}



?>