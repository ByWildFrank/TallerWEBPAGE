<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Auth extends Controller
{
    public function login()
    {
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $model = new UserModel();
            $user = $model->where('email', $email)->first();

            if ($user && password_verify($password, $user['password'])) {
                // Login OK
                session()->set([
                    'user_id' => $user['id'],
                    'user_name' => $user['nombre'],
                    'user_email' => $user['email'],
                    'isLoggedIn' => true,
                    'user_rol' => $user['rol'],
                ]);
                return redirect()->to(base_url('principal'));
            } else {
                // Login fallido
                return redirect()->back()->with('error', 'Email o contraseña incorrecta.');
            }
        }
        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('principal'));
    }
}
