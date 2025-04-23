<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Comercializacion extends BaseController
{
    public function index(): string
    {
        return view('./pages/comercializacion');
    }
}