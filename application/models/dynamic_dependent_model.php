<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class dynamic_dependent_model extends CI_Model {

    public function fetch_country(){
    $query = $this->db->from('country')->order_by("country_name","ASC")->get();
    // echo "<pre>";print_r($query->result());exit;
    return $query->result();
    }

    public function fetch_state($country_id){
        $query = $this->db
            ->where('country_id',$country_id)
            ->order_by("state_name","ASC")
            ->get('state');
            $output = '<option value="">Select State</option>>';
            foreach($query->result() as $row){
                $output .= '<option value="'.$row->state_id.'">'.$row->state_name.'</option>>';
            }
            return $output;
        //echo "<pre>";print_r($query->result());exit;
        }

        public function fetch_city($state_id){
            $query = $this->db
                ->where('state_id',$state_id)
                ->order_by("city_name","ASC")
                ->get('city');
                $output = '<option value="">Select City</option>>';
                foreach($query->result() as $row){
                    $output .= '<option value="'.$row->city_id.'">'.$row->city_name.'</option>>';
                }
                return $output;
            //echo "<pre>";print_r($query->result());exit;
            }


}