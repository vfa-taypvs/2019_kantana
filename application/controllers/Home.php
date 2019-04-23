<?php
class Home extends CI_Controller{
  protected $_flash_mess = "flash_mess";
  protected $_flash_post = "_flash_post";
  public function __construct(){
    parent::__construct();
    $this->load->helper("url");
  }

  public function index(){
    $this->load->model("Muserhome");

    $this->_data['title'] = 'Home';
    $home = $this->Muserhome->getHomeUrl();
    $this->_data['home'] = $home[0];

    $this->load->view('/user/index.php', $this->_data);
  }

}
?>
