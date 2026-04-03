<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserMetrics extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Follows');
        $this->load->model('Likes');
        $this->load->model('Social_metrics');
        $this->load->model('Content_models');
    }
    public function Follow($id)
    {
        $user = $this->Follows->getUserById($id);

        if ($user) {
            $follower_id = $this->session->userdata('user_id');
            $followed_id = $user->user_id;

            if ($follower_id != $followed_id) {
                if (!$this->Follows->is_following($follower_id, $followed_id)) {
                    $this->Follows->follow($follower_id, $followed_id);
                    $response = ['status' => 'followed'];
                } else {
                    $this->Follows->unfollow($follower_id, $followed_id);
                    $response = ['status' => 'unfollowed'];
                }
            } else {
                $response = ['status' => 'error', 'message' => 'You cannot follow yourself'];
            }
        } else {
            $response = ['status' => 'error', 'message' => 'User not found'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function like($id)
    {
        $content = $this->Likes->getContentById($id);
        if ($content) {
            $user_id = $this->session->userdata('user_id');
            $content_id = $content->id;
            if (!$this->Likes->is_liked($user_id, $content_id)) {
                $this->Likes->like($user_id, $content_id);
                $response = ['status' => 'Liked'];
                // var_dump($response);die;
                // echo 'asdsad';die;
            } else {
                $this->Likes->unlike($user_id, $content_id);
                $response = ['status' => 'Unlike'];
            }

            $totalLikes = $this->Likes->getTotalLike($content_id);
            $response = ['total' => $totalLikes];
        } else {
            $response = ['status' => 'error', 'messege' => 'Content not found'];
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function Comment()
    {
        $data = $this->input->post();
        $user_id = $this->input->post('user_id');
        $content_id = $this->input->post('content_id');
        $replyId = $this->input->post('replyId');
        $comment = $this->input->post('comment');
        if (isset($_FILES['audio']['tmp_name'])) {
        $voice_note = file_get_contents($_FILES['audio']['tmp_name']);
        } else {
            $voice_note = null;
        }

        $query = $this->db->get_where('comment', array('id' => $replyId))->row_array();

        if ($query != null) {
            $replyId = $query['id'];    
        } else {
            $replyId = null;
        }

        $this->Social_metrics->createComment($user_id, $content_id, $comment, $voice_note, $replyId); // memanggil model sebelum mengirim respon

        $response['comment'] = $this->Social_metrics->getNewComment($content_id);
        // $response['content_id'] = $content_id;
        // $response['comment'] = $comment;
        $response['reply'] = $replyId;

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function Category()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $own =  $this->session->userdata['user_id'];
        $dataArray = isset($_POST['data']) ? $_POST['data'] : (isset($data['data']) ? $data['data'] : null);
    
        if ($dataArray !== null) {
            if ($own != null) {
            $contents = $this->Content_models->get_content_from_cat($dataArray, $this->session->userdata['user_id']);
        } else {
            $contents = $this->Content_models->get_content_from_cat_without($dataArray);
            }
            $response['data'] = $contents;
        } else {
            $response['default'] = true;
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    } 

    public function Report()
    {
        $reported_id = $this->input->post('reported_id');
        $reporting_user = $this->input->post('reporting_user');
        $reason = $this->input->post('reason');
        $type = $this->input->post('type');
        
        $insert = [
            'reported_id' => $reported_id,
            'reporting_user' => $reporting_user,
            'reason' => $reason,
            'type' => $type,
        ];        
    
        if($this->db->insert('report', $insert)) {
            $response['done'] = 'avaible';
            $response['dones'] = $reporting_user;
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    } 
}