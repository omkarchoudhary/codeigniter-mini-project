<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Export_model extends CI_Model {
public function employee_list(){
    $query = $this->db->select(['name','email','feedback1'])
    ->from('feedback')
    ->get();
    //echo "<pre>";print_r($query->result());exit;
    return $query->result();
}
}