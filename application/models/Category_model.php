<?php

class Category_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }

  public function get_categories($id = FALSE){
    if($id === FALSE){
      $query = $this->db->order_by('name', 'ASC')->get('categories');
      $response = $query->result_array(); 
    }else{
      $query = $this->db->get_where('categories', array('id' => $id));
      $response = $query->row_array(); 
    }

    return $response;
  }

  public function create_category(){
   
    $data = [
      'name' => $this->input->post('name'),
      'created_at' => now_date_mysql(),
      'updated_at' => now_date_mysql()
    ];

    $response = $this->db->insert('categories', $data);
    
    return $response;
  }

  public function update_category($id){
   
    $data = [
      'name' => $this->input->post('name'),
      'updated_at' => now_date_mysql()
    ];

    $response['update'] = $this->db->update('categories', $data, ['id' => $id]);
    
    if(!!$response){
      $query = $this->db->get_where('categories', array('id' => $id));
      $response['category'] = $query->row_array(); 
    }

    return $response;
  }

  public function delete_category($id){
  
    $response = $this->db->delete('categories', ['id' => $id]);
    
    return $response;
  }
}