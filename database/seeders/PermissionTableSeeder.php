<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            // 'customer-list',
            // 'customer-create',
            // 'customer-edit',
            // 'customer-delete',


            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'city-list',
            'city-chengStatus',

            'governorate-list',
            'governorate-chengStatus',
            'governorate-edit',

            'product-list',
            'product-create',
            'product-edit',
            'product-delete',

            'invoice-list',
            'invoice-pendingList',
            'invoice-approvedList',
            'invoice-approvedChengStatus',
            'invoice-refusal',

            'slider-list',
            'slider-create',
            'slider-edit',
            'slider-delete',

            'standardColor-list',
            'standardColor-create',
            'standardColor-edit',
            'standardColor-delete',

            'standardSize-list',
            'standardSize-create',
            'standardSize-edit',
            'standardSize-delete',


        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
