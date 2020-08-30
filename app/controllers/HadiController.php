<?php
/**
 *Hadi Controller
 */
class HadiController extends Controller
{
  public function __construct(){
    // parent::__construct();

  }

  public function hmethod($params){
    echo "From controller methods " . $params;
  }
}



?>