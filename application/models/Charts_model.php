<?php

/*
 * @author: Dellano Henrique Ferreira Lisboa
 * @date: 18/04/2016  09:11:22 BRT 2013
 * */
class Charts_model extends CI_Model {

    function __construct(){
      parent::__construct();
      $this->load->database();
    }

    function data_emprestimoMes(){
      $this->db->select('count(*) as qtd, year(DataEmprestimo) as ano,month(DataEmprestimo) as mes',false);
      $this->db->from('Emprestimo');
      $this->db->group_by('year(DataEmprestimo),month(DataEmprestimo)');
      
      $this->db->order_by('year(DataEmprestimo)');
      $this->db->order_by('month(DataEmprestimo)');
      $query = $this->db->get();
      $result = $query->result_object();
      $mesDesc = array(1=>'Janeiro',2=>"Fevereiro",3=>"Marco",4=>"Abril",5=>"Maio",6=>"Junho",7=>"julho",8=>"Agosto",9=>"Setembro",10=>"Outubro",11=>"Novembro",12=>"Dezembro");
      $retorno = array();
      $labels = array();
      $retorno['labels'] = array();
      $retorno['datasets'] = array();
      $anoantes = null;
      $countano = -1;
      foreach ($result as $key => $dado) {
        # code...
        if ($anoantes != $dado->ano){
          $countano++;
          $retorno['datasets'][$countano] = array();
          $retorno['datasets'][$countano]['label'] = $dado->ano;
          $retorno['datasets'][$countano]['fillColor'] = "rgba(210, 214, 222, 1)";
          $retorno['datasets'][$countano]['strokeColor'] = "rgba(210, 214, 222, 1)";
          $retorno['datasets'][$countano]['pointColor'] = "rgba(210, 214, 222, 1)";
          $retorno['datasets'][$countano]['pointStrokeColor'] = "#c1c7d1";
          $retorno['datasets'][$countano]['pointHighlightFill'] = "#fff";
          $retorno['datasets'][$countano]['pointHighlightStroke'] = "rgba(220,220,220,1)";
          $retorno['datasets'][$countano]['data'] = array();
        }
        $labels[] = $dado->mes;
        $retorno['datasets'][$countano]['data'][$dado->mes] = $dado->qtd;
        $anoantes = $dado->ano;
      }
      
      $labels = (array_unique($labels));
      sort($labels);
      foreach ($labels as $key => $mes) {
        $retorno['labels'][] = $mesDesc[$mes];
        foreach ($retorno['datasets'] as $as => $dadoano) {
          if (empty($dadoano['data'][$mes])) $retorno['datasets'][$as]['data'][$mes] = 0;
          # code...
        }
      }


      return $retorno;
    }

    public function data_generos()
    {
      $this->db->select('Descricao,count(*) as qtd',false);
      $this->db->from('Emprestimo');
      $this->db->join('Livro','Emprestimo.LivroCodigo = Livro.Codigo');
      $this->db->join('Genero','GeneroCodigo = Genero.Codigo');
      $this->db->group_by('Descricao');
      $query = $this->db->get();
      $result = $query->result_object();

      $arrayColor = array();
      $arrayColor[] = "#f56954";
      $arrayColor[] = "#00a65a";
      $arrayColor[] = "#f39c12";
      $arrayColor[] = "#00c0ef";
      $arrayColor[] = "#3c8dbc";
      $arrayColor[] = "#d2d6de";
      
      $retorno = array();

      foreach ($result as $key => $value) {
        # code...
        $retorno[] = array("value"=> $value->qtd, "color"=> $arrayColor[$key % 6], "highlight"=> [$key % 6], "label"=> $value->Descricao);
      }


      return $retorno;
    }
    public function data_editoras()
    {
      $this->db->select('Editora.Nome as Descricao,count(*) as qtd',false);
      $this->db->from('Emprestimo');
      $this->db->join('Livro','Emprestimo.LivroCodigo = Livro.Codigo');
      $this->db->join('Editora','Editora.Codigo = EditoraCodigo');
      $this->db->group_by('Editora.Nome');
      $query = $this->db->get();
      $result = $query->result_object();

      $arrayColor = array();
      $arrayColor[] = "#f56954";
      $arrayColor[] = "#00a65a";
      $arrayColor[] = "#f39c12";
      $arrayColor[] = "#00c0ef";
      $arrayColor[] = "#3c8dbc";
      $arrayColor[] = "#d2d6de";
      
      $retorno = array();

      foreach ($result as $key => $value) {
        # code...
        $retorno[] = array("value"=> $value->qtd, "color"=> $arrayColor[$key % 6], "highlight"=> [$key % 6], "label"=> $value->Descricao);
      }


      return $retorno;
    }
    public function data_livros()
    {
      $this->db->select('Livro.Nome as Descricao,count(*) as qtd',false);
      $this->db->from('Emprestimo');
      $this->db->join('Livro','Emprestimo.LivroCodigo = Livro.Codigo');
      $this->db->group_by('Livro.Nome');
      $query = $this->db->get();
      $result = $query->result_object();

      $arrayColor = array();
      $arrayColor[] = "#f56954";
      $arrayColor[] = "#00a65a";
      $arrayColor[] = "#f39c12";
      $arrayColor[] = "#00c0ef";
      $arrayColor[] = "#3c8dbc";
      $arrayColor[] = "#d2d6de";
      
      $retorno = array();

      foreach ($result as $key => $value) {
        # code...
        $retorno[] = array("value"=> $value->qtd, "color"=> $arrayColor[$key % 6], "highlight"=> [$key % 6], "label"=> $value->Descricao);
      }


      return $retorno;
    }
    

}
