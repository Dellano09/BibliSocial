<?php

/*
 * @author: Dellano Henrique Ferreira Lisboa
 * @date: 10/04/2016  09:11:22 BRT 2013
 * */
class Livro_model extends CI_Model {

    function __construct(){
      parent::__construct();
      $this->load->database();
      date_default_timezone_set("Brazil/East");
    }

    public function livrosLidos($usuarioCodigo,$pesquisar)
    {
      $this->db->select('Livro.Nome,Livro.Codigo,Livro.Imagem,Genero.Descricao as Genero,Editora.Nome as Editora',false);
      $this->db->from('Livro');
      $this->db->join('Editora','Editora.Codigo = EditoraCodigo');
      $this->db->join('Genero','Genero.Codigo = GeneroCodigo');
      $this->db->join('Emprestimo','Emprestimo.LivroCodigo = Livro.Codigo');
      $this->db->where('UsuarioCodigo',$usuarioCodigo);
      $this->db->where('Lido',1);
      if(!empty($pesquisar)){
          $this->db->where("Livro.Nome like '%$pesquisar%'");
          
      }
      $this->db->group_by('Livro.Nome,Livro.Imagem,Livro.Codigo,Genero.Descricao,Editora.Nome');
      $query = $this->db->get();

      $result = $query->result_object();

      return $result;
    }
    public function meusLivros($usuarioCodigo,$pesquisar)
    {
      $this->db->select('Livro.Nome,Livro.Codigo,Livro.Imagem,Genero.Descricao as Genero,Editora.Nome as Editora',false);
      $this->db->from('Livro');
      $this->db->join('Editora','Editora.Codigo = EditoraCodigo');
      $this->db->join('Genero','Genero.Codigo = GeneroCodigo');
      $this->db->join('Emprestimo','Emprestimo.LivroCodigo = Livro.Codigo');
      $this->db->where('( Lido != 1 or Lido is null)');
      if(!empty($pesquisar)){
          $this->db->where("Livro.Nome like '%$pesquisar%'");
          
      }
      $this->db->where('UsuarioCodigo',$usuarioCodigo);
      $this->db->group_by('Livro.Nome,Livro.Imagem,Livro.Codigo,Genero.Descricao,Editora.Nome');
      $query = $this->db->get();

      $result = $query->result_object();

      return $result;
    }
    public function get_livro($codigo)
    {
      $this->db->select('Livro.*,Genero.Descricao as Genero,Editora.Nome as Editora',false);
      $this->db->from('Livro');
      $this->db->join('Editora','Editora.Codigo = EditoraCodigo');
      $this->db->join('Genero','Genero.Codigo = GeneroCodigo');
      $this->db->where('Livro.Codigo',$codigo);

      $query = $this->db->get();
      $result = $query->row_object();

      return $result;
    }

    public function livrosParaLer($usuarioCodigo,$pesquisar)
    {
      $this->db->select('LivroCodigo');
      $this->db->from('Emprestimo');
      $this->db->where('UsuarioCodigo',$usuarioCodigo);
      $query = $this->db->get();

      $result1 = $query->result_array();
      $where_not_in = (array_column($result1,'LivroCodigo'));

      $this->db->select('Livro.*,Genero.Descricao as Genero,Editora.Nome as Editora',false);
      $this->db->from('Livro');
      $this->db->join('Editora','Editora.Codigo = EditoraCodigo');
      $this->db->join('Genero','Genero.Codigo = GeneroCodigo');
      if(!empty($pesquisar)){
          $this->db->where("Livro.Nome like '%$pesquisar%'");
          
      }
      if (count($where_not_in)>0)
        $this->db->where_not_in('Livro.Codigo',$where_not_in);
      $query = $this->db->get();

      $result = $query->result_object();

      return $result;
    }

    public function remover($usuarioCodigo,$codigo)
    {

      $this->db->where('LivroCodigo',$codigo);
      $this->db->where('UsuarioCodigo',$usuarioCodigo);
      $this->db->delete('Emprestimo');
      print "<script type=\"text/javascript\">alert('Livro Removido Com Sucesso!!');</script>";
      redirect('/livro/meusLivros', 'refresh');
    }

