<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastrar extends CI_Controller {

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
		

		$this->load->model('livro_model');
		$this->load->model('cadastrar_model');
		$date = date('d/m/Y', time());

	}
	public function index()
	{
		$this->load->view('cadastrar');
	}


	public function salvar(){
		$this->load->helper('url');
		$dados = array();
		$dados['Nome'] = @$this->input->post('Nome');
		$dados['Email'] = @$this->input->post('Email');
		$dados['Senha'] = @$this->input->post('Senha');
		$dados['Codigo'] = @$this->input->post('Codigo');
		
		if (empty($dados['Codigo']))
			$retorno = $this->cadastrar_model->insert($dados);
		else 
			$retorno = $this->cadastrar_model->update($dados);

		if ($retorno){
			redirect('/login', 'refresh');
		}
	}

	public function deletar($Codigo)
	{
		$retorno = $this->cadastrar_model->delete($Codigo);
		if ($retorno)
			echo '{"say":"ok"}';
	}

	public function perfil()
	{
		$usuarioCodigo = $this->session->userdata('Codigo');
		$dados = $this->cadastrar_model->get_objetc($usuarioCodigo);
	
		$data = array('dado'=>$dados);
		$this->load->view('header');
		$this->load->view('perfil',$data);
		$this->load->view('footer');
	}
}
