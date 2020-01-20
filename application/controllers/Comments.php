<?php
  class Comments extends CI_Controller{  

    public function create($slug){

      $data = [
        'error' => '',
        'success' => ''
      ];

      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('comment', 'Comment', 'required');

      if ($this->form_validation->run()) { 
        $response = $this->comment_model->create_comment();
        $data['success'] = $response;
        $data['error'] = !$response ? 'An error occurred while processing your request, try again later.' : '';
      }
      
      redirect('posts/'.$slug);
    }

    public function delete($id){
      $this->comment_model->delete_comment($id);
      redirect('comments');
    }
  } 
                