<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Controller {

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

		$this->load->model('evento_model');

		$date = date('d/m/Y', time());

	}
	public function index()
	{
		$data = array();
		$data['dados'] = $this->evento_model->get_data();
		$this->load->view('header');
		$this->load->view('eventoList',$data );
		$this->load->view('footer');
	}

	public function novo()
	{
		$this->load->view('header');
		$this->load->view('evento');
		$this->load->view('footer');
	}

	public function editar($codigo)
	{
		$data = array();
		$data['dado'] = $this->evento_model->get_objetc($codigo);
		$data['usuarios'] = $this->evento_model->Usuarios($codigo);
		$this->load->view('header');
		$this->load->view('evento',$data);
		$this->load->view('footer');
	}

	public function salvar(){
		$this->load->helper('url');
		$dados = array();
		$dados['Descricao'] = @$this->input->post('Descricao');
		$dados['DataInicio'] = @$this->input->post('DataInicio');
		$dados['DataFim'] = @$this->input->post('DataFim');
		$dados['observacao'] = @$this->input->post('observacao');
		$dados['Codigo'] = @$this->input->post('Codigo');
		
		if (empty($dados['Codigo']))
			$retorno = $this->evento_model->insert($dados);
		else 
			$retorno = $this->evento_model->update($dados);

		if ($retorno){
				print "<script type=\"text/javascript\">alert('Evento Salvo Com Sucesso!!');</script>";
		  	redirect('/evento', 'refresh');
		}
	}
	public function participar($codigo)
	{
		$usuarioCodigo = $this->session->userdata('Codigo');
		$retorno = $this->evento_model->participar($codigo,$usuarioCodigo);
		if ($retorno){
				print "<script type=\"text/javascript\">alert('Você foi inserido no Evento Com Sucesso!!');</script>";
		  	redirect('/evento', 'refresh');
		}
	}
	public function deletar($Codigo)
	{
		$retorno = $this->evento_model->delete($Codigo);
		if ($retorno)
			echo '{"say":"ok"}';
	}

	public function perfil()
	{
		$usuarioCodigo = $this->session->userdata('Codigo');
		$dados = $this->evento_model->get_objetc($usuarioCodigo);
	
		$data = array('dado'=>$dados);
		$this->load->view('header');
		$this->load->view('perfil',$data);
		$this->load->view('footer');
	}
}
