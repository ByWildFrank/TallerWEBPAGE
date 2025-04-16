<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class QuienesSomos extends BaseController
{
    public function index(): string
    {
        return view('./pages/quienesSomos');
    }
}
