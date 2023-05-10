<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class Auth extends ResourceController
{
    use ResponseTrait;
    function __construct()
    {
        // parent::__construct();
        // $this->load->model('UserModel');
        $this->model = new UserModel();
    }
    // public function login() {
       
    //     if($_SERVER["REQUEST_METHOD"] = "POST") {
    //         if (isset($_POST['username']) && isset($_POST['password'])) {
    //             $user_login = $this->model->proses_login($_POST['username'], $_POST['password']);
    //             $result['username'] = null;
                
    //             if ($user_login->num_rows() == 1) {
    //                 $result['value'] = "1";
    //                 $result['pesan'] = "sukses login";
    //                 $result['username'] = $user_login->row()->username;
    //             } else {
    //                 $result['value'] = "0";
    //                 $result['pesan'] = "Username / Password ";
    //             }
    //         } else {
    //             $result['value'] = "0";
    //             $result['pesan'] = "Masing kosong ";
    //         }
    //     } else {
    //         $result['value'] = "0";
    //         $result['pesan'] = "Error Requestnya ";
    //     }
    //     return $this->respond($result);
    // }
    // // Fungsi untuk login
    public function login()
    {
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if (!$user) {
            return $this->failNotFound('User not found');
        }
        // var_dump($user);
        // if (password_verify($password, $user['password'])) {
        //     // Menghapus password dari respons
        //     unset($user['password']);

            // Mengembalikan respons dengan data pengguna
            $response = [
                'status' => 201,
                'error' => null,
                'messages' => [
                    'success' => 'berhasil login'
                ]
            ];
            return $this->respond($response);
           
        // } else {
        //     return $this->failUnauthorized('Invalid credentials');
        // }
    }
    }
   
