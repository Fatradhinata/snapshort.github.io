<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SetUpProfile extends CI_Controller
{
    public function index()
    {
        $insert = [
            'user_id' => $this->session->userdata('user_id'),
            'username' => $this->session->userdata('username'),
            'password' => $this->session->userdata('password'),
            'level' => $this->session->userdata('level'),
            'name' => $this->session->userdata('name'),
            'email' => $this->session->userdata('email')
        ];

        $otp = $this->session->userdata('otp');

        $data['title'] = 'setUpProfile | Snapshort';        
        $data['name'] = $insert['name'];
        $this->load->view('Autentikasi/Header', $data);
        $this->load->view('Autentikasi/Set-up/setup-user');
        $this->load->view('Autentikasi/AuthJS');
    }

    public function lastCheck() {
        $image = file_get_contents($_FILES['profile-picture']['tmp_name']);
        $username = $this->input->post('username');
        $fullname = $this->input->post('fullname');
        $insert = [
            'user_id' => $this->session->userdata('user_id'),
            'username' => $username,
            'password' => $this->session->userdata('password'),
            'level' => $this->session->userdata('level'),
            'name' => $fullname,
            'email' => $this->session->userdata('email'),
            'profile_picture' => $image
        ];

        if ($this->db->insert('user', $insert)) {
            $user_id = $this->session->userdata('user_id');
            $user = $this->db->get_where('user', ['user_id' => $user_id])->row_array();
            $actorData = [
                'user_id' => $user['user_id'],
                'email' => $user['email']
            ];
            
            $this->session->set_userdata($actorData);

            redirect("Home");
        } else {
            echo "Data gagal di insert ke database";
        }

    }
}