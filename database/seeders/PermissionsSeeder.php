<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('permissions')->insert([
            'id' => 1,
            'name' => 'add-post',
            'desc' => 'add post'
        ]);

        DB::table('permissions')->insert([
            'id' => 2,
            'name' => 'edit-post',
            'desc' => 'edit post'
        ]);

        DB::table('permissions')->insert([
            'id' => 3,
            'name' => 'delete-post',
            'desc' => 'delete post'
        ]);

        DB::table('permissions')->insert([
            'id' => 4,
            'name' => 'add-user',
            'desc' => 'add user'
        ]);

        DB::table('permissions')->insert([
            'id' => 5,
            'name' => 'edit-user',
            'desc' => 'edit user'
        ]);

        DB::table('permissions')->insert([
            'id' => 6,
            'name' => 'delete-user',
            'desc' => 'delete user'
        ]);
    }
}
