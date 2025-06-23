<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class AdminController extends Controller
{
    protected $productoModel;

    public function __construct()
    {
        $this->productoModel = new ProductModel();
    }

    public function index()
    {
        return view('admin/panel');
    }

    public function productos()
    {
        return view('admin/productos');
    }

    public function guardar()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'estado' => 'required|in_list[disponible,no disponible]',
            'pais_origen' => 'required',
            'imagen' => 'uploaded[imagen]|is_image[imagen]|max_size[imagen,4096]' // Máximo 4MB
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/admin/productos')->withInput()->with('error', $validation->listErrors());
        }

        $file = $this->request->getFile('imagen');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . '../public/assets/img/Products/', $newName);
            $imagen = $newName;
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'stock' => $this->request->getPost('stock'),
            'estado' => $this->request->getPost('estado'),
            'imagen' => $imagen,
            'pais_origen' => $this->request->getPost('pais_origen'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->productoModel->insert($data);

        return redirect()->to('/admin/productos')->with('success', 'Producto agregado exitosamente');
    }
}