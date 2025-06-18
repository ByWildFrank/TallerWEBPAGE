<?php
namespace App\Controllers;

class Comercializacion extends BaseController
{
    public function index(): string
    {
        return view('pages/comercializacion', [
            'noHero' => true,
            'noEditorsChoice' => true,

        ]);
    }
}
