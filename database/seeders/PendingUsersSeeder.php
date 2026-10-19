<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PendingUsersSeeder extends Seeder
{
    public function run(): void
    {
        $pendingUsers = [
            ['name' => 'Alice Rahman',  'username' => 'alice_r',  'email' => 'alice@test.com',  'role' => 'Contestant'],
            ['name' => 'Bob Hossain',   'username' => 'bob_h',    'email' => 'bob@test.com',    'role' => 'Contestant'],
            ['name' => 'Carol Sultana', 'username' => 'carol_s',  'email' => 'carol@test.com',  'role' => 'ProblemSetter'],
            ['name' => 'David Islam',   'username' => 'david_i',  'email' => 'david@test.com',  'role' => 'Contestant'],
            ['name' => 'Eva Begum',     'username' => 'eva_b',    'email' => 'eva@test.com',    'role' => 'ProblemSetter'],
        ];

        foreach ($pendingUsers as $data) {
            $role = $data['role'];
            unset($data['role']);

            $user = User::firstOrCreate(
                ['email' => $data['email']],
                array_merge($data, [
                    'password' => Hash::make('password'),
                    'status'   => 'pending',
                ])
            );
            $user->assignRole($role);
            $this->command->info("Created pending user: {$user->name} ({$role})");
        }

        $this->command->info('✅ Pending users seeded!');
    }
}
