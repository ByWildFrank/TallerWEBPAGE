<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleModel extends Model
{
    protected $table = 'orden_detalle';
    protected $primaryKey = 'id';
    protected $allowedFields = ['orden_id', 'producto_id', 'cantidad', 'precio_unitario','subtotal'];
}
