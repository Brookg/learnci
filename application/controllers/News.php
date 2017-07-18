<?php
    class News extends CI_Controller {
        public function __construct() {
            parent::__construct();
            // 在构造函数中加载model
            $this->load->model('news_model');
            // 加载其它
            $this->load->helper('url_helper');
        }

        public function index() {
            $data['news'] = $this->news_model->get_news();
            $data['title'] = 'News Archive';

            $this->load->view('templates/header', $data);
            $this->load->view('news/index', $data);
            $this->load->view('templates/footer', $data);
        }

        public function view($id = FALSE) {
            $data['news_item'] = $this->news_model->get_news($id);
            $data['title'] = 'Single News';

            if (empty($data['news_item'])) {
                show_404();
            }

            $this->load->view('templates/header', $data);
            $this->load->view('news/view', $data);
            $this->load->view('templates/footer', $data);
        }
    }
?>