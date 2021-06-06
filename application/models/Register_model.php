<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

    public function __construct() {
        $this->load->database('default');
        $this->load->library('session');

        // Call the Model constructor
        parent::__construct();
    }

    public function get_all_register_detail() {
        // $this->load->database();    //It is main object no compulsary to load
        // $q = $this->db->query("select * from users");
        // $result = $q->result(); //It returns array of objects
        //Make query using pre define active class
        // $this->db->select('first_name');
        // $q = $this->db->get('register');
        //$q->result_array();
        //How to load library
        //$this->load->library(array('form_validation'),('email'));
        //$this->form_validation->fb();
        //$this->email->fb();
        //Part 11
        //$this->load->helper('');
        //echo br(3); //If we want to add br 3 times then we use this helper this comes under html helper
        //Part 13
        // $this->load->helper('xyz_helper');
        // testDemo();
        //Part 14
        //Add our function in previous helper
        // $this->load->helper('array');
        // show();
        // $this->load->helper('array');
        // $arrData = ["AC"=>"te","DE"=>"df"];
        // echo element("ABC",$arrData,"NO data found");
        // $this->db->where('id',2);
        //Part 15
        // $this->load->library('test');
        // $this->test->show();
        //Part 16
        
        $this->db->select('*');
        $this->db->from('register');
        $objQuery = $this->db->get();
        return $objQuery->result_array();  //It return result in array form
    }

    public function get_id_wise_register_detail($id) {
        $this->db->select('*');
        $this->db->from('register');
        $this->db->where('id', $id);
        $objQuery = $this->db->get();
        return $objQuery->result_array();
    }

    public function insert($arrData) {
        if ($this->db->insert('register', $arrData)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($editData, $id) {
        $this->db->where('id', $id);

        if ($this->db->update('register', $editData)) {
            return true;
        } else {
            return false;
        }
    }

    function delete($id) {

        if ($this->db->delete('register', array('id' => $id))) {
            return true;
        } else {
            return false;
        }
    }

}

?>