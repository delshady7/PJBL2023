<?php
namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\data_guruModel;

class DataGuruController extends BaseController
{
    // ...
    protected $model;
    use ResponseTrait;
    function __construct()
    {
        $this->model = new data_guruModel();
    }
    public function options()
    {
        return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Methods', '*')
            ->setHeader('Access-Control-Allow-Headers', 'Content-Type')
            ->setHeader('Access-Control-Max-Age', '86400')
            ->setBody('');
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

    // ...
}
