<?php

namespace App\Controllers;

use App\Models\CarritoModel;
use App\Models\OrdenModel;
use App\Models\DetalleModel;
use App\Models\ProductModel;
use App\Models\FacturaModel;

class OrdenController extends BaseController
{
    protected $carritoModel;
    protected $ordenModel;
    protected $detalleModel;
    protected $productModel;
    protected $facturaModel;
    protected $db;

    public function __construct()
    {
        $this->carritoModel = new CarritoModel();
        $this->ordenModel = new OrdenModel();
        $this->detalleModel = new DetalleModel();
        $this->productModel = new ProductModel();
        $this->facturaModel = new FacturaModel();
        $this->db = \Config\Database::connect();
    }

    public function procesar()
    {
        $usuario_id = session()->get('id');
        if (!$usuario_id) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión para realizar una compra');
        }

        $items = $this->carritoModel->obtenerItemsPorUsuario($usuario_id);
        if (empty($items)) {
            return redirect()->to('/carrito/ver')->with('error', 'No hay productos en el carrito');
        }

        $this->db->transBegin();

        try {
            $total = 0;
            $items_validos = [];

            foreach ($items as $item) {
                $producto = $this->productModel->find($item['producto_id']);
                if (!$producto) {
                    throw new \Exception("El producto con ID {$item['producto_id']} no existe");
                }

                if ($item['cantidad'] > $producto['stock']) {
                    throw new \Exception("Stock insuficiente para el producto: {$producto['nombre']}");
                }

                $subtotal = $producto['precio'] * $item['cantidad'];
                $total += $subtotal;

                $items_validos[] = [
                    'producto_id' => $item['producto_id'],
                    'cantidad' => $item['cantidad'],
                    'precio_unitario' => $producto['precio'],
                    'subtotal' => $subtotal
                ];
            }

            $orden_data = [
                'usuario_id' => $usuario_id,
                'total' => $total,
                'estado' => 'pendiente',
                'fecha_creacion' => date('Y-m-d H:i:s')
            ];
            $this->ordenModel->insert($orden_data);
            $orden_id = $this->ordenModel->getInsertID();

            foreach ($items_validos as $item) {
                $detalle_data = [
                    'orden_id' => $orden_id,
                    'producto_id' => $item['producto_id'],
                    'cantidad' => $item['cantidad'],
                    'precio_unitario' => $item['precio_unitario'],
                    'subtotal' => $item['subtotal']
                ];
                $this->detalleModel->insert($detalle_data);

                $producto_actual = $this->productModel->find($item['producto_id']);
                $this->productModel->update($item['producto_id'], [
                    'stock' => $producto_actual['stock'] - $item['cantidad']
                ]);
            }

            $this->carritoModel->eliminarPorUsuario($usuario_id);

            $factura_data = [
                'orden_id' => $orden_id,
                'numero_factura' => 'FAC-' . date('Ymd-His'),
                'fecha_emision' => date('Y-m-d H:i:s'),
                'total' => $total,
                'estado' => 'pendiente'
            ];
            $this->facturaModel->insert($factura_data); // Asegurar que la inserción funcione

            $this->db->transCommit();

            return redirect()->to('/orden/completar/' . $orden_id)->with('success', 'Compra iniciada con éxito. Revisa y finaliza.');
        } catch (\Exception $e) {
            $this->db->transRollback();
            return redirect()->to('/carrito/ver')->with('error', $e->getMessage());
        }
    }

    public function completar($orden_id)
    {
        $orden = $this->ordenModel->find($orden_id);
        if (!$orden || $orden['usuario_id'] != session()->get('id')) {
            return redirect()->to('/carrito/ver')->with('error', 'Orden no encontrada o no autorizada');
        }

        $factura = $this->facturaModel->where('orden_id', $orden_id)->first();
        $detalles = $this->detalleModel
                        ->select('orden_detalle.cantidad, orden_detalle.precio_unitario, orden_detalle.subtotal, producto.nombre')
                        ->join('producto', 'producto.id = orden_detalle.producto_id')
                        ->where('orden_detalle.orden_id', $orden_id)
                        ->findAll();

        if (!$factura) {
            $factura = [
                'numero_factura' => 'No disponible',
                'fecha_emision' => date('Y-m-d H:i:s'),
                'total' => $orden['total'],
                'estado' => 'Pendiente (sin factura)'
            ];
        }

        return view('orden/completar', [
            'orden' => $orden,
            'factura' => $factura,
            'detalles' => $detalles,
            'noHero' => true,
            'noEditorsChoice' => true
        ]);
    }

    public function finalizar($orden_id)
    {
        $orden = $this->ordenModel->find($orden_id);
        if (!$orden || $orden['usuario_id'] != session()->get('id')) {
            return redirect()->to('/mi-cuenta')->with('error', 'Orden no encontrada o no autorizada');
        }

        $this->ordenModel->update($orden_id, ['estado' => 'finalizada']);
        $factura = $this->facturaModel->where('orden_id', $orden_id)->first();
        if ($factura) {
            $this->facturaModel->update($factura['id'], ['estado' => 'emitida']);
        } else {
            // Crear una factura básica si no existe
            $factura_data = [
                'orden_id' => $orden_id,
                'numero_factura' => 'FAC-' . date('Ymd-His'),
                'fecha_emision' => date('Y-m-d H:i:s'),
                'total' => $orden['total'],
                'estado' => 'emitida'
            ];
            $this->facturaModel->insert($factura_data);
        }

        return redirect()->to('/mi-cuenta')->with('success', 'Orden finalizada con éxito');
    }
}