<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Auth extends BaseController
{
    public function login()
    {
        // Si ya está logueado, redirigir a principal
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('principal'));
        }
        
        return view('./auth/login');
    }

    public function loginPost()
    {
        $session = session();
        
        $model = new UsuarioModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        // Validar que los campos no estén vacíos
        if (empty($email) || empty($password)) {
            return redirect()->back()->with('error', 'Por favor complete todos los campos');
        }
        
        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // NOMBRES CORREGIDOS para coincidir con las vistas
            $session->set([
                'id' => $user['id'],                    // ID del usuario
                'nombre' => $user['nombre'],            // Cambiado de 'usuario_nombre' a 'nombre'
                'apellido' => $user['apellido'],        // Agregado apellido
                'email' => $user['email'],              // Agregado email
                'rol' => $user['rol'],                  // Cambiado de 'usuario_rol' a 'rol'
                'isLoggedIn' => true                    // Cambiado de 'logged_in' a 'isLoggedIn'
            ]);
            
            // Mensaje de éxito opcional
            $session->setFlashdata('success', 'Bienvenido/a ' . $user['nombre']);
            
            return redirect()->to(base_url('principal'));
        } else {
            return redirect()->back()->with('error', 'Email o contraseña incorrectos');
        }
    }

    public function logout()
    {
        $session = session();
        
        // Mensaje de despedida opcional
        $session->setFlashdata('info', 'Sesión cerrada correctamente');
        
        // Destruir toda la sesión
        $session->destroy();
        
        return redirect()->to(base_url('login'));
    }

    // NUEVO: Mostrar vista de registro
    public function register()
    {
        return view('auth/register');
    }
    // NUEVO: Procesar datos del formulario
    public function registerPost()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nombre'    => 'required',
            'apellido'  => 'required',
            'email'     => 'required|valid_email|is_unique[usuario.email]',
            'password'  => 'required|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $validation->getErrors()));
        }

        $userModel = new UsuarioModel();

        $userData = [
            'nombre'     => $this->request->getPost('nombre'),
            'apellido'   => $this->request->getPost('apellido'),
            'email'      => $this->request->getPost('email'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'direccion'  => $this->request->getPost('direccion'),
            'telefono'   => $this->request->getPost('telefono'),
            'rol'        => 'usuario', // por defecto
            'created_at' => date('Y-m-d H:i:s')
        ];

        $userModel->save($userData);

        return redirect()->to('/login')->with('success', 'Registro exitoso. Ahora podés iniciar sesión.');
    }
}