<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class QuienesSomos extends BaseController
{
    public function index(): string
    {
        // Pasamos la variable $noHero como dato a la vista
        return view('pages/quienesSomos', ['noHero' => true,
        'noEditorsChoice' => true]);
    }
}
