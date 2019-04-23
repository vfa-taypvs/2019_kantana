<?php
class AdminClientMaster extends MY_Controller{
  protected $_flash_mess = "flash_mess";
  protected $_flash_post = "_flash_post";
  public function __construct(){
    parent::__construct();
    $this->load->helper("url");
  }

  public function index(){
    $this->load->model("Madminclient");
    // echo "print : " . encrypted("kantana"); // Encrypt password
    // Flash Message
    $this->_data['mess'] = $this->session->flashdata($this->_flash_mess);
    // Validate Input Rule

    $row =  $this->input->get('row');

    $this->_data['clients'] = $this->Madminclient->getClientsAtRow($row);
    $this->_data['row'] = $row;
    $this->load->view('/admin/client.php', $this->_data);
  }

  public function add () {
    $this->load->model("Madminclient");

    $data_post = $this->input->post();

    $currentDate = date('Y-m-d');
    $row = $data_post['row'];

    $data_insert = array(
      "order" => $data_post['order'],
      "row" => $row,
      "image" => $_FILES['file']['name']
    );

    $this->Madminclient->insertNewClient($data_insert);

    if (isset ($_FILES['file'])) {
      $tmp_name = $_FILES['file']['tmp_name'];
      $filename = $_FILES['file']['name'];

      $uploadfile = $_SERVER['DOCUMENT_ROOT'] . '/files/clients/row'.$row.'/'.$filename;
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

    redirect('adminclient?row='.$row);

  }

  public function change () {
    $this->load->model("Madminclient");

    $data_post = $this->input->post();

    $currentDate = date('Y-m-d');
    $row = $data_post['row'];

    $data_insert = array(
      "order" => $data_post['order'],
      "image" => $_FILES['file']['name']
    );

    $this->Madminclient->updateClientAtId($data_post['id'], $data_insert);

    if (isset ($_FILES['file'])) {
      $tmp_name = $_FILES['file']['tmp_name'];
      $filename = $_FILES['file']['name'];

      $uploadfile = $_SERVER['DOCUMENT_ROOT'] . '/files/clients/row'.$row.'/'.$filename;
      // chmod('your-filename.ext',0755);

      if(file_exists($uploadfile)){
        unlink($uploadfile); //remove the file
      }
      if(move_uploaded_file($tmp_name, $uploadfile)){
  			// $this->Musercareerapplication->insertNewApplication($data_insert);
  		}
    }

    $this->session->set_flashdata($this->_flash_mess, "Image has been changed!");
    redirect('adminclient?row='.$row);
  }

  public function delete () {
    $this->load->model("Madminclient");

    $idCipher =  $this->input->get('id');
    $imageCipher =  $this->input->get('image');
    $row = $this->input->get('row');

    $id = 0;
    $image = '';
    if ($idCipher!=null) {
      $id = decrypted($idCipher);
      $image =  decrypted($imageCipher);
    }

    $this->Madminclient->removeClientAtId($id);

    $deleteFile = $_SERVER['DOCUMENT_ROOT'] . '/files/clients/row'.$row.'/'.$image;

    if(file_exists($deleteFile)){
      unlink($deleteFile); //remove the file
    }

    $this->session->set_flashdata($this->_flash_mess, "Image has been deleted!");
    redirect('adminclient?row='.$row);
  }

}
?>
