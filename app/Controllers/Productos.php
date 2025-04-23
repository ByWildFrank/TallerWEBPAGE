<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Productos extends BaseController
{
    public function index(): string
    {
        return view('./pages/productos');
    }
}
