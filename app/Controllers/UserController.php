<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use App\Models\OrdenModel;
use App\Models\DetalleModel;
use App\Models\FacturaModel;

class UserController extends BaseController
{
    public function miCuenta()
    {
        // Verificar si el usuario está autenticado
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Debés iniciar sesión para ver esta sección.');
        }

        // Obtener el ID del usuario desde la sesión
        $userId = session()->get('id');
        $userModel = new UsuarioModel();
        $ordenModel = new OrdenModel();
        $detalleModel = new DetalleModel();
        $facturaModel = new FacturaModel();

        // Obtener datos del usuario
        $usuario = $userModel->find($userId);
        if (!$usuario) {
            return redirect()->to('/')->with('error', 'Usuario no encontrado.');
        }

        // Obtener órdenes del usuario con detalles
        $ordenes = $ordenModel->select('orden.id, orden.total, orden.estado, orden.fecha_creacion')
                              ->where('orden.usuario_id', $userId)
                              ->findAll();

        // Obtener facturas asociadas a las órdenes
        $facturas = [];
        foreach ($ordenes as $orden) {
            $facturas[$orden['id']] = $facturaModel->where('orden_id', $orden['id'])->first();
        }

        // Opcional: Obtener detalles de cada orden
        foreach ($ordenes as &$orden) {
            $orden['detalles'] = $detalleModel->select('orden_detalle.cantidad, orden_detalle.precio_unitario, orden_detalle.subtotal, producto.nombre')
                                             ->join('producto', 'producto.id = orden_detalle.producto_id')
                                             ->where('orden_detalle.orden_id', $orden['id'])
                                             ->findAll();
        }

        // Pasar datos a la vista
        $data = [
            'usuario' => $usuario,
            'ordenes' => $ordenes,
            'facturas' => $facturas, // Pasamos las facturas como un arreglo
            'noHero' => true,
            'noEditorsChoice' => true
        ];

        return view('usuario/mi_cuenta', $data);
    }
}