<?php

class Access_mdl extends CI_Model {
    var $vars;
    var $querycheck_pass;
    var $username;
    var $password;
    var $results = array();

    public function __construct() {
        parent::__construct();


    }

    public function validate(){
        $input_user = $this->input->post('username');
        $user_pass = md5($this->input->post('password'));

        $this->db->where('username', $input_user);
        $this->db->where('password', $user_pass);
        $query = $this->db->get('users');

        if($query->num_rows() == 1){
            return TRUE;
        }   return FALSE;
    }


    public function user_match(){

            $var = $this->input->post('username');
       if(empty($var)){
           $input_user = "!@#$";
       }elseif(!empty($var)){
           $input_user = $this->input->post('username');
           $user_pass = md5($this->input->post('password'));

        $q = $this->db->query(" SELECT * FROM users WHERE username='$input_user' AND password='$user_pass' ");
        if($q->num_rows() > 0){

            foreach($q->result() as $row):

                $data[]= $row;
                endforeach;

            return $data;
        }
       return FALSE;
    }
    }

}