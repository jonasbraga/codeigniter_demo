<?php
  class Posts extends CI_Controller{  

    public function index(){

      $data = [
        'title' => 'Latest Posts',
        'posts' => $this->post_model->get_posts()
      ];

      $this->load->view('layout/start');  
      $this->load->view('layout/header');
      $this->load->view('posts/index', $data);
      $this->load->view('layout/footer');
      $this->load->view('layout/script');
      $this->load->view('layout/end');
  }

  public function view($slug = NULL){

    $data = [
      'post' => $this->post_model->get_posts($slug)
    ];

    if(empty($data['post'])){
      show_404();
    }

    $this->load->view('layout/start');  
    $this->load->view('layout/header');
    $this->load->view('posts/view', $data);
    $this->load->view('layout/footer');
    $this->load->view('layout/script');
    $this->load->view('layout/end'); 
  }

  public function create(){
    $data = [
      'error' => '',
      'success' => '',
      'categories' => $this->category_model->get_categories() 
    ];

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('body', 'Body', 'required');
    $this->form_validation->set_rules('category', 'Category', 'required');

    if($this->form_validation->run()){      
      $data['success'] = !!$this->post_model->create_post();
      $data['error'] = $data['success'] ? '' : 'Couldn\'t create a new post. Try again later.';
    }

    $this->load->view('layout/start');  
    $this->load->view('layout/header');
    $this->load->view('posts/create', $data);
    $this->load->view('layout/footer');
    $this->load->view('layout/script');
    $this->load->view('layout/end');
  }

  public function edit($slug){
    $data = [
      'post' => $this->post_model->get_posts($slug),
      'categories' => $this->category_model->get_categories(),
      'error' => '',
      'success' => ''
    ];
    
    if(empty($data['post'])){
      show_404();
    }else{
      $data['category'] = $this->category_model->get_categories($data['post']['id']);
    }

    $this->load->view('layout/start');  
    $this->load->view('layout/header');
    $this->load->view('posts/edit', $data);
    $this->load->view('layout/footer');
    $this->load->view('layout/script');
    $this->load->view('layout/end');
  }
  
  public function update($id){
    $data = [
      'error' => '',
      'success' => ''
    ];
  
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('body', 'Body', 'required');
    $this->form_validation->set_rules('category', 'Category', 'required');

    if($this->form_validation->run()){
      $response = $this->post_model->update_post($id);
      $data['success'] = !!$response['update'];
      $data['post'] = $response['post'];
      $data['categories'] = $this->category_model->get_categories();
      
      $data['error'] = $data['success'] ? '' : 'Couldn\'t update the post. Try again later.';
    }else{
      $data = [
        'post' => $this->post_model->get_posts(0, $id),
        'categories' => $this->category_model->get_categories()
      ];
    }

    $this->load->view('layout/start');  
    $this->load->view('layout/header');
    $this->load->view('posts/edit', $data);
    $this->load->view('layout/footer');
    $this->load->view('layout/script');
    $this->load->view('layout/end');
  }

  public function delete($id){
    $this->post_model->delete_post($id);
    redirect('posts');
  }

} 
                