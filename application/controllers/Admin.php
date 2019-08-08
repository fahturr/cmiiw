<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    private $user;

    public function __construct()
    {
        parent::__construct();
        $this->user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

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
        $data['judul'] = 'Pesanan';

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/pesanan', $data);
        $this->load->view('templates/admin_footer');
    }

    public function profile()
    {
        $data = $this->user;
        $data['judul'] = 'Profile';

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/admin_footer');
    }

    public function menu()
    {
        $data = $this->user;
        $data['judul'] = 'Menu';
        $data['query'] = $this->db->get('menu')->result_array();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/menu', $data);
        $this->load->view('templates/admin_footer');
    }

    public function edit()
    {
        $this->load->library('form_validation');
        $data = $this->user;
        $data['judul'] = 'Edit Profile';

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/edit', $data);
            $this->load->view('templates/admin_footer');
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
            redirect('admin/profile');
        }
    }

    public function tambahMenu()
    {
        $user = $this->user;
        $image = $_FILES['image']['name'];

        if ($image) {
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/menus/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $image = $new_image;
            } else {
                $image = 'default.png';
                echo $this->upload->display_errors();
            }
        }

        $data = [
            'nama_menu' => $this->input->post('menu'),
            'gambar_menu' => $image,
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi')
        ];

        $this->db->insert('menu', $data);
        redirect('admin/menu');
    }

    public function hapusM($id)
    {
        $this->db->delete('troli', ['id_menu' => $id]);
        $this->db->delete('menu', ['id_menu' => $id]);
        redirect('admin/menu');
    }

    public function editM($id)
    {
        $this->load->library('form_validation');
        $data = $this->user;
        $data['judul'] = 'Edit Menu';
        $data['menu'] = $this->db->get_where('menu', ['id_menu' => $id])->row_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/editMenu', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $menu = $this->input->post('menu');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');
            $id = $this->input->post('id');

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

            $this->db->set('nama_menu', $menu);
            $this->db->set('harga', $harga);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->where('id_menu', $id);
            $this->db->update('menu');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
                    Menu berhasil di update!
                </div>'
            );
            redirect('admin/menu');
        }
    }
}
