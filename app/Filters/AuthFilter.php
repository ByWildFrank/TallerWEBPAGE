<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Si se quiere filtrar por rol:
        if ($arguments && !in_array(session()->get('usuario_rol'), $arguments)) {
            return redirect()->to('/login')->with('error', 'Acceso denegado');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
