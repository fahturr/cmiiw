<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    private $user;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->user['total'] = $this->User_model->totalBelanja($this->session->userdata('email'));

        if (!$this->user) {
            if ($this->user['id_role'] == 2) {
                redirect('admin');
            } else {
                redirect('auth');
            }
        }
    }

    public function index()
    {
        $data = $this->user;
        $data['judul'] = 'Menu';
        $data['query'] = $this->db->get('menu')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('home/menu', $data);
        $this->load->view('templates/footer');
    }

    public function pesan()
    {
        $data = $this->user;
        $id = $this->input->post('id');
        $harga = $this->input->post('harga');
        var_dump($data);

        $datai = [
            'id_menu' => $id,
            'id_user' => $data['id_user'],
            'jumlah' => $harga
        ];

        $this->db->insert('troli', $datai);
        redirect('menu');
    }
}
