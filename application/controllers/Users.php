<?php
class Users extends My_Controller{
public function index(){
        $this->load->view('Users/articlelist');
}

public function login(){
    $this->load->view('Users/login');
}

}
?>