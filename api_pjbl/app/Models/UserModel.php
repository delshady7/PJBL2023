<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // public function proses_login($username, $pasword) 
    // {
    //     return $this->db->query("SELECT username FROM login WHERE username = '$username' AND password = MD5('$password') ");
    // }
    protected $table = 'login';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password'];

    // Fungsi untuk mendapatkan data pengguna berdasarkan username
    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
    // protected $table      = 'login';
    // protected $primaryKey = 'id';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    // protected $allowedFields = ['username', 'password'];

    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [
    //     'username' => 'required',
    //     'password' => 'required'
    // ];

    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    // public function updateUser($id, $data)
    // {
    //     return $this->update($id, $data);
    // }
}