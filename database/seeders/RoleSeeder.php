<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("INSERT INTO roles (name) VALUES ('SuperAdmin'), ('Admin'), ('Member')");
        DB::statement("INSERT INTO companies (name, created_at, updated_at) VALUES ('Main Company', NOW(), NOW())");
        DB::statement("INSERT INTO users (name, email, password, company_id, created_at, updated_at) VALUES ('SuperAdmin', 'super@admin.com', '".Hash::make('12345')."', 1, NOW(), NOW())");
        DB::statement("INSERT INTO role_user (user_id, role_id) VALUES (1, 1)");
    }
}
