<?php


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
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'city-list',
            'city-create',
            'city-edit',
            'city-delete',
            'country-list',
            'country-create',
            'country-edit',
            'country-delete',
            'showroom-list',
            'showroom-create',
            'showroom-edit',
            'showroom-delete',
            'district-list',
            'district-create',
            'district-edit',
            'district-delete',
            'category-list',
            'catgeory-create',
            'category-edit',
            'category-delete',
            'material-list',
            'material-create',
            'material-edit',
            'material-delete',
            'upholstery-list',
            'upholstery-create',
            'upholstery-edit',
            'upholstery-delete',
            'color-list',
            'color-create',
            'color-edit',
            'color-delete',
            'style-list',
            'style-create',
            'style-edit',
            'style-delete',
            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',
            'topic-list',
            'topic-create',
            'topic-edit',
            'topic-delete',
            'idea-list',
            'idea-create',
            'idea-edit',
            'idea-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'approve-showroom',
            'approve-product'
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
