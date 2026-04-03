<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmailVerificate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
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
        $otpInput = $this->input->post('otp');

        if ($otpInput != null) {
        checkOtp($insert, $otp, $otpInput);
        } else {    
        $data['title'] = 'Email Verification | Snapshort';
        $data['email'] = $insert['email'];
        $this->load->view('Autentikasi/Header', $data);
        $this->load->view('Autentikasi/EmailVerification');
        $this->load->view('Autentikasi/AuthJS');
        }
    }

    private function checkOtp($data, $otp, $userOtp) {
        if ($otp == $userOtp) {
            $this->session->set_userdata($data);
            $this->session->set_userdata('otp', $otp);
            redirect('setUpProfile');
        } else {
            echo "otp still wrong";die;
        }
    }
    
}