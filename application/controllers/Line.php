<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Line extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('line_view');
	}
	public function form($value='')
	{
		$this->load->view('form');
	}
	public function sent_to_line($value='')
	{
		$this->load->view('line_view');
	}




}