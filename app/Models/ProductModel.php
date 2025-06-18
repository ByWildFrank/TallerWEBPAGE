<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'producto'; // nombre de la tabla en tu base
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'imagen',
        'estado',        // ← ¡Agregado!
        'pais_origen',
        'created_at'
    ];

    protected $useTimestamps = false; // Tu tabla solo tiene created_at, no updated_at
}
