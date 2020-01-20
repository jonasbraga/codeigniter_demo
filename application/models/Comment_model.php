<?php

class Comment_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }
  
  public function create_comment(){

    $data = [
      'post_id' => $this->input->post('id'),
      'name' => $this->input->post('name'),
      'email' => $this->input->post('email'),
      'body' => $this->input->post('comment'),
      'created_at' => now_date_mysql(),
      'updated_at' => now_date_mysql()
    ];

    $response = $this->db->insert('comments', $data);

    return $response;
  }

  public function get_comments($post_id = '', $id = ''){
    if($post_id){
      $query = $this->db->get_where('comments', ['post_id' => $post_id]);
      $response = $query->result_array();
    } else if($id) {
      $query = $this->db->get_where('comments', ['id' => $id]);
      $response = $query->result_array();
    }else{
      $query = $this->db->get('comments');
      $response = $query->result_array();
    }

    return $response;
  }

  public function delete_comment($id){
  
    $response = $this->db->delete('categories', ['id' => $id]);
    return $response;
  }
}