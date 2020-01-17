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
      // Upload images
      
      $config = [
        'upload_path' => './assets/images/posts',
        'allowed_types' => 'gif|jpeg|png',
        'max_size' => '3072',
        'max_width' => '500',
        'max_heigth' => '500',
        'file_name' => time()
      ];
      
      $this->load->library('upload', $config);  
      
      if($this->upload->do_upload('image')){
        $image['upload_data'] = $this->upload->data();
        $post_image = $config['file_name'] . '.jpeg';
      } else {
        $data['error'] = $this->upload->display_errors();
        $post_image = 'noimage.jpeg';
      }
      
      // Upload images
      $data['success'] = !!$this->post_model->create_post($post_image);
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
      // Upload images
          
      $config = [
        'upload_path' => './assets/images/posts',
        'allowed_types' => 'gif|jpeg|png',
        'max_size' => '3072',
        'max_width' => '500',
        'max_heigth' => '500',
        'file_name' => time()
      ];
      
      $this->load->library('upload', $config);  
      $old_image_name = $this->post_model->get_posts(0, $id)['image'];
      
      if($this->upload->do_upload('image')){
        $image['upload_data'] = $this->upload->data();
        $post_image = $config['file_name'] . '.jpeg';
        unlink("assets/images/posts/$old_image_name");
      } else {
        $post_image = $old_image_name; 
        $data['error'] = $this->upload->display_errors();
      }
      
      // Upload images

      $response = $this->post_model->update_post($id, $post_image);
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
                