<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
        $data['judul'] = 'Home';

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function troley()
    {
        $data = $this->user;
        $data['judul'] = 'Troley';
        $data['troli'] = $this->User_model->dataTroli($this->session->userdata('email'));
        $data['jumlah'] = $this->User_model->totalBayar($this->session->userdata('email'));

        $this->load->view('templates/header', $data);
        $this->load->view('home/troley', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data = $this->user;
        $data['judul'] = 'Profil';


        $this->load->view('templates/header', $data);
        $this->load->view('home/profile', $data);
        $this->load->view('templates/footer');
    }

    public function hapus()
    {
        $id = $this->input->post('id');

        $this->db->delete('troli', array('id_troli' => $id));
        redirect('home/troley');
    }

    public function edit()
    {
        $data = $this->user;
        $data['judul'] = 'Edit User';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('home/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            $image = $_FILES['image']['name'];

            if ($image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/users/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama_user', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
                    Profil berhasil di update!
                </div>'
            );
            redirect('home/profile');
        }
    }
}
