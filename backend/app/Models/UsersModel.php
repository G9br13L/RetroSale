<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    // If you plan to use an Entity (optional), define it here
    // Otherwise, set this to 'array' or remove it
    protected $returnType       = 'array'; // You can switch to '\App\Entities\User' if you create one
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;

    protected $allowedFields    = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password_hash',
        'type',
        'account_status',
        'email_activated',
        'newsletter',
        'gender',
        'profile_image',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Insert behavior
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Date management
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation rules (can expand later)
    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[users.email,id,{id}]',
        'first_name' => 'required|min_length[2]|max_length[100]',
        'last_name' => 'required|min_length[2]|max_length[100]',
        'password_hash' => 'permit_empty|min_length[8]',
    ];

    protected $validationMessages = [
        'email' => [
            'required' => 'Email address is required.',
            'valid_email' => 'Please provide a valid email.',
            'is_unique' => 'This email is already registered.',
        ],
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPassword'];
    protected $beforeUpdate   = ['hashPassword'];

    /**
     * Automatically hash the password if plain text is passed
     */
    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password_hash'])) {
            return $data;
        }

        // If it's not already hashed, hash it
        if (password_get_info($data['data']['password_hash'])['algo'] === 0) {
            $data['data']['password_hash'] = password_hash($data['data']['password_hash'], PASSWORD_DEFAULT);
        }

        return $data;
    }
}
