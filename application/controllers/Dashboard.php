<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model("Setting_model", "setting");
	}
	public function index()
	{
		$data['message'] = "Hello...... Selamata Datang di Aplikasi Point Of Sale V.1.1";
		$this->template->load('template_view', 'dashboard_view', $data);
	}
}
