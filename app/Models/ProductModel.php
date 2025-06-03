<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'producto'; // nombre de la tabla en tu base
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion', 'precio', 'stock', 'imagen', 'pais_origen', 'created_at'];
}
