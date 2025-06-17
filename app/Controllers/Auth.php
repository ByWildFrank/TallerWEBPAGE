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
}