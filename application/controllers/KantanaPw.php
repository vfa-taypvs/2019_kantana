<?php
class KantanaPw extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->helper("url");
  }

  public function index(){

    $password = "kantana1";  // Điền Password vào " "

    echo encrypted($password); // Encrypt password
  }
}
?>
