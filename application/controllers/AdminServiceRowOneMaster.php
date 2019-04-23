<?php
class AdminServiceRowOneMaster extends MY_Controller{
  protected $_flash_mess = "flash_mess";
  protected $_flash_post = "_flash_post";
  public function __construct(){
    parent::__construct();
    $this->load->helper("url");
  }

  public function index(){
    $this->load->model("Madminservices");
    // echo "print : " . encrypted("kantana"); // Encrypt password
    // Flash Message
    $this->_data['mess'] = $this->session->flashdata($this->_flash_mess);
    // Validate Input Rule

    $this->_data['services'] = $this->Madminservices->getAllServicesAtRow(1);
    $this->load->view('/admin/services_row1.php', $this->_data);
  }

  public function change () {
    $this->load->model("Madminservices");

    $data_post = $this->input->post();

    $currentDate = date('Y-m-d');

    $data_insert = array(
      "title" => $data_post['title'],
      "content" => $data_post['content'],
      "update_date" => $currentDate
    );

    $this->Madminservices->updateServiceAtId($data_post['id'], $data_insert);

    if (isset ($_FILES['file'])) {
      $tmp_name = $_FILES['file']['tmp_name'];
      $filename = $_FILES['file']['name'];

      $uploadfile = $_SERVER['DOCUMENT_ROOT'] . '/files/services/row1/'.$data_post['order'].'.png';
      // chmod('your-filename.ext',0755);
      if(file_exists($uploadfile)){
        unlink($uploadfile); //remove the file
      }else{
        // echo 'file not found';
      }
      if(move_uploaded_file($tmp_name, $uploadfile)){
  			// $this->Musercareerapplication->insertNewApplication($data_insert);
  		}
    }

    $this->session->set_flashdata($this->_flash_mess, "Data has changed!");

    redirect('adminservicesrow1');

  }

  public function changeVideo () {

    if (isset ($_FILES['file'])) {
      $tmp_name = $_FILES['file']['tmp_name'];
      $filename = $_FILES['file']['name'];

      $uploadfile = $_SERVER['DOCUMENT_ROOT'] . '/files/services/row1/video.mp4';
      // chmod('your-filename.ext',0755);
      unlink($uploadfile); //remove the file
      if(move_uploaded_file($tmp_name, $uploadfile)){
        // $this->Musercareerapplication->insertNewApplication($data_insert);
      }
    }

    $this->session->set_flashdata($this->_flash_mess, "Data has changed!");

    redirect('adminservicesrow1');

  }
}
?>
