<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Following extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Content_models');
        $this->load->model('Follows');
        $this->load->model('Likes');
    }

    public function index()
    {
        $own_user_id = $this->session->userdata('user_id');
        $data['user'] = $this->db->get_where('user', ['user_id' => $this->session->userdata('user_id')])->row_array();
        $data['followed_content'] = $this->Content_models->get_followed_content($this->session->userdata('user_id'));
        // var_dump($this->session->userdata('user_id'));die;

        if ($data['followed_content'] != null) {
            $user_id = [];
            foreach ($data['followed_content'] as $key => $ctn) {
                $user_id[] = $ctn['user_id'];
            }
            ;

            $this->db->select('*');
            $this->db->from('user');
            $this->db->where_in('user_id', $user_id);
            $this->db->order_by("FIELD(user_id, " . implode(', ', array_map(function ($val) {
                return "'" . $val . "'";
            }, $user_id)) . ")");

            $data['user_content'] = $this->db->get()->result_array();

            foreach ($data['user_content'] as $key => $value) {
                $data['user_content'][$key]['profile_picture'] = base64_encode($data['user_content'][$key]['profile_picture']);
                $data['user_content'][$key]['is_following'] = $this->Follows->is_following($own_user_id, $data['user_content'][$key]['user_id']);
                $data['user_content'][$key]['total_like'] = $this->Likes->getTotalLike($data['followed_content'][$key]['id']);
                $data['user_content'][$key]['is_liked'] = $this->Likes->is_liked($own_user_id, $data['followed_content'][$key]['id']);
                $data['user_content'][$key]['followers'] = $this->Follows->getTotalFollowers($data['user_content'][$key]['user_id']);
            }

            $sortedArray = [];

            foreach ($data['followed_content'] as $item1) {
                $user_id1 = $item1['user_id'];

                foreach ($data['user_content'] as $item2) {
                    $user_id2 = $item2['user_id'];

                    if ($user_id1 === $user_id2) {
                        $sortedArray[] = $item2;
                        break;
                    }
                }
            }

            $data['user_content'] = $sortedArray;
        } else {
            $data['empty_content'] = true;
        }

        $data['title'] = 'Following | Snapshort';
        $data['css1'] = "asset/css/page/following-responsive.css";
        $data['css2'] = "asset/css/page/following.css";
        $this->load->view('templates/Header', $data);
        $this->load->view('Following/index');
    }
}

/* End of file Clogin.php and path \application\controllers\Clogin.php */
