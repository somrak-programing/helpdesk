<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//chk admin status
		if($this->session->userdata('admin_status') !=1){
				redirect('login/logout','refresh');
		}
		$this->load->model('data_model');
	}

	public function index()
	{
		//print_r($_SESSION);
		$data['query']=$this->data_model->all();
		$this->load->view('template/header');
		$this->load->view('backend/jobs_list',$data);
		$this->load->view('template/footer');
	}
	
	 public function getupdate($id)
	
	{
		$data['query']=$this->data_model->get_detail($id);

		// echo '<pre>';
		// print_r($data['rsedit']);
		// echo '</pre>';
		// exit();

		$this->load->view('template/header');
		$this->load->view('backend/jobs_form_update',$data);
		$this->load->view('template/footer');
	}



	public function updatedata()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
		$this->form_validation->set_rules('id', 'id', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('tech_id', 'tech_id', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('case_status', 'case_status', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('case_update_log', 'บันทึกการอัพเดทงานซ่อม', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('tech_name', 'tech_name', 'trim|required|min_length[1]',
                array('required' => 'ชื่อช่างห้ามว่าง %s.', 'min_length' => 'ชื่อช่างห้ามว่าง'));

		if ($this->form_validation->run() == FALSE)
                {
                	$id = $this->input->post('id');
			       	$data['query']=$this->data_model->get_detail($id);
					$this->load->view('template/header');
					$this->load->view('backend/jobs_form_update',$data);
					$this->load->view('template/footer');
                }else{
					$this->data_model->update_job();
					$this->session->set_flashdata('save_success', TRUE);
					redirect('jobs','refresh');
                } //form vali
	}


}