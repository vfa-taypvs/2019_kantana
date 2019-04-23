<?php
class AdminServiceRowFourMaster extends MY_Controller{
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

    $this->_data['services'] = $this->Madminservices->getAllServicesAtRow(4);
    $this->load->view('/admin/services_row4.php', $this->_data);
  }

  public function add () {
    $this->load->model("Madminservices");

    $data_post = $this->input->post();

    $currentDate = date('Y-m-d');

    $data_insert = array(
      "order" => $data_post['order'],
      "row" => 4,
      "image" => $_FILES['file']['name']
    );

    $this->Madminservices->insertNewService($data_insert);

    if (isset ($_FILES['file'])) {
      $tmp_name = $_FILES['file']['tmp_name'];
      $filename = $_FILES['file']['name'];

      $uploadfile = $_SERVER['DOCUMENT_ROOT'] . '/files/services/row4/'.$filename;
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

    $this->session->set_flashdata($this->_flash_mess, "New image has been added!");

    redirect('adminservicesrow4');

  }

  public function change () {
    $this->load->model("Madminservices");

    $data_post = $this->input->post();

    $currentDate = date('Y-m-d');

    $image = "";
    if (isset ($_FILES['file']) && $_FILES['file']['size'] > 0) {
      $image = $_FILES['file']['name'];
    } else  {
      $image = $data_post['currentImage'];
    }

    $data_insert = array(
      "order" => $data_post['order'],
      "image" => $image
    );

    $this->Madminservices->updateServiceAtId($data_post['id'], $data_insert);

    if (isset ($_FILES['file'])) {
      $tmp_name = $_FILES['file']['tmp_name'];
      $filename = $_FILES['file']['name'];

      $uploadfile = $_SERVER['DOCUMENT_ROOT'] . '/files/services/row4/'.$filename;
      // chmod('your-filename.ext',0755);

      if(file_exists($uploadfile)){
        unlink($uploadfile); //remove the file
      }
      if(move_uploaded_file($tmp_name, $uploadfile)){
  			// $this->Musercareerapplication->insertNewApplication($data_insert);
  		}
    }

    $this->session->set_flashdata($this->_flash_mess, "Image has been changed!");
    redirect('adminservicesrow4');
  }

  public function delete () {
    $this->load->model("Madminservices");

    $idCipher =  $this->input->get('id');
    $imageCipher =  $this->input->get('image');

    $id = 0;
    $image = '';
    if ($idCipher!=null) {
      $id = decrypted($idCipher);
      $image =  decrypted($imageCipher);
    }

    $this->Madminservices->removeServiceAtId($id);

    $deleteFile = $_SERVER['DOCUMENT_ROOT'] . '/files/services/row4/'.$image;

    if(file_exists($deleteFile)){
      unlink($deleteFile); //remove the file
    }

    $this->session->set_flashdata($this->_flash_mess, "Image has been deleted!");
    redirect('adminservicesrow4');
  }

}
?>
