<?php
  class Categories extends CI_Controller{  

    public function index(){

      $data = [
        'categories' => $this->category_model->get_categories()
      ];

      $this->load->view('layout/start');  
      $this->load->view('layout/header');
      $this->load->view('categories/index', $data);
      $this->load->view('layout/footer');
      $this->load->view('layout/script');
      $this->load->view('layout/end');
    }

    public function create(){
      $data = [
        'error' => '',
        'success' => ''
      ];

      $this->form_validation->set_rules('name', 'Name', 'required');

      if($this->form_validation->run()){      
        $data['success'] = !!$this->category_model->create_category();
        $data['error'] = $data['success'] ? '' : 'Couldn\'t create a new category. Try again later.';
      }

      $this->load->view('layout/start');  
      $this->load->view('layout/header');
      $this->load->view('categories/create', $data);
      $this->load->view('layout/footer');
      $this->load->view('layout/script');
      $this->load->view('layout/end');
    }

    public function edit($id){
      $data = [
        'category' => $this->category_model->get_categories($id),
        'error' => '',
        'success' => ''
      ];
      
      if(empty($data['category'])){
        show_404();
      }

      $this->load->view('layout/start');  
      $this->load->view('layout/header');
      $this->load->view('categories/edit', $data);
      $this->load->view('layout/footer');
      $this->load->view('layout/script');
      $this->load->view('layout/end');
    }
    
    public function update($id){
      $data = [
        'error' => '',
        'success' => ''
      ];
    
      $this->form_validation->set_rules('name', 'Name', 'required');

      if($this->form_validation->run()){
        $response = $this->category_model->update_category($id);
        $data['success'] = !!$response['update'];
        $data['category'] = $response['category'];
        $data['error'] = $data['success'] ? '' : 'Couldn\'t update the post. Try again later.';
      }else{
        $data['category'] = $this->category_model->get_categories($id);
      }

      $this->load->view('layout/start');  
      $this->load->view('layout/header');
      $this->load->view('categories/edit', $data);
      $this->load->view('layout/footer');
      $this->load->view('layout/script');
      $this->load->view('layout/end');
    }

    public function delete($id){
      $this->category_model->delete_category($id);
      redirect('categories');
    }
  } 
                