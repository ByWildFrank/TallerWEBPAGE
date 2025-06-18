<?php

namespace App\Controllers;
use CodeIgniter\Controller;

namespace App\Controllers;

class Contacto extends BaseController
{
    public function index(): string
    {
        return view('pages/contacto', [
            'noHero' => true,
            'noEditorsChoice' => true
        ]);
    }
}