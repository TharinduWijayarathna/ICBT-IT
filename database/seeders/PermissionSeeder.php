<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{

    protected $permission;

    public function __construct()
    {
        $this->permission = new Permission();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            //user
            [
                'name' => 'create_users',
                'group_name' => 'User Management',
            ],
            [
                'name' => 'read_users',
                'group_name' => 'User Management',
            ],
            [
                'name' => 'view_users',
                'group_name' => 'User Management',
            ],
            [
                'name' => 'update_users',
                'group_name' => 'User Management',
            ],
            [
                'name' => 'delete_users',
                'group_name' => 'User Management',
            ],
            [
                'name' => 'restore_users',
                'group_name' => 'User Management',
            ],
            [
                'name' => 'create_users_permissions',
                'group_name' => 'User Management',
            ],

            //documents
            [
                'name' => 'create_documents',
                'group_name' => 'Document Management',
            ],
            [
                'name' => 'read_documents',
                'group_name' => 'Document Management',
            ],
            [
                'name' => 'view_documents',
                'group_name' => 'Document Management',
            ],
            [
                'name' => 'update_documents',
                'group_name' => 'Document Management',
            ],
            [
                'name' => 'delete_documents',
                'group_name' => 'Document Management',
            ],
            [
                'name' => 'add_documents_user',
                'group_name' => 'Document Management',
            ],
            [
                'name' => 'delete_documents_user',
                'group_name' => 'Document Management',
            ],
            [
                'name' => 'read_documents_assign_user',
                'group_name' => 'Document Management',
            ],

            //my document
            [
                'name' => 'view_my_documents',
                'group_name' => 'My Document',
            ],
            [
                'name' => 'download_my_documents',
                'group_name' => 'My Document',
            ],
            [
                'name' => 'update_my_documents',
                'group_name' => 'My Document',
            ],
            [
                'name' => 'reply_my_documents',
                'group_name' => 'My Document',
            ],
            //my profile
            [
                'name' => 'view_profile',
                'group_name' => 'My Profile',
            ],
            //daily report
            [
                'name' => 'read_daily_report',
                'group_name' => 'Daily Report',
            ],


        ];

        foreach ($permissions as $permission) {
            $old_permission = $this->permission->where('name', $permission['name'])->first();
            if (!$old_permission) {
                $this->permission->create($permission);
            }
        }
    }
}
