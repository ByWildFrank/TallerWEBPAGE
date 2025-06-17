<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdenModel extends Model
{
    protected $table = 'orden';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id', 'total', 'estado','fecha_creacion'];
}
