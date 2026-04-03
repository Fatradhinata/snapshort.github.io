<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $input_value = $this->input->post('email-us');

        if (filter_var($input_value, FILTER_VALIDATE_EMAIL)) {
            $this->form_validation->set_rules('email-us', 'Email', 'trim|required|valid_email');
        } else {
            $this->form_validation->set_rules('email-us', 'Username', 'trim|required', [
                'required' => 'username cannot be empty'
            ]);
        }

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login | Snapshort';
            $this->load->view('Autentikasi/Header', $data);
            $this->load->view('Autentikasi/Login');
            $this->load->view('Autentikasi/AuthJS');
        } else {
            $this->login_();
        }
    }

    private function login_()
    {
        $input_value = $this->input->post('email-us');

        $password = $this->input->post('password');

        if (filter_var($input_value, FILTER_VALIDATE_EMAIL)) {
            $emailUs = $this->input->post('email-us');
            $user = $this->db->get_where('user', ['email' => $emailUs])->row_array();
        } else {
            $emailUs = $this->input->post('email-us');
            $user = $this->db->get_where('user', ['username' => $emailUs])->row_array();
        }

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $actorData = [
                    'user_id' => $user['user_id'],
                    'email' => $user['email'],
                    'level' => $user['level']
                ];

                $this->session->set_userdata($actorData);
                redirect('Home');
            } else {
                $this->session->set_flashdata('error', '<div class="unvalid-alert">Wrong Password !</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('error', '<div class="unvalid-alert">Unvalid Username or Email !</div>');
            redirect('Auth');

        }

    }

    public function Registration()
    {
        $this->form_validation->set_rules('inp-fs', 'First Name', 'required|trim');
        $this->form_validation->set_rules('inp-ls', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('inp-email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email has ben taken!'
        ]);
        $this->form_validation->set_rules('pass', 'Password', 'required|trim|min_length[8]');
        $this->form_validation->set_rules('pass2', 'Confirm Password', 'required|trim|matches[pass]', [
            'matches' => 'Password dont match!',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register | Snapshort';
            $this->load->view('Autentikasi/Header', $data);
            $this->load->view('Autentikasi/Register');
            $this->load->view('Autentikasi/AuthJS');
        } else {
            $first_name = $this->input->post('inp-fs');
            $last_name = $this->input->post('inp-ls');
            $full_name = $first_name . ' ' . $last_name;

            // Generate unique user_id
            $user_id_unique = false;
            while (!$user_id_unique) {
                $user_id = substr(uniqid(), -9);
                $query = $this->db->get_where('user', array('user_id' => $user_id));
                if ($query->num_rows() == 0) {
                    $user_id_unique = true;
                }
            }

            // Generate unique username
            // $username_unique = false;
            // while (!$username_unique) {
            //     $random_number = mt_rand(100000, 999999);
            //     $username = 'user' . $random_number;
            //     $query = $this->db->get_where('user', array('username' => $username));
            //     if ($query->num_rows() == 0) {
            //         $username_unique = true;
            //     }
            // }

            $data = [
                'user_id' => $user_id,
                'username' => '',
                'password' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
                'level' => 'User',
                'name' => htmlspecialchars($full_name),
            ];

            $this->sendOtp(htmlspecialchars($this->input->post('inp-email')), $data);


            // $this->db->insert('user', $data);

            // $user = $this->db->get_where('user', ['user_id' => $user_id])->row_array();
            // $actorData = [
            //     'user_id' => $user['user_id'],
            //     'email' => $user['email']
            // ];

            // $this->session->set_userdata($actorData);
            // redirect('Home');
        }
    }

    private function sendOtp($email, $data)
    {
        $data['email'] = $email;

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'snapshort11@gmail.com';
        $config['smtp_pass'] = 'jzux hbnz dpcb zfgd';
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";

        $otp = random_string('numeric', 6);

        $this->session->set_userdata('otp', $otp);
        $this->session->set_userdata('email', $email);

        $subject = "OTP Verification";
        $message = "Your OTP for registration is: $otp";

        $this->email->initialize($config);

        $this->email->from('snapshort11@gmail.com', 'Snapshort');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()) {
            $this->session->set_userdata($data);
            $this->session->set_userdata('otp', $otp);

            redirect('EmailVerificate');
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect("Auth");
    }
}

/* End of file Clogin.php and path \application\controllers\Clogin.php */