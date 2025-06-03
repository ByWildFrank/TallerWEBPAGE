<?php

namespace App\Controllers;

use App\Models\UserModel;  // Asegurate de tener este modelo

class Auth extends BaseController
{
    public function login()
    {
        helper(['form']);

        // Si se envió el formulario (método POST)
        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $usuarioModel = new UserModel();
            $usuario = $usuarioModel->where('email', $email)->first();

            if ($usuario && password_verify($password, $usuario['password'])) {
                // Guardar datos en sesión
                session()->set([
                    'id' => $usuario['id'],
                    'nombre' => $usuario['nombre'],
                    'email' => $usuario['email'],
                    'rol' => $usuario['rol'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to(base_url('principal'));
            } else {
                session()->setFlashdata('error', 'Usuario o contraseña incorrectos');
                return redirect()->back();
            }
        }

        // Si no es POST, solo mostramos la vista
        return view('pages/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth/login'));
    }
}
