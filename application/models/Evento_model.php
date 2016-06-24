<?php

/*
 * @author: Dellano Henrique Ferreira Lisboa
 * @date: 15/04/2016 09:11:22 BRT 2013
 * */
class Evento_model extends CI_Model {

    function __construct(){
      parent::__construct();
      $this->load->database();
      date_default_timezone_set("Brazil/East");

    }

    function get_data(){

      $this->db->select('*');
      $this->db->select("REPLACE(CONVERT(VARCHAR(11),DataInicio,103), ' ','-') as DataInicio", false);
      $this->db->select("REPLACE(CONVERT(VARCHAR(11),DataFim,103), ' ','-') as DataFim", false);

      $this->db->from('Evento');

			$query = $this->db->get();

      $result = $query->result_object();

      return $result;

    }
    function get_objetc($id){

			$query = $this->db->get_where('Evento', array('Codigo' => $id));

			$result = $query->row_object();

      return $result;


    }
    public function Usuarios($codigo)
    {
      $this->db->from('UsuarioEvento');
      $this->db->join('Usuario','Usuario.Codigo = UsuarioEvento.UsuarioCodigo');
      $this->db->where('EventoCodigo',$codigo);

      $query = $this->db->get();

      $result = $query->result_object();

      return $result;
    }
    function insert($dados){

      $arraySalvar = array();
      $arraySalvar['Descricao'] = $dados['Descricao'];
      $arraySalvar['DataInicio'] = $dados['DataInicio'];
      $arraySalvar['DataFim'] = $dados['DataFim'];
      $arraySalvar['observacao'] = $dados['observacao'];

      $this->db->insert('Evento', $arraySalvar);

      return true;
    }
    function participar($codigo,$usuarioCodigo){

      $arraySalvar = array();
      $arraySalvar['UsuarioCodigo'] = $usuarioCodigo;
      $arraySalvar['EventoCodigo'] = $codigo;

      $this->db->where($arraySalvar);
      $query = $this->db->get('UsuarioEvento');
      $result = $query->result_object();
      if (count($result)==0){
        $this->db->insert('UsuarioEvento', $arraySalvar);
      }

      return true;
    }
    function update($dados){

      $arraySalvar = array();
      $arraySalvar['Descricao'] = $dados['Descricao'];
      $arraySalvar['DataInicio'] = $dados['DataInicio'];
      $arraySalvar['DataFim'] = $dados['DataFim'];
      $arraySalvar['observacao'] = $dados['observacao'];

      $str = $this->db->update('Evento', $arraySalvar, array('Codigo'=>$dados['Codigo']));

      return true;
    }
    function delete($id){

      $this->db->where('Codigo', $id);

      $this->db->delete('Evento'); 

      return true;
	    
		}
    

}
