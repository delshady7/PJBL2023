<?php
namespace App\Controllers;

class LoginController extends BaseController
{
    // ...
   
    public function options()
    {
        return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
            ->setHeader('Access-Control-Allow-Headers', 'Content-Type')
            ->setHeader('Access-Control-Max-Age', '86400')
            ->setBody('');
    }

    

    // ...
}