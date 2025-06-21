<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultaModel extends Model
{
    protected $table = 'consulta';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id', 'nombre', 'email', 'telephone', 'asunto', 'mensaje', 'contact_preference', 'estado', 'fecha'];
    protected $useTimestamps = false;
}