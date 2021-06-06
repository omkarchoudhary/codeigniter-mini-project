<?php
class Users extends My_Controller{
public function index(){
    //For autoload to all pages it is define in config.php
    //$this->load->helper('url');
    $this->load->helper('html');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('uname','User Name','required|alpha');
    $this->form_validation->set_rules('password','Password','required|max_length[12]');
    $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
    if($this->form_validation->run()){
        echo "Validation Success";
    }
    else{
        $this->load->view('Users/articlelist');
    }
}

public function login(){
    $this->load->view('Users/login');
}

}
?>