<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestsModel extends Model
{
    protected $table            = 'requests';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'user_id',
        'service_id',
        'message',
        'preferred_date',
        'is_active',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
