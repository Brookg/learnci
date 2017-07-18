<?php

    class Pages extends CI_Controller
    {
        public function view($page = 'home') {
            // 首先检查请求的页面是否存在
            if (! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
                show_404();
            }
            
            // 准备传入的数据
            $data['title'] = ucfirst($page);
            
            // 按顺序加载所需的视图
            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
        }
    }
    
?>