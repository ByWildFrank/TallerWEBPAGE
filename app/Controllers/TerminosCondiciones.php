<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class TerminosCondiciones extends BaseController
{
    public function index(): string
    {
        return view('./pages/terminosCondiciones', [
            'noHero' => true,
            'noEditorsChoice' => true
        ]);
    }
}