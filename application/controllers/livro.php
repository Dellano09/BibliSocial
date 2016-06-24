<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livro extends CI_Controller {

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

		$this->load->model('livro_model');

	}
	public function detalhe($codigo)
	{
		// detalheLivro
		$dados = $this->livro_model->detalheLivro($codigo);
		$data = array('dados'=>$dados);
		$this->load->view('header');
		$this->load->view('detalheLivro',$data);
		$this->load->view('footer');
	}
	public function livrosLidos()
	{	
		$usuarioCodigo = $this->session->userdata('Codigo');
		$pesquisar = $this->input->post('pesquisar');
		$dados = $this->livro_model->livrosLidos($usuarioCodigo,$pesquisar);
		$data = array('dados'=>$dados);
		$this->load->view('header');
		$this->load->view('livrosLidos',$data);
		$this->load->view('footer');
	}
	public function meusLivros()
	{	
		$usuarioCodigo = $this->session->userdata('Codigo');
		$pesquisar = $this->input->post('pesquisar');
		$dados = $this->livro_model->meusLivros($usuarioCodigo,$pesquisar);
		$data = array('dados'=>$dados);
		$this->load->view('header');
		$this->load->view('meusLivros',$data);
		$this->load->view('footer');
	}
	public function livrosParaLer()
	{
		$usuarioCodigo = $this->session->userdata('Codigo');
		$pesquisar = $this->input->post('pesquisar');
		$dados = $this->livro_model->livrosParaLer($usuarioCodigo,$pesquisar);
		$data = array('dados'=>$dados);
		$this->load->view('header');
		$this->load->view('livrosParaLer',$data);
		$this->load->view('footer');
	}

	public function remover($codigo)
	{
		$usuarioCodigo = $this->session->userdata('Codigo');
		$this->livro_model->remover($usuarioCodigo,$codigo);
		echo "livro removido";
	}

	public function avaliar($codigo)
	{
		$usuarioCodigo = $this->session->userdata('Codigo');
		$dados = $this->livro_model->get_livro($codigo);
		$consultarUsuarioAvaliacao = $this->livro_model->consultarUsuarioAvaliacao($codigo, $usuarioCodigo);
		$data = array('dados'=>$dados,'consultarUsuarioAvaliacao'=>$consultarUsuarioAvaliacao);
		$this->load->view('header');
		$this->load->view('avaliar',$data);
		$this->load->view('footer');
	}
	public function salvarAvalicao()
	{
		$avaliacao = $this->input->post('avaliacao');
		$estrela = $this->input->post('estrela');
		$codigoLivro =  $this->input->post('codigoLivro');
		$usuarioCodigo = $this->session->userdata('Codigo');

		$this->livro_model->salvarAvalicao($avaliacao,$codigoLivro, $usuarioCodigo,$estrela);

	}
	public function salvarComentario()
	{
		$avaliacao = $this->input->post('avaliacao');
		$codigoLivro =  $this->input->post('codigoLivro');
		$usuarioCodigo = $this->session->userdata('Codigo');
		$this->livro_model->salvarComentario($avaliacao,$codigoLivro, $usuarioCodigo);

	}
	public function adicionar($codigoLivro)
	{
		$usuarioCodigo = $this->session->userdata('Codigo');
		$this->livro_model->adicionar($codigoLivro, $usuarioCodigo);
	}
	public function marcarLido($codigoLivro)
	{
		$usuarioCodigo = $this->session->userdata('Codigo');
		$this->livro_model->marcarLido($codigoLivro, $usuarioCodigo);
	}
	public function curtir($codigoLivro)
	{
		$usuarioCodigo = $this->session->userdata('Codigo');
		$this->livro_model->curtir($codigoLivro, $usuarioCodigo);
		
	}
	public function comentar($codigoLivro)
	{
		$usuarioCodigo = $this->session->userdata('Codigo');
		$dados = $this->livro_model->get_livro($codigoLivro);
		$data = array('dados'=>$dados);
		$this->load->view('header');
		$this->load->view('comentar',$data);
		$this->load->view('footer');

	}
	public function votar()
	{
		echo "<script type='text/javascript'>
					$('#estrela').val(".$this->input->post('rating').")
				 </script>";
	}
}
