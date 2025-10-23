<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $password = password_hash('Sukunabetter', PASSWORD_DEFAULT);

        $users = [
            [
                'first_name'       => 'Miro',
                'middle_name'      => 'Gabriel',
                'last_name'        => 'Velasco',
                'email'            => 'miro@example.test',
                'password_hash'    => $password,
                'type'             => 'admin',
                'account_status'   => 1,
                'email_activated'  => 1,
                'newsletter'       => 1,
                'gender'           => 'Male',
                'profile_image'    => 'uploads/profiles/miro.png',
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
            [
                'first_name'       => 'Gojo',
                'middle_name'      => 'Wakana',
                'last_name'        => 'Satoru',
                'email'            => 'satoru@example.test',
                'password_hash'    => $password,
                'type'             => 'client',
                'account_status'   => 1,
                'email_activated'  => 0,
                'newsletter'       => 1,
                'gender'           => 'Female',
                'profile_image'    => 'uploads/profiles/gojo.png',
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
        ];

        // Insert all users in one batch
        $this->db->table('users')->insertBatch($users);
    }
}
