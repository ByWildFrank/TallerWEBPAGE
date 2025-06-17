<?php

namespace App\Controllers;

use App\Models\CarritoModel;
use App\Models\OrdenModel;
use App\Models\DetalleModel;

class OrdenController extends BaseController
{
    protected $carritoModel;
    protected $ordenModel;
    protected $detalleModel;

    public function __construct()
    {
        $this->carritoModel = new CarritoModel();
        $this->ordenModel = new OrdenModel();
        $this->detalleModel = new DetalleModel();
    }

    public function procesar()
    {
        $usuario_id = session()->get('id');
        $items = $this->carritoModel->obtenerItemsPorUsuario($usuario_id);

        if (empty($items)) {
            return redirect()->to('/carrito/ver')->with('error', 'No hay productos en el carrito');
        }

        $total = 0;
        foreach ($items as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        $this->ordenModel->insert([
            'usuario_id' => $usuario_id,
            'fecha' => date('Y-m-d H:i:s'),
            'total' => $total
        ]);

        $orden_id = $this->ordenModel->getInsertID();

        foreach ($items as $item) {
            $this->detalleModel->insert([
                'orden_id' => $orden_id,
                'producto_id ' => $item['producto_id '],
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio']
            ]);
        }

        // Vaciar carrito
        $this->carritoModel->eliminarPorUsuario($usuario_id);

        return redirect()->to('/orden/completada/' . $orden_id);
    }

    public function completada($orden_id)
    {
        return view('orden/completada', ['orden_id' => $orden_id]);
    }
}
