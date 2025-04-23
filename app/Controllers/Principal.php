<?php

namespace App\Controllers;
use CodeIgniter\Controller;


class Principal extends BaseController
{
    public function index(): string
    {
        return view('principal.php');
    }
}
