<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Cors extends BaseConfig
{
    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Settings
    |--------------------------------------------------------------------------
    |
    | This configuration file allows you to configure Cross-Origin Resource
    | Sharing (CORS). For more information, please refer to the official CORS
    | documentation: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    | You can enable CORS for the entire application or only for specific
    | routes. Configuration for each route takes precedence over the global
    | configuration.
    |
    */

    public $allowedOrigins = [
        'http://localhost:3000', // Ubah sesuai dengan URL domain frontend Anda
    ];

    public $allowedMethods = ['GET', 'POST', 'OPTIONS']; // Tambahkan metode permintaan yang diizinkan

    public $allowedHeaders = ['Content-Type']; // Tambahkan header yang diizinkan

    public $exposedHeaders = [];

    public $maxAge = 0;

    public $supportsCredentials = false;
}
