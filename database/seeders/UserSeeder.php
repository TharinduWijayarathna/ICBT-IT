<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Tharindu Wijayarathna',
                'email' => 'tharinduwijayarathne87@gmail.com',
                'password' => 'Wikum@123',
                'confirm_password' => 'Wikum@123',
            ],
            [
                'name' => 'Navod',
                'email' => 'navod@gmail.com',
                'password' => 'Navod@123',
                'confirm_password' => 'Navod@123',
            ]
        ];

        foreach ($users as $user) {
            $data = User::where('email', $user['email'])->first();

            if (!isset($data)) {
                User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => bcrypt($user['password']),
                ]);
            }
        }
    }
}
