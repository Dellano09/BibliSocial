<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charts extends CI_Controller {

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
		$this->load->helper('url');

		$this->load->library('session');

		$this->load->model('login_model');
		
		$this->user = $this->login_model->verifica_login();

		$this->load->model('charts_model');



	}

	public function emprestimoMes()
	{
		$this->load->view('header');
		$dados = $this->charts_model->data_emprestimoMes();
		$data = array();
		$data['dados'] = $dados;
		$this->load->view('emprestimoMes',$data);
		$this->load->view('footer');
	}

	public function generos()
	{
		$this->load->view('header');
		$dados = $this->charts_model->data_generos();
		$data = array();
		$data['dados'] = $dados;
		// $data = array('dados'=>);
		$this->load->view('generos',$data);
		$this->load->view('footer');
	}

	public function editoras()
	{
		$this->load->view('header');
		$dados = $this->charts_model->data_editoras();
		$data = array();
		$data['dados'] = $dados;
		// $data = array('dados'=>);
		$this->load->view('editoras',$data);
		$this->load->view('footer');
	}
	public function livros()
	{
		$this->load->view('header');
		$dados = $this->charts_model->data_livros();
		$data = array();
		$data['dados'] = $dados;
		// $data = array('dados'=>);
		$this->load->view('livros',$data);
		$this->load->view('footer');
	}


}
