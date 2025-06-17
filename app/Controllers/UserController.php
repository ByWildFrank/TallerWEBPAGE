<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class UserController extends BaseController
{
   public function miCuenta()
{
    // DEBUG: ver qué hay en sesión (solo para probar, sacalo luego)
    dd(session()->get());

    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/login')->with('error', 'Debés iniciar sesión para ver esta sección.');
    }

    $userId = session()->get('id');
    $userModel = new UsuarioModel();
    $usuario = $userModel->find($userId);

    if (!$usuario) {
        return redirect()->to('/')->with('error', 'Usuario no encontrado.');
    }

    // Ya con el usuario cargado, muestro la vista con los datos
    return view('usuario/mi_cuenta', ['usuario' => $usuario]);
}

}
