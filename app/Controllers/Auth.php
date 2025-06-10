<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Auth extends BaseController
{
    public function login()
    {
        return view('./auth/login');
    }

    public function loginPost()
    {
        $session = session();
        $model = new UsuarioModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'usuario_id' => $user['id'],
                'usuario_nombre' => $user['nombre'],
                'usuario_rol' => $user['rol'],
                'logged_in' => true
            ]);
            return redirect()->to(base_url('principal'));
        } else {
            return redirect()->back()->with('error', 'Credenciales inválidas');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
