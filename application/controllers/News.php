<?php
    class News extends CI_Controller {
        public function __construct() {
            parent::__construct();
            // 在构造函数中加载model
            $this->load->model('news_model');
            // 加载url辅助函数
            $this->load->helper('url');
            // 加载分析器类
            $this->output->enable_profiler(TRUE);
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

        public function create() {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Create a news item';

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('text', 'Content', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('news/create', $data);
                $this->load->view('templates/footer');
            } else {
                $this->news_model->set_news();
                $this->load->view('templates/header', $data);
                $this->load->view('news/success');
                $this->load->view('templates/footer');
            }
        }
    }
?>