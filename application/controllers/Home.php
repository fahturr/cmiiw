<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    private $user;
    public function __construct()
    {
        parent::__construct();
        $this->user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if (!$this->user) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data = $this->user;
        $data['judul'] = 'Home';

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }


    public function troley()
    {
        $data = $this->user;
        $data['judul'] = 'Troley';

        $this->load->view('templates/header', $data);
        $this->load->view('home/troley');
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data = $this->user;
        $data['judul'] = 'Troley';

        $this->load->view('templates/header', $data);
        $this->load->view('home/profile');
        $this->load->view('templates/footer');
    }
}
