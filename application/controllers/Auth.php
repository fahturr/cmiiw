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
        if ($this->session->userdata('email')) {
            redirect('home');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email wajib diisi!',
            'valid_email' => 'Email tidak valid!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password wajib diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $pass = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            if (password_verify($pass, $user['password'])) {
                $data = ['email' => $user['email']];
                $this->session->set_userdata($data);

                if ($user['id_role'] == 1) {
                    redirect('home');
                } else {
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                        Email atau password salah!
                    </div>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">
                    Email tidak terdaftar!
                </div>'
            );
            redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Nama Wajib diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar!',
            'required' => 'Email Wajib diisi!',
            'valid_email' => 'Email tidak valid!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Register';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nama_user' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'gambar' => 'image.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_role' => 1
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
                    Akun berhasil di daftar! Silahkan login
                </div>'
            );
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        redirect('auth');
    }

    // public function glogin()
    // {
    //     require_once APPPATH . 'third_party/vendor/autoload.php';
    //     $client = new Google_Client();
    //     $client->setAuthConfig(APPPATH . 'third_party/client-secret.json');
    //     $client->setRedirectUri(base_url('auth'));
    //     $client->setScopes(array(
    //         "https://www.googleapis.com/auth/userinfo.email",
    //         "https://www.googleapis.com/auth/userinfo.profile",
    //         "https://www.googleapis.com/auth/plus.me",
    //     ));

    //     if (!isset($_GET['code'])) {
    //         $url = $client->createAuthUrl();
    //         header('location: ' . filter_var($url, FILTER_SANITIZE_URL));
    //     } else {
    //         $client->authenticate($_GET['code']);
    //         $data = [
    //             'access_token' => $client->getAccessToken(),
    //             'logged' => TRUE
    //         ];
    //         $this->session->set_userdata($data['access_token'] = $client->getAccessToken());

    //         try {
    //             // profile
    //             $plus = new Google_Service_Plus($client);
    //             $data = ['access_profile' => $plus->people->get('me')];
    //             $this->session->set_userdata($data);
    //         } catch (\Exception $e) {
    //             echo $e->__toString();
    //             $this->session->unset_userdata('access_profile');
    //             $this->session->unset_userdata('logged');
    //             die;
    //         }

    //         redirect('home');
    //     }
    //     // $client->authenticate($_GET['code']);
    //     // $data = [
    //     //     'access_token' => $client->getAccessToken(),
    //     //     'access_profile' => ''
    //     // ];

    //     // try {
    //     //     $plus = new Google_Service_Plus($client);
    //     //     $data['access_profile'] = $plus->people->get('me');
    //     //     $this->session->set_userdata($data);
    //     //     redirect('home');
    //     // } catch (\Exception $e) {
    //     //     echo $e->__toString();
    //     //     $data['access_token'] = '';
    //     //     redirect('auth');
    //     // }
    //     // redirect('home');

    // }

    // public function glogout()
    // {
    //     $this->session->unset_userdata('access_profile');
    //     $this->session->unset_userdata('access_token');
    //     redirect('auth');
    // }
}
