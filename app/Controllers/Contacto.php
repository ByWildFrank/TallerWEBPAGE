<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Contacto extends BaseController
{
    public function index(): string
    {
        return view('./pages/contacto');
    }
}