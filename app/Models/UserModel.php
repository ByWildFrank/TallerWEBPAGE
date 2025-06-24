<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuario';  // singular según indicaste
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre', 'apellido', 'email', 'password', 'direccion', 'telefono', 'rol', 'created_at', 'active'
    ];
    protected $returnType = 'array';
}
