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

    // Validar campos obligatorios
    if (empty($email) || empty($password)) {
        return redirect()->back()->with('error', 'Por favor complete todos los campos');
    }

    $user = $model->where('email', $email)->first();

    if ($user && password_verify($password, $user['password'])) {
        // Guardar datos del usuario en sesión
        $session->set([
            'id' => $user['id'],
            'nombre' => $user['nombre'],
            'apellido' => $user['apellido'],
            'email' => $user['email'],
            'rol' => $user['rol'],
            'isLoggedIn' => true
        ]);

        $session->setFlashdata('success', 'Bienvenido/a ' . $user['nombre']);

        // Redireccionar según el rol


    if ($user['rol'] === 'admin') {
        return redirect()->to('/admin/panel');
    } else {
        return redirect()->to('/principal');
    }


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
  public function registerPost(){
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
        'rol'        => 'cliente', // CORREGIDO
        'created_at' => date('Y-m-d H:i:s')
    ];

    if (!$userModel->save($userData)) {
        // Devuelve errores del modelo
        return redirect()->back()
            ->withInput()
            ->with('error', implode('<br>', $userModel->errors()));
    }

    return redirect()->to(base_url('login'))->with('success', 'Registro exitoso. Ahora podés iniciar sesión.');
}

}