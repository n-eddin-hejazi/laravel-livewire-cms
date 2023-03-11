<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'title' => "Post Title 1",
            'slug' => "post-title-1",
            'body' => "<p>Post Title 1 Post Title 1 Post Title 1</p>",
            'user_id' => 3,
            'approved' => true,
            'category_id' => 1,
            'created_at' =>'2022-05-05 05:08:00',
            'image_path' =>'politica.png'
        ]);

        DB::table('posts')->insert([
            'title' => "Post Title 2",
            'slug' => "post-title-2",
            'body' => "<p>Post Title 2 Post Title 2 Post Title 2</p>",
            'user_id' => 1,
            'approved' => true,
            'category_id' => 3,
            'created_at' =>'2022-01-04 05:08:00'
        ]);

        DB::table('posts')->insert([
            'title' => "Post Title 3",
            'slug' => "post-title-3",
            'body' => "<p>Post Title 3 Post Title 3 Post Title 3</p>",
            'user_id' => 1,
            'approved' => true,
            'category_id' => 2,
            'created_at' =>'2022-04-07 05:08:00'
        ]);

        DB::table('posts')->insert([
            'title' => "Post Title 4",
            'slug' => "post-title-4",
            'body' => "<p>Post Title 4 Post Title 4 Post Title 4</p>",
            'user_id' => 2,
            'approved' => true,
            'category_id' => 2,
            'created_at' =>'2022-02-06 05:08:00'
        ]);
    }
}
