<?php
  class Comments extends CI_Controller{  

    public function create($post_id){
      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('comment', 'Comment', 'required');

      if($this->form_validation->run()){
          $response = $this->comment_model->create_comment();


      }else{


      }
    }

    public function delete($id){
      $this->category_model->delete_category($id);
      redirect('categories');
    }
  } 
                