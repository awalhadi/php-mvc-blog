<?php

/**
 * hform class
 */
class hform
{
    public $currentValue;
    public $values  = array();
    public $errors  = array();

    public function __construct()
    {
        
    }

    public function post($key){
        $this->values[$key]   = trim($_REQUEST[$key]);
        $this->currentValue = $key;
        return $this;
    }

    public function isEmpty($key)
    {
        $this->post($key);
        if (empty($this->values[$this->currentValue]) || $this->values[$this->currentValue] == 0) {
            $this->errors[$this->currentValue]['empty'] = "Fiels must not empty";
        }

        return $this;
    }
}


?>