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
        $usuario_id = session()->get('id');
        if (!$usuario_id) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión');
        }

        $producto = $this->productoModel->find($producto_id);
        if (!$producto) {
            return redirect()->to('/catalogo')->with('error', 'Producto no encontrado');
        }

        $item = $this->carritoModel->where(['usuario_id' => $usuario_id, 'producto_id' => $producto_id])->first();
        $nueva_cantidad = ($item ? $item['cantidad'] + 1 : 1);

        if ($nueva_cantidad > $producto['stock']) {
            return redirect()->to('/catalogo')->with('error', 'Stock insuficiente para ' . $producto['nombre']);
        }

        if ($item) {
            $this->carritoModel->update($item['id'], ['cantidad' => $nueva_cantidad]);
        } else {
            $this->carritoModel->insert([
                'usuario_id' => $usuario_id,
                'producto_id' => $producto_id,
                'cantidad' => 1
            ]);
        }

        return redirect()->to('/carrito/ver')->with('success', 'Producto agregado al carrito');
    }

    public function ver()
    {
        $usuario_id = session()->get('id');

        $data = [
            'items' => $this->carritoModel->obtenerItemsPorUsuario($usuario_id),
            'noHero' => true,
            'noEditorsChoice' => true
        ];

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

        if ($this->carritoModel->update($id_item, ['cantidad' => $cantidad])) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'error' => 'No se pudo actualizar la cantidad']);
        }
    }
    
}
