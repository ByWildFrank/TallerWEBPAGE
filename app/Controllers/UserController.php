<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

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
                session()->set([
                    'user_id' => $user['id'],
                    'user_name' => $user['nombre'],
                    'user_email' => $user['email'],
                    'isLoggedIn' => true,
                    'user_rol' => $user['rol'],
                ]);
                return redirect()->to(base_url('principal'));
            } else {
                return redirect()->back()->with('error', 'Email o contraseña incorrecta.');
            }
        }

        return view('pages/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth/login'));
    }
}