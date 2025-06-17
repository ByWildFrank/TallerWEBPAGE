<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Principal extends BaseController
{
    public function index(): string
    {
        // Asegurar que la sesión esté iniciada
        $session = session();

        // Pasar datos de sesión a la vista (opcional, pero útil para debugging)
        $data = [
            'isLoggedIn' => $session->get('isLoggedIn') ?? false,
            'userName' => $session->get('nombre') ?? '',
            'userEmail' => $session->get('email') ?? ''
        ];

        return view('principal.php', $data);
    }
}
