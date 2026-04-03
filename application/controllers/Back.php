<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Back extends CI_Controller
{
    public function somePage() {
        // Simpan URL referer dalam session
        $this->session->set_userdata('referer', $_SERVER['HTTP_REFERER']);
    }
    
    public function index() {
        // Ambil URL referer dari session
        $referer = $this->session->userdata('referer');
        echo $referer;
        if ($referer) {
            redirect($referer);
        } else {
            // Atur fallback jika referer tidak ada
        }
    }
    
}