<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::query()->create([
            'firstname' => 'Super',
            'lastname' => 'Administrator',
            'email' => 'admin@example.com',
            'phone' => '08012341234',
            'password' => bcrypt(123456),
            'account_status' => true,
        ]);

        $admin->assignRole(['administrator']);
    }
}
