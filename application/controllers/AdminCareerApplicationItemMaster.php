<?php
class AdminCareerApplicationItemMaster extends MY_Controller{
  protected $_flash_mess = "flash_mess";
  protected $_flash_post = "_flash_post";
  public function __construct(){
    parent::__construct();
    $this->load->helper("url");
  }

  public function index(){
    $this->load->model("Madmincareerapplication");

    // Flash Message
    $this->_data['mess'] = $this->session->flashdata($this->_flash_mess);

    $idCipher =  $this->input->get('id');

    $isUpdate = 0;
    $id = 0;
    if ($idCipher!=null) {
      $id = decrypted($idCipher);
    }

    $data_post = $this->input->post();

    if($data_post!=null) {
      $this->session->set_flashdata($this->_flash_post,$data_post);

      redirect('adminCareerApplicationItemMaster/change');
    }

    $this->_data['id'] = $id;
    $applicationId = $this->Madmincareerapplication->getApplicationAtId($id);
    $this->_data['application'] = $applicationId[0];
    $this->load->view('/admin/application_item.php', $this->_data);
  }

  public function download () {
    $this->load->model("Madmincareerapplication");

    $fileCipher =  $this->input->get('id');
    $file = '';
    $id = 0;
    if ($fileCipher!=null) {
      $file = decrypted($fileCipher);
    }
    $this->load->helper('download');

    $downloadFile = $_SERVER['DOCUMENT_ROOT'] . '/files/cv/'.$file;

    force_download($downloadFile, NULL);

  }

  public function change () {
    $this->load->model("Madmincareerapplication");

    $data = $this->session->flashdata($this->_flash_post);

    $data_update = array(
      "status" => $data['status']
    );

    $this->Madmincareerapplication->updateStatus($data['id'],$data_update);

    redirect('adminapplication');
  }


}
?>
