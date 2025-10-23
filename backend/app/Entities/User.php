<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
    protected $datamap = [];

    // ✅ These ensure CI4 converts DB timestamps into DateTime objects
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'email_activated' => 'boolean',
        'newsletter' => 'boolean',
    ];
}
