<?php

class Comment_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }


  
  public function create_comment(){


    $data =  [
      'post_id' => '',
      'name' => '',
      'email' => '',
      'body' => '',
    ];


    $response = =$this->db->insert('comment', $data);

  }

  public function delete_category($id){
  
    $response = $this->db->delete('categories', ['id' => $id]);
    
    return $response;
  }
}