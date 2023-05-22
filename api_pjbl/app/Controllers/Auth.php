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
  
    public function login()
    {
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // $user = $model->where('username', $username)->first();

        // if (!$user) {
        //     return $this->failNotFound('User not found');
        // }
        $isExists = $this->model->where('username', $username)->findAll();
        if (!$isExists) {
            return $this->failNotFound("Data gak ada");
        }
       
            $response = [
                'status' => 201,
                'error' => null,
                'messages' => [
                    'success' => 'berhasil login'
                ]
            ];
            return $this->respond($response);
           
    }
//     public function login()
// {
//     $model = new UserModel();

//     $username = $this->request->getPost('username');
//     $password = $this->request->getPost('password');

//     $user = $model->where('username', $username)->first();

//     // if (!$user) {
//     //     return $this->failUnauthorized('Invalid credentials');
//     // }

//     // Cek apakah password yang dimasukkan sesuai dengan password di database
//     // if (!password_verify($password, $user['password'])) {
//     //     return $this->failUnauthorized('Invalid credentials');
//     // }

//     $response = [
//         'status' => 200,
//         'message' => 'Berhasil login',
//         'data' => $user
//     ];
//     return $this->respond($response);
// }
    }
   
