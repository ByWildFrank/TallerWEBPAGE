<?php

namespace App\Controllers;

use App\Models\CarritoModel;
use App\Models\ProductModel;

class CarritoController extends BaseController
{
    protected $carritoModel;
    protected $productoModel;

    public function __construct()
    {
        $this->carritoModel = new CarritoModel();
        $this->productoModel = new ProductModel();
    }

    public function agregar($producto_id)
    {
        $usuario_id = session()->get('id'); // Asegurate que el usuario esté logueado

        $item = $this->carritoModel->where(['usuario_id' => $usuario_id, 'producto_id' => $producto_id])->first();

        if ($item) {
            $this->carritoModel->update($item['id'], ['cantidad' => $item['cantidad'] + 1]);
        } else {
            $this->carritoModel->insert([
                'usuario_id' => $usuario_id,
                'producto_id' => $producto_id,
                'cantidad' => 1
            ]);
        }

        return redirect()->to('/carrito/ver');
    }

    public function ver()
    {
        $usuario_id = session()->get('id');
        $data['items'] = $this->carritoModel->obtenerItemsPorUsuario($usuario_id);
        return view('carrito/ver', $data);
    }

    public function eliminar($id_item)
    {
        $this->carritoModel->delete($id_item);
        return redirect()->to('/carrito/ver');
    }

    public function actualizar()
    {
        $id_item = $this->request->getPost('id_item');
        $cantidad = $this->request->getPost('cantidad');
        $this->carritoModel->update($id_item, ['cantidad' => $cantidad]);
        return redirect()->to('/carrito/ver');
    }
}