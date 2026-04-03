<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Explore extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Content_models');
    }

    public function index()
    {
        $data['contents'] = $this->Content_models->getAllContent();
        $data['user_content'] = $this->Content_models->getUserContent($data['contents'], $this->session->userdata('user_id'));

        foreach ($data['contents'] as $key => $ctn) {
            $data['contents'][$key]['likes'] = $this->Content_models->getContentLikes($ctn['id']);
        }

        $data['user'] = $this->db->get_where('user', ['user_id' => $this->session->userdata('user_id')]) -> row_array();      
        $data['title'] = 'Explore | Snapshort';
        $data['css2'] = "asset/css/page/Explore.css";
        $data['css1'] = "";
        $this->load->view('templates/Header', $data);
        $this->load->view('Explore/index');
    }
}

/* End of file Clogin.php and path \application\controllers\Clogin.php */
