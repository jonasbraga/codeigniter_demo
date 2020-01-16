<?php

class Post_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }

  public function get_posts($slug = FALSE, $id = FALSE){
    if($slug === FALSE){
      $query = $this->db->get('posts');
      $response = $query->result_array(); 
    }else{
      $query = $this->db->get_where('posts', array('slug' => $slug));
      $response = $query->row_array(); 
    }

    if($id){
      $query = $this->db->get_where('posts', array('id' => $id));
      $response = $query->row_array(); 
    }

    return $response;
  }

  public function create_post(){
   
    $data = [
      'title' => $this->input->post('title'),
      'slug' => strtolower(url_title($this->input->post('title'))),
      'body' => $this->input->post('body'),
      'created_at' => now_date_mysql(),
      'updated_at' => now_date_mysql()
    ];

    $response = $this->db->insert('posts', $data);
    
    return $response;
  }

  public function update_post($id){
   
    $data = [
      'title' => $this->input->post('title'),
      'slug' => strtolower(url_title($this->input->post('title'))),
      'body' => $this->input->post('body'),
      'updated_at' => now_date_mysql()
    ];

    $response['update'] = $this->db->update('posts', $data, ['id' => $id]);
    
    if(!!$response){
      $query = $this->db->get_where('posts', array('id' => $id));
      $response['post'] = $query->row_array(); 
    }

    return $response;
  }

  public function delete_post($id){
  
    $response = $this->db->delete('posts', ['id' => $id]);
    
    return $response;
  }
}