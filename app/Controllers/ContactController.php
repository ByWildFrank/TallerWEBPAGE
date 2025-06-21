<?php

namespace App\Controllers;

use App\Models\ConsultaModel;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class ContactController extends Controller
{
    protected $consultaModel;
    protected $usuarioModel;

    public function __construct()
    {
        $this->consultaModel = new ConsultaModel();
        $this->usuarioModel = new UsuarioModel();
    }

    // Vista para usuarios no logueados
    public function contacto()
    {
        $data = [
            'noHero' => true,
            'noEditorsChoice' => true
        ];
        return view('pages/contacto', $data);
    }

    // Vista para usuarios logueados
    public function contacto_logueado()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $usuario = $this->usuarioModel->find(session()->get('id'));
        $data = [
            'noHero' => true,
            'noEditorsChoice' => true,
            'usuario' => $usuario
        ];

        return view('pages/contacto_logueado', $data);
    }

    // Procesar el envío del formulario
    // Procesar el envío del formulario
public function submit()
{
    $validation = \Config\Services::validation();
    $isLoggedIn = session()->get('isLoggedIn');
    $usuarioId = $isLoggedIn ? session()->get('id') : null;

    // Reglas de validación
    $rules = [
        'message' => 'required',
        'contact_preference' => 'required|in_list[Email,WhatsApp,Llamada]'
    ];

    if (!$isLoggedIn) {
        $rules['nombre'] = 'required';
        $rules['email'] = 'required|valid_email';
        $rules['telephone'] = 'permit_empty';
    }

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $data = [
        'usuario_id' => $usuarioId,
        'nombre' => $this->request->getPost('nombre') ?? ($isLoggedIn ? $this->usuarioModel->find($usuarioId)->nombre : null),
        'email' => $this->request->getPost('email') ?? ($isLoggedIn ? $this->usuarioModel->find($usuarioId)->email : null),
        'telephone' => $this->request->getPost('telephone') ?? ($isLoggedIn ? $this->usuarioModel->find($usuarioId)->telefono : null),
        'asunto' => 'Consulta general',
        'mensaje' => $this->request->getPost('message'),
        'contact_preference' => $this->request->getPost('contact_preference'),
        'estado' => 'Pendiente',
        'fecha' => date('Y-m-d H:i:s')
    ];

    $this->consultaModel->insert($data);

    // Redirigir según el estado de la sesión
    $redirectUrl = $isLoggedIn ? '/contacto_logueado' : '/contacto';
    return redirect()->to(base_url($redirectUrl))->with('success', 'Mensaje enviado con éxito');
}
}
