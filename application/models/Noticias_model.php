<?php

/*
 * @author: Dellano Henrique Ferreira Lisboa
 * @date: 01/04/2016 09:11:22 BRT 2013
 * */
class Noticias_model extends CI_Model {

    function __construct(){
      parent::__construct();
      $this->load->database();
      date_default_timezone_set("Brazil/East");
    }

    public function noticias()
    {
      $this->db->select('Usuario.Nome as NomeUsuario, Genero.Descricao as Genero, Livro.Nome as Nome,Livro.Imagem,Livro.Codigo,Noticias.Tipo,Comentario,Noticias.Estrela',false);
      $this->db->from('Noticias');
      $this->db->join('Livro','LivroCodigo = Livro.Codigo');
      $this->db->join('Genero','Genero.Codigo = GeneroCodigo');
      $this->db->join('Usuario','Usuario.Codigo = UsuarioCodigo');
      $this->db->order_by('Noticias.data','desc');
      $this->db->limit(30);
      $query = $this->db->get();

      $result = $query->result_object();

      return $result;
    }
    public function salvarCurtir($codigoLivro, $usuarioCodigo)
    {
      $date = date('d/m/Y H:i:s', time());
      $dadosSalvar = array();
      $dadosSalvar['LivroCodigo'] = $codigoLivro ;
      $dadosSalvar['Tipo'] = 1;
      $dadosSalvar['UsuarioCodigo'] = $usuarioCodigo;
      $dadosSalvar['data'] = $date;
      $dadosSalvar['Comentario'] = $avaliacao;
      $this->db->insert('Noticias', $dadosSalvar);
      print "<script type=\"text/javascript\">alert('Dados Salvo Com Sucesso!!');</script>";
      redirect('/livro/livrosLidos', 'refresh');
    }
    

}
