<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = AdminUser::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
            'brand' => 1,
            'category' => 1,
            'product' => 1,
            'slider' => 1,
            'coupon' => 1,
            'shipping_area' => 1,
            'blog' => 1,
            'setting' => 1,
            'all_user' => 1,
            'return_order' => 1,
            'order' => 1,
            'report' => 1,
            'stock' => 1,
            'review' => 1,
            'adminuserroll' => 1,
            'type' => 1,
        ]);
    }
}
