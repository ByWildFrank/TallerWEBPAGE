<?php

namespace App\Models;

use CodeIgniter\Model;

class CarritoModel extends Model
{
    protected $table = 'itemcarrito';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id', 'producto_id', 'cantidad'];

    public function obtenerItemsPorUsuario($usuario_id)
    {
        return $this->select('itemcarrito.*, producto.nombre, producto.precio, producto.imagen')
                    ->join('producto', 'producto.id = itemcarrito.producto_id')
                    ->where('usuario_id', $usuario_id)
                    ->findAll();
    }

    public function eliminarPorUsuario($usuario_id)
    {
        return $this->where('usuario_id', $usuario_id)->delete();
    }
}
