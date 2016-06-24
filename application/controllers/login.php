<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('session');

		$this->load->model('login_model');

		$this->load->helper('url');
		date_default_timezone_set("Brazil/East");

	}

	public function index()
	{
		$this->load->view('login');
	}

	public function logar()
	{
		
		$senha = $this->input->post('senha');
    $Email = $this->input->post('email');

    $user = $this->login_model->logar($senha,$Email);
    if (count($user)>0){
    	$this->session->set_userdata('Nome',@$user->Nome);
			$this->session->set_userdata('Email',@$user->Email);
			$this->session->set_userdata('Codigo',@$user->Codigo);
			$this->login_model->atualizardatalogin($user->Codigo);
    	redirect('/home', 'refresh');
    } else {
    	$this->load->view('login');
    }
	}
	public function logout()
	{
		
		$this->session->sess_destroy();
		redirect('/login', 'refresh');
	}
	
}
