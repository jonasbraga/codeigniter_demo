<?php

class Post_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }

  public function get_posts($slug = FALSE, $id = FALSE){
    
    $this->db->select('posts.*, categories.name AS category');
    $this->db->from('posts');
    $this->db->join('categories', 'categories.id = posts.category_id');
      
    if($slug === FALSE){
      $query = $this->db->get();
      $response = $query->result_array(); 
    } else if($id){
      $query = $this->db->where('posts.id', $id)->get();
      $response = $query->row_array(); 
    } else{
      $query = $this->db->where('posts.slug', $slug)->get();
      $response = $query->row_array(); 
    }

    return $response;
  }

  public function create_post($post_image){
   
    $data = [
      'title' => $this->input->post('title'),
      'slug' => strtolower(url_title($this->input->post('title'))),
      'body' => $this->input->post('body'),
      'category_id' => $this->input->post('category'),
      'image' => $post_image,
      'created_at' => now_date_mysql(),
      'updated_at' => now_date_mysql()
    ];

    $response = $this->db->insert('posts', $data);
    
    return $response;
  }

  public function update_post($id, $post_image){
   
    $data = [
      'title' => $this->input->post('title'),
      'slug' => strtolower(url_title($this->input->post('title'))),
      'body' => $this->input->post('body'),
      'category_id' => $this->input->post('category'),
      'image' => $post_image,
      'updated_at' => now_date_mysql()
    ];

    $response['update'] = $this->db->update('posts', $data, ['id' => $id]);
    
    if(!!$response){
      $response['post'] = $this->get_posts(0, $id); 
      $response['categories'] = $this->category_model->get_categories(); 
    }
     
    return $response;
  }

  public function delete_post($id){
  
    $response = $this->db->delete('posts', ['id' => $id]);
    
    return $response;
  }
}