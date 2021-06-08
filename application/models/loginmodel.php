<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class loginmodel extends CI_Model {
    //For access db in this model then make constructor otherwise define in autoload
    public function isvalidate($userName, $password){
        // $sql = $this->db->query('select * from users where username = $userName and password = $password');
        // if(count($sql->rows))}
        //     //true|
        // }else{
        //     //false
        // }
        $sql = $this->db->where(['username'=>$userName,'password'=>$password])->get('users');
        //echo "<pre>";print_r($sql->num_rows());exit;
        // ->from('users')
        // ->get();
        //$sql-result();
        if($sql->num_rows()){
            return $sql->row()->id;
        }else{
            return false;
        }
}
public function articleList($limit, $offset){
    $id = $this->session->userdata('id');
    $sql = $this->db->select()
    ->from('article')
    ->where(['user_id'=>$id])
    ->limit($limit, $offset)
    ->get();
    return $sql->result();
}

public function editArticle($id){
    $sql = $this->db->select(['article_title','article_body'])
    ->from('article')
    ->where(['id'=>$id])
    ->get();
         //echo "<pre>";print_r($this->db->last_query());exit;
    return $sql->row();
}

public function updateArticle($id, $arrArticle){
    return $sql = $this->db
    ->where(['id'=>$id])
    //update also take third parameter as where condition but not for multiple where
    ->update('article',$arrArticle);
}

public function numrows(){
    $id = $this->session->userdata('id');
    $sql = $this->db->select()
    ->from('article')
    ->where(['user_id'=>$id])
    ->get();
    // echo "<pre>";print_r($sql->result());exit;
    return $sql->num_rows();
}

public function addArticle($array){
    //$this->db->insert('article',['article_title'=>$y]]; //if different key get in post
    // echo "<pre>";print_r($array);exit;
    $affected_rows = $this->db->insert('article',$array);
    return $affected_rows;
}

public function addRegistration($array){
    //$this->db->insert('article',['article_title'=>$y]]; //if different key get in post
    // echo "<pre>";print_r($array);exit;
    $affected_rows = $this->db->insert('users',$array);
    return $affected_rows;
}

public function deleteArticle($id){
    return $this->db->delete('article',['id'=>$id]); 
}

}
