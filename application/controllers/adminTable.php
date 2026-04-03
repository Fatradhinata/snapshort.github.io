<?php
defined('BASEPATH') or exit('No direct script access allowed');

class adminTable extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['user_id' => $this->session->userdata('user_id')])->row_array();

        $this->load->model('User_models', 'users');

        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/SS/UserTableAdmin/index';
        $config['total_rows'] = $this->users->count_all_users();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $data['total_rows'] = $config['total_rows'];
        $data['per_page'] = $config['per_page'];
        $data['start'] = $this->uri->segment(3, 0);

        $data['users'] = $this->users->getUsers($config['per_page'], $data['start']);
        $data['title'] = 'Admin | Snapshort';
        $data['css1'] = "asset/css/page/admin-table.css";
        $data['css2'] = "";
        $this->load->view('templates/Header', $data);
        $this->load->view('UserTable/index');
    }

    public function Content()
    {

        $data['user'] = $this->db->get_where('user', ['user_id' => $this->session->userdata('user_id')])->row_array();

        $this->load->model('Content_models', 'contents');

        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/SS/UserTableAdmin/Content';
        $config['total_rows'] = $this->contents->count_all_contents();
        $config['per_page'] = 3;

        $this->pagination->initialize($config);

        $data['total_rows'] = $config['total_rows'];
        $data['per_page'] = $config['per_page'];
        $data['start'] = $this->uri->segment(3, 0);
        $data['contents'] = $this->contents->getContents($config['per_page'], $data['start']);

        $data['title'] = 'Admin | Snapshort';
        $data['css1'] = "asset/css/page/admin-table.css";
        $data['css2'] = "";
        $this->load->view('templates/Header', $data);
        $this->load->view('ContentTable/index');
    }
    public function deleteUser($user_id)
    {
        $this->db->delete('user', array('user_id' => $user_id));
        redirect('UserTableAdmin');
    }
    
    public function Comment($content_id) {
        $data['user'] = $this->db->get_where('user', ['user_id' => $this->session->userdata('user_id')])->row_array();
    
        $this->load->model('Social_metrics', 'comment');
    
        $this->load->library('pagination');
    
        $config['base_url'] = 'http://localhost/SS/UserTableAdmin/Content';
        $config['total_rows'] = $this->comment->count_all_comments($content_id);
        $config['per_page'] = 10;
    
        $this->pagination->initialize($config);
    
        $data['total_rows'] = $config['total_rows'];
        $data['per_page'] = $config['per_page'];
        $data['start'] = $this->uri->segment(4, 0);
        $data['comments'] = $this->comment->getThisComments($config['per_page'], $data['start'], $content_id);
    
        $data['title'] = 'Admin | Snapshort';
        $data['css1'] = "asset/css/page/admin-table.css";
        $data['css2'] = "";
        $this->load->view('templates/Header', $data);
        $this->load->view('CommentTable/index');

    }

}

/* End of file Clogin.php and path \application\controllers\Clogin.php */
