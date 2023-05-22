<?php

namespace App\Filters;

use CodeIgniter\Config\Services;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CORS implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $response = Services::response();

        $response->setHeader('Access-Control-Allow-Origin', '*');
        $response->setHeader('Access-Control-Allow-Headers', '*');
        $response->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
        $response->setHeader('Access-Control-Max-Age', '86400');

        // Jika metode OPTIONS, kembalikan respons kosong tanpa melanjutkan
        if ($request->getMethod() === 'OPTIONS') {
            return $response->setBody('');
        }

        return $response;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada pemrosesan lanjutan yang diperlukan setelah filter ini
    }
}
