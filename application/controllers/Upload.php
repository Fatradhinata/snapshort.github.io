<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Follows');
        $this->load->model('Likes');
        // $this->load->model('Content_models');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['user_id' => $this->session->userdata('user_id')])->row_array();
        $data['title'] = 'Upload | Snapshort';
        $data['css2'] = "asset/css/page/Upload.css";
        $data['css1'] = "";

        $error = $this->session->flashdata('error'); // Ambil pesan kesalahan dari flashdata

        $this->load->view('templates/Header', $data);

        if ($error) {
            $this->load->view('Upload/index', $error); // Tampilkan pesan kesalahan jika ada
        } else {
            $this->load->view('Upload/index');
        }
    }

    public function setVideoDesc()
    {
        date_default_timezone_set('Asia/Jakarta');
        $user_id = $this->session->userdata('user_id');

        if (!$user_id) {
            redirect('Auth');
        } else {
            $caption = $this->input->post('caption');
            $categories = implode(',',$this->input->post('category-select'));
            $privacy = $this->input->post('privacy');    
            
            
            $folder_path = FCPATH . 'asset/video/' . $user_id;
            
            if (!is_dir($folder_path)) {
                mkdir($folder_path, 0777, true);
            }
            
            if (is_dir($folder_path)) {
                $random_name = substr(md5(time()), 0, 13);
                $config['file_name'] = $random_name;
                $config['upload_path'] = $folder_path;
                $config['allowed_types'] = '*';
                $this->upload->initialize($config);
                
                if (!$this->upload->do_upload('file-input-core')) {
                    $error['upload_error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error); // Simpan pesan kesalahan dalam flashdata
                    redirect('Upload');
                } else {
                    $rand_num = '';
                    $is_unique = false;
                    
                    while (!$is_unique) {
                        $rand_num = '';
                        for ($i = 0; $i < 11; $i++) {
                            $random_digit = mt_rand(0, 9);
                            $rand_num .= $random_digit;
                        }
                    
                        $query = $this->db->get_where('content', array('id' => $rand_num));
                        if ($query->num_rows() == 0) {
                            $is_unique = true;
                        }
                    }
                    
                    $content = array(
                        'id' => $rand_num,
                        'user_id' => $user_id,
                        'video' => $random_name,
                        'caption' => $caption,
                        'privacy' => $privacy,
                        'categories' => $categories,
                        'date' => date('Y-m-d H:i:s'),
                    );
                    
                    $this->db->insert('content', $content);

                    redirect('Profile');
                }
            } else {
                echo 'Error';
            }
        }
    }
}

/* End of file Clogin.php and path \application\controllers\Clogin.php */