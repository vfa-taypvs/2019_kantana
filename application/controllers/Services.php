<?php
class Services extends CI_Controller{
  protected $_flash_mess = "flash_mess";
  protected $_flash_post = "_flash_post";
  public function __construct(){
    parent::__construct();
    $this->load->helper("url");
  }

  public function index(){
    $this->load->model("Muserservice");

    $this->_data['title'] = 'Services';

    $this->_data['row1'] = $this->Muserservice->getAllServicesAtRow(1);
    $this->_data['row2'] = $this->Muserservice->getAllServicesAtRow(2);
    $this->_data['row3'] = $this->Muserservice->getAllServicesAtRow(3);
    $this->_data['row4'] = $this->Muserservice->getAllServicesAtRow(4);

    $this->load->view('/user/services.php', $this->_data);
  }

  public function detail () {
    $this->load->model("Musercareer");
    $this->load->model("Madmincareerdescription");
    $this->load->model("Madmincareerrequirement");

    $idCipher =  $this->input->get('id');

    if ($idCipher!=null){
      $id = decrypted($idCipher);

      $career = $this->Musercareer->getCareerAtId($id);
      $description = $this->Madmincareerdescription->getCareerDescriptionAtCareerId($id);
      $requirement = $this->Madmincareerrequirement->getCareerRequirementAtCareerId($id);
      $this->_data['career'] = $career[0];
      $this->_data['description'] = $description;
      $this->_data['requirement'] = $requirement;
      $this->_data['id'] = $id;
    }

    $this->load->view('/user/career_detail.php', $this->_data);
  }

  public function add () {
    $this->load->model("Musercareerapplication");

    $data_post = $this->input->post();

    $currentDate = date('Y-m-d');
    $startDate = date("Y-m-d", strtotime($data_post['start_date']));
    $dirName =
    $tmp_name = $_FILES['file']['tmp_name'];
    $filename = $_FILES['file']['name'];

    $data_insert = array(
      "career_id" => $data_post['career_id'],
      "cv_file" => $filename,
      "cv_link" => $data_post['cv'],
      "portfolio_link" => $data_post['portfolio_url'],
      "start_date" => $startDate,
      "references_from" => $data_post['where_hear'],
      "post_date" => $currentDate,
      "status" => 0,
      "active" => 1,
    );


    $uploadfile = $_SERVER['DOCUMENT_ROOT'] . '/files/cv/'.$filename;
    if(move_uploaded_file($tmp_name, $uploadfile)){
			$this->Musercareerapplication->insertNewApplication($data_insert);
		}
    // echo base_url('/files/cv/'.$filename);
    // echo $uploadfile;

    $this->session->set_flashdata($this->_flash_mess, "Thank you for your applying! We will contact you soon");

    redirect('career/detail?id='.encrypted($data_post['career_id']));
  }


}
?>
