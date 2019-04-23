<?php
class CareerList extends CI_Controller{
  protected $_flash_mess = "flash_mess";
  protected $_flash_post = "_flash_post";
  public function __construct(){
    parent::__construct();
    $this->load->helper("url");
  }

  public function index(){
    $this->load->model("Musercareer");

    $currentPage =  $this->input->get('page');
    if ($currentPage==null)
      $currentPage = 1;

    $allCareer = $this->Musercareer->getlistCareer();

    $limit = 4;

    $this->_data['title'] = 'Career';

    $this->_data['current_page'] = $currentPage;
    $this->_data['all_page'] = count($allCareer);
    $this->_data['list_career'] = $this->Musercareer->getListFromIndex(($currentPage - 1)*$limit);
    $this->_data['limit'] = $limit;

    $this->load->view('/user/career.php', $this->_data);
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

      $this->_data['title'] = 'Career';
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

    // $this->session->set_flashdata($this->_flash_mess, "Thank you for your applying! We will contact you soon");

    redirect('career/detail?id='.encrypted($data_post['career_id']));
  }

  public function search(){
    $this->load->model("Musercareer");

    $data_post = $this->input->post();
    $keyword =  $data_post['search'];

    $allCareer = $this->Musercareer->getlistCareer();

    $limit = 50;

    $this->_data['current_page'] = 1;
    $this->_data['all_page'] = $limit;
    $this->_data['list_career'] = $this->Musercareer->getlistCareerFromKeyword($keyword);
    $this->_data['limit'] = $limit;

    $this->load->view('/user/career.php', $this->_data);
  }

}
?>
