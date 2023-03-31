<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\data_guruModel;
use App\Models\loginModel;

class data_guru extends BaseController
{
    protected $model;
    use ResponseTrait;
    function __construct()
    {
        $this->model = new data_guruModel();
    }

    public function index()
    {
        $data = $this->model->findAll();
        $response = [
            'success' => true,
            'data'      => $data,
        ];

        return $this->response->setJSON($response);
    }
    public function create()
    {
        $data = [
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'jabatan' => $this->request->getVar('jabatan'),
            'alamat' => $this->request->getVar('alamat'),
            'telepon' => $this->request->getVar('telepon'),
        ];
        $this->model->save($data);
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'berhasil memasukkan data'
            ]
        ];

        return $this->respond($response);
    }
     public function show($id = null)
    {
        $data = $this->model->where('id', $id)->findAll();
        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->failNotFound("data gak ada");
        }
    }
      public function update($id = null)
    {
        // $model = new data_guruModel();
        $data = [
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'jabatan' => $this->request->getVar('jabatan'),
            'alamat' => $this->request->getVar('alamat'),
            'telepon' => $this->request->getVar('telepon'),
        ];
        $data['id'] = $id;

        $isExists = $this->model->where('id', $id)->findAll();
        if (!$isExists) {
            return $this->failNotFound("Data gak ada");
        }
          if (!$this->model->save($data)) {
            return $this->fail($this->model->errors());
        }
        // $model->update($id, $data);        

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => "berhasil Update data id $id"
            ]
        ];
        return $this->respond($response);
    }

    public function delete($id = null)
    {
        $data = $this->model->where('id', $id)->findAll();
        if ($data) {
            $this->model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => "data di hapus"
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('data gak nemu');
        }
    }

      public function login()
    {
        $model = new data_guruModel();
        $identifier = $this->request->getVar('username');
        // $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // $this->model->where('username', $username)->first();
        $user = $model->where('id', $identifier)->orWhere('username', $identifier)->first();

        if (!$user) {
            return $this->failNotFound('User not found');
        }

        if (!password_verify($password, $user['password'])) {
            return $this->failUnauthorized('Incorrect password');
        }

        $userData = [
            'id' => $user['id'],
            'username' => $user['username'],
        ];

        return $this->respond($userData);
    }


}
