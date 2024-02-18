<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    protected $createNewUser;
    protected $user;

    public function __construct()
    {
        $this->createNewUser = new CreateNewUser();
        $this->user = new User();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $initialUsers = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '123456789',
                'password_confirmation' => '123456789',
            ],

        ];

        foreach ($initialUsers as $user) {
            $admin = $this->user->getByEmail($user['email']);
            if (!$admin) {
                $create_user = $this->createNewUser->create($user);

                if($create_user->email == 'admin@gmail.com'){
                    $create_user->assignRole('super_admin');
                }
            }
        }
    }
}
