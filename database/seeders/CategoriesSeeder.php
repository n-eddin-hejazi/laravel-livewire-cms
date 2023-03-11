<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'title' => "Politics",
            'slug' => "politics",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('categories')->insert([
            'title' => "Culture",
            'slug' => "culture",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('categories')->insert([
            'title' => "Economy",
            'slug' => "economy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('categories')->insert([
            'title' => "Art",
            'slug' => "art",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('categories')->insert([
            'title' => "Education",
            'slug' => "education",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('categories')->insert([
            'title' => "Tech",
            'slug' => "tech",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
