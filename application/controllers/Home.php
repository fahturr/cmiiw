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

    public function menu()
    {
        $data = $this->user;
        $data['judul'] = 'Menu';

        $this->load->view('templates/header', $data);
        $this->load->view('home/menu');
        $this->load->view('templates/footer');
    }
}
