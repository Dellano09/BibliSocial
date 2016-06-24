<?php

/*
 * @author: Dellano Henrique Ferreira Lisboa
 * @date: 27/04/2016 09:11:22 BRT 2013
 * */
class Cadastrar_model extends CI_Model {

    function __construct(){
      parent::__construct();
      $this->load->database();
      date_default_timezone_set("Brazil/East");

    }

    function get_data($where){

      $this->db->from('Usuario');

      $this->db->where($where);

			$query = $this->db->get();

      $result = $query->result_object();

      return $result;

    }
    function get_objetc($id){

			$query = $this->db->get_where('Usuario', array('Codigo' => $id));

			$result = $query->row_object();

      return $result;


    }
    function insert($dados){

      $arraySalvar = array();
      $arraySalvar['Nome'] = $dados['Nome'];
      $arraySalvar['Email'] = $dados['Email'];
      $arraySalvar['Senha'] = $dados['Senha'];
      $arraySalvar['CadastroData'] = date('d/m/Y', time());

	    $this->db->insert('Usuario', $arraySalvar);

      return true;
    }
    function update($dados){

      $arraySalvar = array();
      $arraySalvar['Nome'] = $dados['Nome'];
      $arraySalvar['Email'] = $dados['Email'];
      $arraySalvar['Senha'] = $dados['Senha'];

      $str = $this->db->update('Usuario', $arraySalvar, array('Codigo'=>$dados['Codigo']));

      return true;
    }
    function delete($id){

      $this->db->where('Codigo', $id);

      $this->db->delete('Usuario'); 

      return true;
	    
		}
    

}
