<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fullscreen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Content_models');
        $this->load->model('Social_metrics');
        $this->load->model('Likes');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['user_id' => $this->session->userdata('user_id')])->row_array();
        if ($data['user'] != null) {
        $pp = $data['user']['profile_picture'];
        $data['user']['profile_picture'] = base64_encode($pp);
        }
        $user_id = $this->uri->segment(3);
        $data['user_content'] = $this->db->get_where('user', array('user_id' => $user_id))->row_array();
        $data['user_id'] = $this->session->userdata('user_id');
        $content_id = $this->uri->segment(4);

        $directory_path = FCPATH . 'asset/video/';

        if (is_dir($directory_path)) {
            $iterator = new DirectoryIterator($directory_path);
            $folders = array();

            foreach ($iterator as $item) {
                if ($item->isDir() && !$item->isDot()) {
                    $folders[] = $item->getFilename();
                }
            }

            if (in_array($user_id, $folders)) {
                $data['content'] = $this->db->get_where('content', ['id' => $content_id])->row_array();
                $data['is_avaible_content'] = true;
            } else {
                $data['is_avaible_content'] = false;
            }
        } else {
            $data['is_avaible_content'] = false;
        }
        $pp = $data['user_content']['profile_picture'];
        $data['user_content']['profile_picture'] = base64_encode($pp);
        $data['user_content']['total_like'] = $this->Likes->getTotalLike($data['content']['id']);
        $data['user_content']['is_liked'] = $this->Likes->is_liked($this->session->userdata('user_id'), $data['content']['id']);

        $data['comments'] = $this->Social_metrics->getComments($content_id);

        $user_id_comment = [];
        foreach ($data['comments'] as $key => $comment) {
            $user_id_comment[] = $comment['user_id'];
        }

        if ($user_id_comment != null) {
            $data['user_comment'] = $this->Social_metrics->getUserComment($user_id_comment);

            foreach ($data['user_comment'] as $key => $value) {
                $data['user_comment'][$key]['profile_picture'] = base64_encode($data['user_comment'][$key]['profile_picture']);
            }
        }

        $sortedArray = [];

        foreach ($data['comments'] as $item1) {
            $user_id1 = $item1['user_id'];

            foreach ($data['user_comment'] as $item2) {
                $user_id2 = $item2['user_id'];

                if ($user_id1 === $user_id2) {
                    $sortedArray[] = $item2;
                    break;
                }
            }
        }
        
        $data['user_comment'] = $sortedArray;

        foreach ($data['comments'] as $key => $comment) {
            if (count($comment['replies']) != 0) {
                $data['user_comment'][$key]['replies_user'] = array();
                foreach ($comment['replies'] as $reply) {
                    $data['user_comment'][$key]['replies_user'][] = $this->Social_metrics->getUserReplyComment($reply['user_id']);
                }
            }
        }
        
        $this->Content_models->update_view($content_id);

        $data['total_comment'] = $this->Social_metrics->getTotalComment($content_id);
        $this->load->view('Fullscreen/index', $data);
    }

}

/* End of file Clogin.php and path \application\controllers\Clogin.php */
