<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Bhu\Core\PortalTenant;
use App\Models\Enums\PortalTenantType;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AdminUserAndRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $timestamp = now();

        // PERMISSIONS
        // General
        Permission::query()->upsert(['name' => 'manage-students', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);
        Permission::query()->upsert(['name' => 'create-student', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);
        Permission::query()->upsert(['name' => 'edit-student', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);
        Permission::query()->upsert(['name' => 'delete-student', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);

        Permission::query()->upsert(['name' => 'manage-admin-users', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);
        Permission::query()->upsert(['name' => 'create-admin-user', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);
        Permission::query()->upsert(['name' => 'edit-admin-user', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);
        Permission::query()->upsert(['name' => 'delete-admin-user', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);

        Permission::query()->upsert(['name' => 'manage-courses', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);
        Permission::query()->upsert(['name' => 'create-course', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);
        Permission::query()->upsert(['name' => 'edit-course', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);
        Permission::query()->upsert(['name' => 'delete-course', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);

        Permission::query()->upsert(['name' => 'manage-assessment-requirements', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);
        Permission::query()->upsert(['name' => 'create-assessment-requirement', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);
        Permission::query()->upsert(['name' => 'edit-assessment-requirement', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);
        Permission::query()->upsert(['name' => 'delete-assessment-requirement', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);
        // END PERMISSIONS

        // ROLE WITH PERMISSIONS
        Role::query()->upsert(['name' => 'administrator', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);

        Role::query()->upsert(['name' => 'support', 'guard_name' => 'web_admins', 'created_at' => $timestamp, 'updated_at' => $timestamp], ['name', 'guard_name'], ['name']);
        Role::findByName('support', 'web_admins')?->givePermissionTo([
            'manage-students',
            'create-student',
            'edit-student',
            'delete-student',
            'manage-courses',
            'create-course',
            'edit-course',
            'delete-course',
            'manage-assessment-requirements',
            'create-assessment-requirement',
            'edit-assessment-requirement',
            'delete-assessment-requirement',
        ]);
    }
}
