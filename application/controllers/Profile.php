<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('file');
        $this->load->helper('directory');
        $this->load->model('Follows');
        $this->load->model('likes');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['user_id' => $this->session->userdata('user_id')])->row_array();
        
        $directory_path = FCPATH . 'asset/video/';
        $folders = directory_map($directory_path);
        if ($folders) {
            $userDirectory = $data['user']['user_id'] . '\\';

            if (isset($folders[$userDirectory])) {
                $data['content'] = $this->db->get_where('content', ['user_id' => $this->session->userdata('user_id')])->result_array();
                $data['is_avaible_content'] = true;
            } else {
                $data['is_avaible_content'] = false;
            }
        } else {
            $data['is_avaible_content'] = false;
        }

        $content_array_id = [];

        if (isset($data['content'])) {
            foreach ($data['content'] as $key => $ctn) {
                $content_array_id[] = $ctn['id'];
            }
        }
        
        $pp = $data['user']['profile_picture'];
        $data['user']['profile_picture'] = base64_encode($pp);
        $data['user']['followers'] = $this->Follows->getTotalFollowers($data['user']['user_id']);
        $data['user']['followed'] = $this->Follows->getTotalFollowed($data['user']['user_id']);
        $data['user']['total_liked'] = $this->likes->getUserTotalLikes($content_array_id);

        $data['title'] = 'Profile | Snapshort';
        $data['css2'] = "asset/css/page/Profile.css";
        $data['css1'] = "";
        $this->load->view('templates/Header', $data);
        $this->load->view('Profile/index');
    }

    public function updateProfile()
    {
        if (isset($_FILES['profile-pictures']['tmp_name']) && !empty($_FILES['profile-pictures']['tmp_name'])) {
            $pp = file_get_contents($_FILES['profile-pictures']['tmp_name']);
            $update = array(
                'username' => strtolower($this->input->post('username')),
                'name' => $this->input->post('name'),
                'bio' => $this->input->post('bio'),
                'email' => $this->input->post('email'),
                'profile_picture' => $pp
            );
        } else {
            $update = array(
                'username' => strtolower($this->input->post('username')),
                'name' => $this->input->post('name'),
                'bio' => $this->input->post('bio'),
                'email' => $this->input->post('email')
            );

        }
        $user_id = $this->session->userdata('user_id');

        $this->db->where('user_id', $user_id);
        $this->db->update('user', $update);

    }

    public function anotherUser($user_id) {
        $data['own_user'] = $this->db->get_where('user', ['user_id' => $this->session->userdata('user_id')])->row_array();
        $data['user'] = $this->db->get_where('user', ['user_id' => $user_id])->row_array();
        
        if ($data["own_user"] != null && $data['own_user']['user_id'] == $data['user']['user_id']) {
            redirect("Profile");
        }

        $directory_path = FCPATH . 'asset/video/';
        $folders = directory_map($directory_path);
        if ($folders) {
            $userDirectory = $data['user']['user_id'] . '\\';

            if (isset($folders[$userDirectory])) {
                $data['content'] = $this->db->get_where('content', ['user_id' => $user_id])->result_array();
                $data['is_avaible_content'] = true;
            } else {
                $data['is_avaible_content'] = false;
            }
        } else {
            $data['is_avaible_content'] = false;
        }

        $content_array_id = [];

        if (isset($data['content'])) {
            foreach ($data['content'] as $key => $ctn) {
                $content_array_id[] = $ctn['id'];
            }
        }
        
        $pp = $data['user']['profile_picture'];
        $data['user']['profile_picture'] = base64_encode($pp);
        $data['user']['followers'] = $this->Follows->getTotalFollowers($data['user']['user_id']);
        $data['user']['followed'] = $this->Follows->getTotalFollowed($data['user']['user_id']);
        $data['user']['total_liked'] = $this->likes->getUserTotalLikes($content_array_id);
        if($data['own_user'] != null) {
        $data['user']['is_following'] = $this->Follows->is_following($data['own_user']['user_id'], $user_id);
        }
        $data['title'] = 'Profile | Snapshort';
        $data['css2'] = "asset/css/page/Profile.css";
        $data['css1'] = "";

        $data['another_user'] = true;

        $this->load->view('templates/Header', $data);
        $this->load->view('Profile/index');
    }
}

/* End of file Clogin.php and path \application\controllers\Clogin.php */
