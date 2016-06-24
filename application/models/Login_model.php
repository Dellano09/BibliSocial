<?php

/*
 * @author: Dellano Henrique Ferreira Lisboa
 * @date: 04/04/2016  09:11:22 BRT 2013
 * */
class Login_model extends CI_Model {

    function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->library('encrypt');
    }

    function verifica_login(){

      if (empty($this->session->userdata('Email'))){
        redirect('/login', 'refresh');
      } 

    }

    function logar($senha,$Email){
      $this->db->from('usuario');
      $this->db->where('senha',$senha);
      $this->db->where('Email',$Email);
      
      $query = $this->db->get();
      $result = $query->row_object();
      return $result;

    }
    public function atualizardatalogin($Codigo)
    {
      $date = date('d/m/Y', time());
      $this->db->update('Usuario',array('UltimoLogin'=>$date),array('Codigo'=>$Codigo));
    }
    

}
