<?php
class Contact extends CI_Controller{
  protected $_flash_mess = "flash_mess";
  protected $_flash_post = "_flash_post";
  public function __construct(){
    parent::__construct();
    $this->load->helper("url");
  }

  public function index(){

    $this->_data['title'] = 'Contact';

    $this->load->view('/user/contact.php', $this->_data);
  }

}
?>