    public function salvarAvalicao($avaliacao,$codigoLivro, $usuarioCodigo,$estrela)
    {
      $date = date('d/m/Y H:i:s', time());
      $dadosSalvar = array();
      $dadosSalvar['LivroCodigo'] = $codigoLivro ;
      $dadosSalvar['Tipo'] = 1;
      $dadosSalvar['UsuarioCodigo'] = $usuarioCodigo;
      $dadosSalvar['data'] = $date;
      $dadosSalvar['Comentario'] = $avaliacao;
      $dadosSalvar['estrela'] = $estrela;
      $this->db->insert('Noticias', $dadosSalvar);
      print "<script type=\"text/javascript\">alert('Avaliação Salva Com Sucesso!!');</script>";
      redirect('/livro/meusLivros', 'refresh');
    }
    public function salvarComentario($avaliacao,$codigoLivro, $usuarioCodigo)
    {
      $date = date('d/m/Y H:i:s', time());
      $dadosSalvar = array();
      $dadosSalvar['LivroCodigo'] = $codigoLivro ;
      $dadosSalvar['Tipo'] = 3;
      $dadosSalvar['UsuarioCodigo'] = $usuarioCodigo;
      $dadosSalvar['data'] = $date;
      $dadosSalvar['Comentario'] = $avaliacao;
      $this->db->insert('Noticias', $dadosSalvar);
      print "<script type=\"text/javascript\">alert('Comentário Salva Com Sucesso!!');</script>";
      redirect('/noticias', 'refresh');
    }
    public function curtir($codigoLivro, $usuarioCodigo)
    {
      $date = date('d/m/Y H:i:s', time());
      $dadosSalvar = array();
      $dadosSalvar['LivroCodigo'] = $codigoLivro ;
      $dadosSalvar['Tipo'] = 2;
      $dadosSalvar['UsuarioCodigo'] = $usuarioCodigo;
      $dadosSalvar['data'] = $date;
      $dadosSalvar['Comentario'] = '';
      $this->db->insert('Noticias', $dadosSalvar);
      print "<script type=\"text/javascript\">alert('Você Curtiu!!');</script>";
      redirect('/noticias', 'refresh');
    }

    public function adicionar($codigoLivro, $usuarioCodigo)
    {
      $dadosSalvar = array();
      $date = date('d/m/Y H:i:s', time());
      $dadosSalvar['UsuarioCodigo'] = $usuarioCodigo ;
      $dadosSalvar['LivroCodigo'] = $codigoLivro;
      $this->db->from('Emprestimo');
      $this->db->where($dadosSalvar);
      $query = $this->db->get();
      $result = $query->result_object();
      if (count($result)==0){

        $dadosSalvar['DataEmprestimo'] = $date;
        $this->db->insert('Emprestimo', $dadosSalvar);
        
      }
      print "<script type=\"text/javascript\">alert('Livro Adcionado Com Sucesso!!');</script>";
      redirect('/livro/livrosParaLer', 'refresh');

    }
    public function marcarLido($codigoLivro, $usuarioCodigo)
    {
      $dadosWhere = array();
      $dadosWhere['UsuarioCodigo'] = $usuarioCodigo ;
      $dadosWhere['LivroCodigo'] = $codigoLivro;
      
      $this->db->update('Emprestimo', array('Lido'=>1),  $dadosWhere);
        
      print "<script type=\"text/javascript\">alert('Livro Marcado Como Lido Com Sucesso!!');</script>";
      redirect('/livro/meusLivros', 'refresh');

    }

    public function curtidas($codigo)
    {
      $this->db->select('*');
      $this->db->from('Noticias');
      $this->db->where('Tipo',2);
      $this->db->where('LivroCodigo',$codigo);
      $query = $this->db->get();
      
      $result = $query->result_object();
      return $result;

    }

    public function comentarioeavaliacoes($codigo)
    {
      $this->db->select('Usuario.Nome as NomeUsuario, Genero.Descricao as Genero, Livro.Nome as Nome,Livro.Imagem,Livro.Codigo,Noticias.Tipo,Comentario,Noticias.Estrela',false);
       $this->db->select("REPLACE(CONVERT(VARCHAR(11),data,103), ' ','-')  as data", false);
      $this->db->from('Noticias');
      $this->db->join('Livro','LivroCodigo = Livro.Codigo');
      $this->db->join('Genero','Genero.Codigo = GeneroCodigo');
      $this->db->join('Usuario','Noticias.UsuarioCodigo = Usuario.Codigo');
      $this->db->where('Tipo <> 2');
      $this->db->where("LivroCodigo = $codigo");
      $this->db->order_by('data','desc');
      $query = $this->db->get();
      
      $result = $query->result_object();
      return $result;

    }

    public function mediaestrelas($codigo)
    {
      $this->db->select('sum(estrela) as qtdestrelas, count(*) as qtd',false);
      $this->db->from('Noticias');
      $this->db->where('Tipo',1);
      $this->db->where('estrela!=-1');
      $this->db->where("LivroCodigo = $codigo");
      $query = $this->db->get();
      
      $result = $query->row_object();
      return $result;
    }

    public function Dellano Henrique Ferreira Lisboa($codigo)
    {
      
      $retorno = $this->get_livro($codigo);
      
      $retorno->curtidas = $this->curtidas($codigo);

      $retorno->comentarioeavaliacoes = $this->comentarioeavaliacoes($codigo);

      $retorno->mediaestrelas = $this->mediaestrelas($codigo);

      return $retorno;


    }
    public function consultarUsuarioAvaliacao($codigoLivro, $usuarioCodigo){
      $this->db->from('Noticias');
      $this->db->where('Tipo',2);
      $this->db->where('UsuarioCodigo', $usuarioCodigo);
      $this->db->where('LivroCodigo', $codigoLivro);
      $query = $this->db->get();
      
      $result = $query->row_object();
      return $result;




    }

}
