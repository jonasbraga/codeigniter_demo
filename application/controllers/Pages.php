<?php
    class Pages extends CI_Controller{  

        public function view($page = 'home'){
            if (!file_exists(APPPATH."views/pages/$page.php")) {
                show_404();
            }

            $data = [
                'title' => ucfirst($page)
            ];

            $this->load->view('layout/start');  
            $this->load->view('layout/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('layout/footer');
            $this->load->view('layout/script');
            $this->load->view('layout/end');
        }
    } 
                 