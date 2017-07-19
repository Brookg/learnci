<?php
    class News_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function get_news($id = FALSE) {
            if ($id === FALSE) {
                $query = $this->db->get('news');
                return $query->result_array();
            }

            $query = $this->db->get_where('news', array('id' => $id));
            return $query->row_array();
        }

        public function set_news() {
            $this->load->helper('url');
            
            // url_title : 将字符串中的所有空格替换成连接符（-），并将所有字符转换为小写
            // input类的post方法，用于对输入的数据进行过滤
            $slug = url_title($this->input->post('title'), 'dash', TRUE);

            $data = array(
                'title' => $this->input->post('title'),
                'slug'  => $slug,
                'text'  => $this->input->post('text')
            );

            return $this->db->insert('news', $data);
        }
    }
?>