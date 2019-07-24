<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        // require_once APPPATH . 'third_party/vendor/autoload.php';

        // if ($this->session->userdata('access_token')) {
        //     $profile =  $this->session->userdata('access_profile');
        //     var_dump($profile);
        //     echo "<img src=\"{$profile['image']['url']}\">";
        //     echo "<h3>Hai, {$profile['displayName']} ({$profile['emails']['0']['value']})</h3>";
        //     echo "Anda telah berhasil login menggunakan akun google anda, klik <a href='logout.php'>Logout</a> untuk keluar.";
        // } else {
        //     echo "<a href=" . base_url('auth/glogin') . ">Login dengan Akun Google</a>";
        // }

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        echo 'Selamat datang, ' . $user['nama_user'];
    }
}
