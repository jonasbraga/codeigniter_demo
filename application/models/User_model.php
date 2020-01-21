<?php

class User_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }

  public function get_users($id = FALSE){
  
    if($id){
      $query = $this->db->get_where('users', ['id' => $id]);
      $response = $query->row_array(); 
    } else {
      $query = $this->db->get('users');
      $response = $query->result_array(); 
    }

    return $response;
  }

  public function create_user($password){
   
    $data = [
      'name' => $this->input->post('first_name') . $this->input->post('last_name'),
      'email' => $this->input->post('email'),
      'password_hash' => $password,
      'created_at' => now_date_mysql(),
      'updated_at' => now_date_mysql()
    ];

    $response = $this->db->insert('users', $data);
    
    return $response;
  }

  public function update_user($id, $password){
   
    $data = [
      'name' => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'password_hash' => $password,
      'updated_at' => now_date_mysql()
    ];

    $response = $this->db->update('users', $data, ['id' => $id]);
     
    return $response;
  }

  public function delete_user($id){
  
    $response = $this->db->delete('users', ['id' => $id]);
    
    return $response;
  }

  public function validate_credentials(){
    
    $password = $this->input->post('password');
    $email = $this->input->post('email');
    $query = $this->db->get_where('users', ['email' => $email]);
    if($query->num_rows()){;
      $password_hash = $query->row()->password_hash;
      $response = password_verify($password, $password_hash);
    }else{
      $response = false;
    }

    return $response;
  }
  
}