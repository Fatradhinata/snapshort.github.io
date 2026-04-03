<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Follows');
        $this->load->model('Likes');
        $this->load->model('Social_metrics');
    }

    public function index()
    {

        // while (count($current_vid) < 3) {
        //     $count = count($data['content']);
        //     $random_number = rand(0, $count - 1);
        //     $random_no = $data['content'][$random_number]['no'];
        //     $current_vid[] = $random_no;

        // }

        // $user_id_same = true;

        // $batas = 100;
        // $logThis = 0;
        // while ($user_id_same) {
        //     $_user_id = [];
        //     $isSame = false;
        //     foreach ($data['content'] as $key => $ctn) {
        //         echo 'Data ' . $key . ' = ';
        //         echo $ctn['user_id'];
        //         // echo '<br>';
        //         $_user_id[] = $ctn['user_id'];

        //         if (array_count_values($_user_id)[$ctn['user_id']] > 1) {
        //             $duplicate_value = $ctn['no'];

        //             $count = count($data['content']);
        //             $random_number = rand(0, $count - 1);
        //             $new_vid = $data['content'][$random_number]['no'];

        //             while ($new_vid == $duplicate_value) {
        //                 $count = count($data['content']);
        //                 $random_number = rand(0, $count - 1);
        //                 $new_vid = $data['content'][$random_number]['no'];
        //             }

        //             $data['content'][$key] = $this->db->get_where('content', ['no' => $new_vid])->row_array();
        //             echo 'Duplicate = ' . $duplicate_value . ' <br>New = ' . $new_vid . ' <br>';
        //             echo 'us_id = ' . $data['content'][$key]['user_id'] . ', NO = ' . $data['content'][$key]['no'];
        //             echo ' Key = ' . $key . '<br>';
        //             $isSame = true;
        //         }
        //     }
        //     if (!$isSame) {
        //         $user_id_same = false;
        //     }

        //     $logThis += 1;
        //     echo '<br>' . $logThis . '<hr>';
        //     if ($logThis >= $batas) {
        //         break;
        //     }
        // }
        // }
        // // die;
        // var_dump($data['content']);
        // die;
        $own_user_id =  $this->session->userdata('user_id');
        if ($own_user_id != null) {
        $data['user'] = $this->db->get_where('user', ['user_id' => $this->session->userdata('user_id')])->row_array();
    } else {
        $data['user'] = null;
        }
        $this->db->select('no, user_id');
        $this->db->from('content');
        $query = $this->db->get();
        $data['content'] = $query->result_array();

        shuffle($data['content']);

        $filtered_data = [];
        $seen_no = [];
        $seen_user_id = [];

        foreach ($data['content'] as $row) {
            if (!in_array($row['no'], $seen_no) && !in_array($row['user_id'], $seen_user_id)) {
                $filtered_data[] = $row;
                $seen_no[] = $row['no'];
                $seen_user_id[] = $row['user_id'];
            }

            if (count($filtered_data) >= 10) {
                break;
            }
        }

        $data['content'] = $filtered_data;

        $no_values = array_column($data['content'], 'no');
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where_in('no', $no_values);
        $this->db->order_by('RAND()'); 
        $data['content'] = $this->db->get()->result_array();
        

        $user_id = [];
        foreach ($data['content'] as $key => $ctn) {
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
            $data['user_content'][$key]['total_like'] = $this->Likes->getTotalLike($data['content'][$key]['id']);
            $data['user_content'][$key]['total_comment'] = $this->Social_metrics->getTotalComment($data['content'][$key]['id']);

            if (isset($own_user_id)) {
            $data['user_content'][$key]['is_following'] = $this->Follows->is_following($data['user_content'][$key]['user_id'], $own_user_id);
            $data['user_content'][$key]['is_liked'] = $this->Likes->is_liked($own_user_id, $data['content'][$key]['id']);
            $data['user_content'][$key]['followers'] = $this->Follows->getTotalFollowers($data['user_content'][$key]['user_id']);
            $data['user_content'][$key]['following'] = $this->Follows->getTotalFollowed($data['user_content'][$key]['user_id']);
        } else {
            $data['user_content'][$key]['is_following'] = null;
            $data['user_content'][$key]['is_liked'] = null;

        }
        }
        
        $data['title'] = 'Home | Snapshort';
        $data['css1'] = 'asset/css/page/home-responsive.css';
        $data['css2'] = 'asset/css/page/home.css';

        $this->load->view('templates/Header', $data);
        $this->load->view('Home/index');
        $this->load->view('templates/Footer');

    }    
}



/* End of file Clogin.php and path \application\controllers\Clogin.php */
