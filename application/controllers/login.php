<?php

class Login extends CI_Controller{
    var $vars;
    public function __construct() {
        parent::__construct();

        $this->vars['loginform_attrb']= array('id' => 'loginform');
        $this->vars['menu_list']=array(anchor('/gportal_ctrl/home','Home'),
                                                anchor('/gportal_ctrl/user_area','User Area'),
                                                anchor('/gportal_ctrl/database','Database'),
                                                anchor('/gportal_ctrl/tools','Tools'),
                                                anchor('/gportal_ctrl/about','About'));


        $this->load->vars($this->vars);
    }

 public function index (){
    $this->load->view('login');

 }

    public function validate_credentials(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('login');
        }else{
            $this->load->model('Access_mdl');
            (bool)$query = $this->Access_mdl->validate();

        if($query){

            $user_info = $this->Access_mdl->user_match();
            foreach ($user_info as $v){
                $user_level = $v->LEVEL;
                $user_username = $v->USERNAME;

           }

            $data = array(
                'username'=> $user_username,
                'is_logged_in'=> true ,
                'salt' => 'acc2a16d1584072d33c3ec088905d7ca',
                'user_level' => $user_level
            );

            $this->session->set_userdata($data);
            redirect('gportal_ctrl/database');
        }
        else{
            $msg['user_notfound'] = "<div style='text-align:center;'><p>Our Records don't match with your login credentials.</p></div>";
            $this->load->view('login', $msg);
        }
        }

    }


    public function log_out(){

        $this->session->sess_destroy();
         $this->load->view('login');


    }

}
