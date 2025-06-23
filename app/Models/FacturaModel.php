<?php

namespace App\Models;

use CodeIgniter\Model;

class FacturaModel extends Model
{
    protected $table = 'factura';
    protected $primaryKey = 'id';
    protected $allowedFields = ['orden_id', 'numero_factura', 'fecha_emision', 'total', 'estado'];
    protected $useTimestamps = false;

    public function getFacturaPorOrden($orden_id)
    {
        return $this->where('orden_id', $orden_id)->first();
    }
    
}